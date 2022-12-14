<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PkmModel;
use App\Models\PembiayaanPkmModel;
use App\Models\StatusPkmModel;
use App\Models\DosenModel;
use App\Models\TimPKMModel;
use App\Models\RincianPKMModel;
use CodeIgniter\I18n\Time;
use DateTime;

class PKM extends BaseController
{
    protected $statusPkmModel;
    protected $pkmModel;
    protected $timModel;
    protected $ketuaTimModel;
    protected $dosenModel;
    protected $rincianPkm;
    protected $pembiayaanPkm;

    public function __construct()
    {
        $this->statusPkmModel = new StatusPkmModel();
        $this->pkmModel = new PkmModel();
        $this->timModel = new TimPKMModel();
        $this->ketuaTimModel = new TimPKMModel();
        $this->dosenModel = new DosenModel();
        $this->rincianPkm = new RincianPKMModel();
        $this->pembiayaanPkm = new PembiayaanPkmModel();
    }

    public function index()
    {

        //pager initialize
        $pager = \Config\Services::pager();
        // $pkmModel = new pkmModel();
        $data = array(
            // 'posts' => $postModel->paginate(2, 'post'),
            // 'pkm' => $pkmModel,
            // 'pager' => $postModel->pager
        );
        $data['title'] = 'Pkm';


        return view('pkm/index', $data);
    }


