<?php

namespace App\Controllers;

use App\Models\UserModelCode;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\PenelitianModel;
use App\Models\LaporanPenelitianModel;
use App\Models\DosenModel;
use App\Models\TimPenelitiModel;
use App\Models\LuaranTargetModel;
use CodeIgniter\I18n\Time;
use App\Libraries\Pdfgenerator;

class Penelitian extends BaseController
{
    use ResponseTrait;
    protected $penelitianModel;
    protected $ketuatimpenelitiModel;
    protected $timpenelitiModel;
    protected $dosenModel;
    protected $luaranModel;

    public function __construct()
    {
        //new
        $this->penelitianModel = new PenelitianModel();
        $this->laporanPenelitianModel = new LaporanPenelitianModel();
        $this->timpenelitiModel = new TimPenelitiModel();
        $this->ketuatimpenelitiModel = new TimPenelitiModel();
        $this->dosenModel = new DosenModel();
        $this->luaranModel = new LuaranTargetModel();
    }

    public function index()
    {
        //pager initialize
        $pager = \Config\Services::pager();
        // $penelitianModel = new PenelitianModel();
        // $data = array(
        //     // 'posts' => $postModel->paginate(2, 'post'),
        //     // 'penelitian' => $penelitianModel,
        //     // 'pager' => $postModel->pager
        // );
        $data['title'] = 'Penelitian';


        return view('penelitian/index', $data);
    }



    public function save()
    {
        // //validasi input

        $jenisPenelitian = $this->request->getVar('jenis_penelitian');
        // dd($jenisPenelitian);

        if ($jenisPenelitian == "Mandiri" || $jenisPenelitian == "Kerjasama") {
            if (!$this->validate([
                // 'sampul' => [
                //     'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                //     'errors' => [
                //         'max_size' => "Ukuran gambar terlalu besar",
                //         'is_image' => "Yang anda pilih bukan gambar",
                //         'mime_in' => "Yang anda pilih bukan gambar"
                //     ]
                // ]
                'judul_penelitian' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Judul penelitian harus diisi.',
                    ]
                ],
                'uploadBukti' => [
                    'rules' => 'uploaded[uploadBukti]|ext_in[uploadBukti,pdf]|max_size[uploadBukti,10000]',
                    'errors' => [
                        'uploaded' => "{field} file tidak boleh kosong",
                        'ext_in' => "Format file harus pdf",
                        'max_size' => "Ukuran File terlalu besar"
                    ]
                ]
            ])) {
                // $validation = \Config\Services::validation();
                // dd($validation);
                // return redirect()->to('/obat/create')->withInput()->with('validation', $validation);
                $jenisPenelitian = $this->request->getVar('jenis_penelitian');
                // dd($validation);
                return redirect()->to('/penelitian' . str_replace(' ', '', $jenisPenelitian))->withInput();

                // if (($jenisPenelitian == 'Mandiri') || ($jenisPenelitian == 'Kerjasama')) {
                //     return redirect()->to('/penelitianMandiri')->withInput();
                // } else if (($jenisPenelitian == 'Semi Mandiri') || ($jenisPenelitian == 'Di Danai Institusi') || ($jenisPenelitian == 'Institusi')) {
                //     return redirect()->to('/penelitianSemiMandiri')->withInput();
                // }
            }
            $namaSurat = "-";
            $biaya = "0";
            $namaProposal = "-";
            $fileBukti = $this->request->getFile('uploadBukti');
            $namaBukti = $fileBukti->getName();
            $fileBukti->move('bukti_luaran', $namaBukti);
        } else {
            if (!$this->validate([
                // 'sampul' => [
                //     'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                //     'errors' => [
                //         'max_size' => "Ukuran gambar terlalu besar",
                //         'is_image' => "Yang anda pilih bukan gambar",
                //         'mime_in' => "Yang anda pilih bukan gambar"
                //     ]
                // ]
                'judul_penelitian' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Judul penelitian harus diisi.',
                    ]
                ],
                'upload' => [
                    'rules' => 'uploaded[upload]|ext_in[upload,pdf]|max_size[upload,10000]',
                    'errors' => [
                        'uploaded' => "{field} file tidak boleh kosong",
                        'ext_in' => "Format file harus pdf",
                        'max_size' => "Ukuran File terlalu besar"
                    ]
                ],
                'uploadSurat' => [
                    'rules' => 'uploaded[uploadSurat]|ext_in[uploadSurat,pdf]|max_size[uploadSurat,10000]',
                    'errors' => [
                        'uploaded' => "{field} file tidak boleh kosong",
                        'ext_in' => "Format file harus pdf",
                        'max_size' => "Ukuran File terlalu besar (Max 100kb)"
                    ]
                ]
            ])) {
                // $validation = \Config\Services::validation();
                // dd($validation);
                // return redirect()->to('/obat/create')->withInput()->with('validation', $validation);
                $jenisPenelitian = $this->request->getVar('jenis_penelitian');
                // dd($validation);
                return redirect()->to('/penelitian' . str_replace(' ', '', $jenisPenelitian))->withInput();

                // if (($jenisPenelitian == 'Mandiri') || ($jenisPenelitian == 'Kerjasama')) {
                //     return redirect()->to('/penelitianMandiri')->withInput();
                // } else if (($jenisPenelitian == 'Semi Mandiri') || ($jenisPenelitian == 'Di Danai Institusi') || ($jenisPenelitian == 'Institusi')) {
                //     return redirect()->to('/penelitianSemiMandiri')->withInput();
                // }
            }
            $fileProposal = $this->request->getFile('upload');
            $fileSurat = $this->request->getFile('uploadSurat');
            $namaSurat = $fileSurat->getName();
            $namaProposal = $fileProposal->getName();
            $fileSurat->move('surat_pernyataan', $namaSurat);
            $fileProposal->move('proposal', $namaProposal);
            $biaya = $this->request->getVar('biaya');
            $namaBukti = "-";
        }

        // $slug = url_title($this->request->getVar('judul_penelitian'), '-', true);

        $this->penelitianModel->save([
            'jenis_penelitian' => $jenisPenelitian,
            'judul_penelitian' => $this->request->getVar('judul_penelitian'),
            'bidang' => $this->request->getVar('bidang'),
            'jumlah_anggota' => $this->request->getVar('anggota'),
            'tanggal_pengajuan' => Time::now(),
            'id_status' => '1',
            'status_pengajuan' => 'diajukan',
            'file_proposal' => $namaProposal,
            'surat_pernyataan' => $namaSurat,
            'biaya'  => $biaya,
            'bukti_luaran' => $namaBukti
        ]);

        $idpenelitian = $this->penelitianModel->get_id_penelitian($this->request->getVar('judul_penelitian'));
        // dd($idpenelitian );
        $nipdosen = $this->dosenModel->get_nip_peneliti($this->request->getVar('nip'));
        // dd($nipdosen);

        $KetuatimpenelitiModel = new TimPenelitiModel();
        $timpenelitiModel = new TimPenelitiModel();

        $KetuatimpenelitiModel->save([
            'id_penelitian' => $idpenelitian['id_penelitian'],
            'NIP' => $nipdosen['NIP_dosen'],
            'bidang_keahlian' => $this->request->getVar('bidangKeahlian'),
            'namaPeneliti' => $nipdosen['nama_dosen'],
            'programStudi' => $nipdosen['program_studi'],
            'peran'         => "Ketua Penelitian"
        ]);
        $no = $this->request->getVar('anggota');
        for ($i = 1; $i <= $no; $i++) {
            $timpenelitiModel->save([
                'id_penelitian' => $idpenelitian['id_penelitian'],
                'NIP' => $this->request->getVar('nip' . $i),
                'bidang_keahlian' => $this->request->getVar('bidangAnggota' . $i),
                'peran'         => $this->request->getVar('tugasAnggota' . $i),
                'namaPeneliti' => $this->request->getVar('namaAnggota' . $i),
                'programStudi' => $this->request->getVar('studiAnggota' . $i),
            ]);
        };

        $nLuaran = (int)$this->request->getVar('jumlahrow');

        // dd($nLuaran);
        for ($i = 1; $i <= $nLuaran; $i++) {
            $this->luaranModel->save([
                'id_penelitian'     => $idpenelitian['id_penelitian'],
                'jenis_luaran'      => $this->request->getVar('jenisLuaran' . $i),
                'target_capaian'    => $this->request->getVar('targetCapaian' . $i),
                'jurnal_tujuan'            => $this->request->getVar('jurnalTujuan' . $i),
            ]);
        };
        $this->laporanPenelitianModel->save([
            'id_penelitian'=>$idpenelitian['id_penelitian']
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        // $response = ['status' => 200, 'error' => null, 'messages' => ['success' => 'Data produk berhasil ditambah.']];

        return redirect()->to('/penelitianDosen');
        // return $this->respondCreated($response);
    }

    public function list()
    {
        // $model = new M_user();
        $model = new DosenModel();
        $request = \Config\Services::request();
        $id = $request->getPostGet('term');
        $user = $model->like('nama_dosen', $id)->findAll();
        $w = array();
        foreach ($user as $rt) :
            $w[] = [
                "label" => $rt['nama_dosen'],
                "nip" => $rt['NIP_dosen'],
                "jabatan" => $rt['jabatan_dosen'],
                "progStudi" => $rt['program_studi'],
                "hp" => $rt['no_hp'],
                "email" => $rt['email_dosen'],
            ];

        endforeach;
        echo json_encode($w);
    }

    public function printpdf()
    {
        return $this->response->download('surat_pernyataan/Template_surat_pernyataan_penelitian.docx', null)->setFileName("Surat-Pernyataan.docx"); //download file
    }

    public function printpdfKontrak()
    {
        return $this->response->download('kontrak/Template_kontrak_penelitian.docx', null)->setFileName("Kontrak_penelitian.docx"); //download file
    }
}