    public function save()
    {
        // dd(date('Y-m-d', strtotime($this->request->getVar('waktu'))),);
     
        // dd($total);

        $jenisPKM = $this->request->getVar('jenis_pkm');
        //================================save PKM=================================    
   
        //===================================================
        if ($jenisPKM == "Mandiri") {
            $hasil = "-";
            $idStatus = "1";
            $status = "Menunggu Persetujuan Kepala PPPM";
        } else {
            $hasil = $this->request->getVar('hasil');
            $status = "Diajukan oleh Dosen";
            $idStatus = "1";
        }
        $this->pkmModel->save([
            'jenis_pkm' => $jenisPKM,
            'topik_kegiatan' => $this->request->getVar('topik'),
            // 'bidang' => $this->request->getVar('bidang'),
            'bentuk_kegiatan' => $this->request->getVar('bentukKegiatan'),
            // 'bentuk_kegiatan' => $this->request->getVar('pilihKegiatan'),
            'waktu_kegiatan' => date('Y-m-d', strtotime($this->request->getVar('waktu'))),
            'tempat_kegiatan' => $this->request->getVar('tempat'),
            'sasaran' => $this->request->getVar('sasaran'),
            'target_peserta' => $this->request->getVar('target'),
            'hasil' => $hasil,
            'id_status' => $idStatus,
            'status' => $status,
            'tanggal_pengajuan' => Time::now('Asia/jakarta')
        ]);

        $idpkm = $this->pkmModel->get_id_pkm($this->request->getVar('topik'));

        $this->statusPkmModel->save([
            'id_pkm' => $idpkm['ID_pkm'],
            'status' => $status
        ]);

        // dd($waktu);


        // dd($this->request->getVar('topik'));
        // dd($idpkm);
        // dd($idpkm['ID_pkm']+$this->request->getVar('target'));
        // dd($this->request->getVar('hasil'));
        // $nipdosen = $this->dosenModel->get_nip_peneliti($this->request->getVar('nip'));

        // =================Save Rincian PKM==========================
        if ($jenisPKM == "Mandiri") {
            if (!$this->validate([
                // 'uploadSurat' => [
                //     'rules' => 'uploaded[uploadSurat]|ext_in[uploadSurat,pdf]|max_size[uploadSurat,10000]',
                //     'errors' => [
                //         'uploaded' => "{field} file tidak boleh kosong",
                //         'ext_in' => "Format file harus pdf",
                //         'max_size' => "Ukuran File terlalu besar"
                //     ]
                // ],
                'uploadBukti' => [
                    'rules' => 'uploaded[uploadBukti]|ext_in[uploadBukti,pdf]|max_size[uploadBukti,10000]',
                    'errors' => [
                        'uploaded' => "{field} file tidak boleh kosong",
                        'ext_in' => "Format file harus pdf",
                        'max_size' => "Ukuran File terlalu besar"
                    ]
                ]
            ])) {
                session()->setFlashdata('error', 'Terjadi Kesalahan!!');
                return redirect()->to('/pkmForm/' . str_replace(' ', '', $jenisPKM))->withInput();
            }
            //Save surat pernyataan
            // $fileSurat = $this->request->getFile('uploadSurat');
            // $namaSurat = $fileSurat->getName();
            // $fileSurat->move('surat_pernyataan/pkm', $namaSurat);
            //save bukti kegiatan
            $fileBukti = $this->request->getFile('uploadBukti');
            $namaBukti = $fileBukti->getName();
            $fileBukti->move('bukti_kegiatan/pkm', $namaBukti);
            $this->rincianPkm->save([
                'id_pkm' => $idpkm['ID_pkm'],
                // 'surat_pernyataan' => $namaSurat,
                'bukti_kegiatan' => $namaBukti,
                'narasumber'    => $this->request->getVar('narasumber'),
                'penyelenggara' => $this->request->getVar('penyelenggara')
            ]);
        } else {
            $this->rincianPkm->save([
                'id_pkm' => $idpkm['ID_pkm']
            ]);
        }

        $nipdosen = $this->dosenModel->get_nip_peneliti(auth()->user()->nip);
        //===========================Save Tim PKM================================
        $this->ketuaTimModel->save([
            'id_pkm' => $idpkm['ID_pkm'],
            'nama' => $nipdosen['nama_dosen'],
            'nip' => $nipdosen['NIP_dosen'],
            'pangkat' => $this->request->getVar('pangkat'),
            'bidang_keahlian' => $this->request->getVar('bidang'),
            'peran'         => "Ketua PKM"
        ]);
        $no = $this->request->getVar('anggota');
        for ($i = 1; $i <= $no; $i++) {
            $this->timModel->save([
                'id_pkm' => $idpkm['ID_pkm'],
                'nama' => $this->request->getVar('namaAnggota' . $i),
                'nip' => $this->request->getVar('nipAnggota' . $i),
                'pangkat' => $this->request->getVar('pangkatAnggota' . $i),
                'bidang_keahlian' => $this->request->getVar('bidangAnggota' . $i),
                'peran'         => $this->request->getVar('peranAnggota' . $i),
            ]);
        };

        
        $no1 = $this->request->getVar('jumlahrow');
        $total = 0;
        for ($i = 1; $i <= $no1; $i++) {
            $biaya = $this->request->getVar('jumlahBiaya' . $i);
            $total = $total +$biaya ;
            $this->pembiayaanPkm->save([
                'id_pkm' => $idpkm['ID_pkm'],
                'pembiayaan_diajukan' => $this->request->getVar('pembiayaan' . $i),
                'jumlah_biaya'  => $this->request->getVar('jumlahBiaya' . $i),
            ]);
        };

        //Update Pembiayaan
        $this->pkmModel->save([
            'ID_pkm'    => $idpkm['ID_pkm'],
            'pembiayaan_diajukan' => $total
        ]);




        //==========================Set Pesan Sukses===================================
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        // $response = ['status' => 200, 'error' => null, 'messages' => ['success' => 'Data produk berhasil ditambah.']];

        return redirect()->to('/pkmDosen');
        // return $this->respondCreated($response);
    }

    public function printSurat()
    {
        return $this->response->download('surat_pernyataan/pkm/[PKM] Surat Pernyataan.docx', null)->setFileName("[PKM] Surat-Pernyataan.docx"); //download file
    }
    // public function printKontrak()
    // {
    //     return $this->response->download('[PKM] Surat Pernyataan.docx', null)->setFileName("[PKM] Surat-Pernyataan.docx"); //download file
    // }
}
