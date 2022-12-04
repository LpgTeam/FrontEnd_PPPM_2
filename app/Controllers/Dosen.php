<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\API\ResponseTrait;
use App\Models\AnggaranAwalModel;
use App\Models\AnggaranTotalModel;
use App\Models\DanaAwalDosenModel;
use App\Models\DanaPenelitianModel;
use App\Models\PenelitianModel;
use App\Models\TimPenelitiModel;
use App\Models\LaporanPenelitianModel;
use App\Models\DanaPKMModel;
use App\Models\PkmModel;
use App\Models\TimPkmModel;
use App\Models\DosenModel;
use App\Models\ReimburseModel;
use CodeIgniter\I18n\Time;


class Dosen extends BaseController
{
    use ResponseTrait;
    protected $penelitianModel;
    protected $dosenModel;
    protected $timPenelitiModel;
    protected $timPKMModel;
    protected $pkmModel;

    public function __construct()
    {
        $this->penelitianModel = new PenelitianModel();
        $this->dosenModel = new DosenModel();
        $this->timPenelitiModel = new TimPenelitiModel();
        $this->timPKMModel = new TimPKMModel();
        $this->pkmModel = new PkmModel();
        $this->laporanPenelitianModel = new LaporanPenelitianModel();
        $this->reimburseModel = new ReimburseModel();
    }

    public function index()
    {


        // $db      = \Config\Database::connect();
        // $builder2 = $db->table('detailstatus_penelitian');
        // $query2 = $builder2->get();
        // $datastatus = $query2->getResultArray();
        // dd($datastatus[0]['deskripsi']);
        // $builder = $db->table('detailstatus_penelitian');

        // $query = $builder->getWhere(['id_detail' => 1]);
        // $datapenelitian = $query->getResultArray();
        // $query = $builder->get();
        // $datastatus = $query->getResultArray();
        // // $query = $builder->getWhere(['id_detail' => 1]);
        // // $datastatus = $query->getResultArray();
        // // $datastatus = $datastatus[0];
        // dd($datastatus);

        // $db      = \Config\Database::connect();
        // $builder = $db->table('penelitian');
        // $builder->selectMax('id_penelitian');
        // $query = $builder->get();
        // $datadosen = $query->getResultArray();
        // dd($datadosen);

        // $builder = $db->table('penelitian');
        // $query = $builder->getWhere(['judul_penelitian' => "COULD grin.' 'They all can,' said the Caterpillar. 'Not QUITE right, I'm afraid,' said Alice, 'and i"]);
        // $datapenelitian = $query->getResultArray();
        // dd($datapenelitian);
        // $db      = \Config\Database::connect();
        // // $builder = $db->table('dosen');

        // $builder = $db->table('dosen');
        // $builder->select('NIP_dosen');
        // // $builder->from('dosen');
        // // $query = $builder->get();
        // dd($builder->());
        // $_SESSION['group'] = "dosen";

        // $user = auth()->user();

        // dd(auth()->user()->nip);
        // and now we can use library
        // $pdf = new \Jurosh\PDFMerge\PDFMerger;

        // add as many pdfs as you want
        // $pdf->addPDF('bukti_pendanaan/3SI2_Kelompok 5_222011361_Tugas Pertemuan 12_1.pdf', 'all', 'vertical')
        //     ->addPDF('bukti_pendanaan/DHM.pdf', 'all');
        // ->addPDF('path/to/source/file2.pdf', 'all', 'horizontal');

        // call merge, output format `file`
        // $pdf->merge('file', 'bukti_pendanaan/file.pdf');
        // $pdf = new Pdf('/path/to/form.pdf');

        // Alternatively add files later. Handles are autogenerated in this case.

        // $pdf = base_url('') . \mikehaertl\pdftk\src\Pdf;
        // $pdf->addFile('/bukti_pendanaan/DHM.pdf');
        // $pdf->addFile('/bukti_pendanaan/DHM.pdf');


        // Add files with own handle
        // $pdf = new Pdf();
        // $pdf->addFile('/path/to/file1.pdf', 'A');
        // $pdf->addFile('/path/to/file2.pdf', 'B');
        // Add file with handle and password
        // $pdf->addFile('/path/to/file3.pdf', 'C', 'secret*password');

        // Shortcut to pass all files to the constructor
        // $pdf = new Pdf([
        //     'A' => ['/path/to/file1.pdf', 'secret*password1'],
        //     'B' => ['/path/to/file2.pdf', 'secret*password2'],
        // ]);

        $user = auth()->user();
        // dd(auth()->user()->getGroups());
        $nip = $user->nip;
        // dd($nip);
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'loginUser' => $this->dosenModel->get_nip_peneliti($nip)
        ];
        // dd($data['loginUser']);
        return view('dosen/tampilan/index', $data);
    }

    // public function hitungAnggaran($coba2){
    //     dd($coba2['dana_keluar']);
    // }

    public function anggaran()
    {
        $dana_awal = new AnggaranAwalModel();
        $dana_penelitian = new DanaPenelitianModel();
        $dana_pkm = new DanaPKMModel();
        $dana_terealisasi = new AnggaranTotalModel();
        $dana_pengajuan = new PenelitianModel();

        //ambil dana penelitian
        $ambil_penelitian = $dana_penelitian->findAll();
        $ambil_pkm = $dana_pkm->findAll();

        //ambil dana terealisasi
        $total = null;
        foreach ($ambil_penelitian as $data) {
            $total = $total + $data['dana_keluar'];
        };

        foreach ($ambil_pkm as $data) {
            $total = $total + $data['dana_keluar'];
        }

        //ambil dana total 
        $anggaranAwal = $dana_awal->orderBy('id_tahunAnggaran', 'DESC')->first();

        //current year
        $year = date("Y");

        $input_terealisasi = [
            'tahun' => $year,
            'dana_keluar' => $total,
            'sisa_anggaran' => $anggaranAwal['jumlah'] - $total
        ];

        // update data tabel anggaran_total
        //update data table anggaran_total harusnya ketika BAU klik "cairkan dana"
        $total_saved = $dana_terealisasi->save($input_terealisasi);

        //ambil dana pengajuan 
        $ambil_pengajuan = $dana_pengajuan->findAll();
        $total_pengajuan = 0;
        foreach ($ambil_pengajuan as $data_pengajuan) {
            if (($data_pengajuan['id_status'] == 5) or ($data_pengajuan['id_status'] == 4)) {
                $total_pengajuan = $total_pengajuan + $data_pengajuan['biaya'];
            }
        }


        //semua dana
        $data = [
            'title'               => 'PPPM Politeknik Statistika STIS',
            'anggaranAwal'        => $dana_awal->orderBy('id_tahunAnggaran', 'DESC')->first(),
            'anggaranTerealisasi' =>  $dana_terealisasi->orderBy('id_total', 'DESC')->first(),
            'anggaranDiajukan'    => $total_pengajuan
        ];

        return view('dosen/tampilan/anggaran', $data);
    }

    public function penelitian()
    {
        //mengambil data user yang sedang login
        $user = auth()->user();
        // $nip = $user->nip;
        // dd($nip);
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $this->timPenelitiModel->get_penelitian_by_nip_user($user->nip),
        ];
        // dd($data['penelitian']);
        return view('dosen/tampilan/penelitian', $data);
    }

    public function pkm()
    {
        $pkmModel = new PkmModel();
        $user = auth()->user();
        // $nip = $user->nip;
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'pkm' => $this->timPKMModel->get_pkm_by_nip_user($user->nip),

        ];
        // dd($data['pkm']);
        return view('dosen/tampilan/pkm', $data);
    }

    public function pkmjenis()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/pkmjenis', $data);
    }

    public function penelitianjenis()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/penelitianjenis', $data);
    }

    public function penelitianForm($jenis)
    {
        session();
        if ($jenis == "mandiri") {
            $jenisPenelitian = "Mandiri";
        } elseif ($jenis == "semi-mandiri") {
            $jenisPenelitian = "Semi Mandiri";
        } elseif ($jenis == "kerja-sama") {
            $jenisPenelitian = "Kerjasama";
        } elseif ($jenis == "di-    danai-institusi") {
            $jenisPenelitian = "Di Danai Institusi";
        } elseif ($jenis == "institusi") {
            $jenisPenelitian = "Institusi";
        }
        // dd($jenisPenelitian);
        // dd($jenisPenelitian)198512122008011004

        $nipdosen = $this->dosenModel->get_nip_peneliti(auth()->user()->nip);

        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'jenis' => $jenisPenelitian,
            'user' => $nipdosen,
            'validation' => \Config\Services::validation()
        ];
        // return view('dosen/tampilan/penelitianForm1', $data);
        return view('dosen/tampilan/penelitianForm', $data);
    }

    // public function penelitianMandiri()
    // {
    //     session();
    //     $data = [
    //         'title' => 'PPPM Politeknik Statistika STIS',
    //         'jenis' => 'Mandiri',
    //         'validation' => \Config\Services::validation()
    //     ];
    //     // return view('dosen/tampilan/penelitianForm1', $data);
    //     return view('dosen/tampilan/penelitianForm', $data);
    // }

    // public function penelitianKerjasama()
    // {
    //     session();
    //     $data = [
    //         'title' => 'PPPM Politeknik Statistika STIS',
    //         'jenis' => 'Kerjasama',
    //         'validation' => \Config\Services::validation()
    //     ];
    //     return view('dosen/tampilan/penelitianForm', $data);
    //     // return view('dosen/tampilan/penelitianForm1', $data);
    // }

    // public function penelitianSemiMandiri()
    // {
    //     session();
    //     $nipdosen = $this->dosenModel->get_nip_peneliti(auth()->user()->nip);
    //     $data = [
    //         'title' => 'PPPM Politeknik Statistika STIS',
    //         'jenis' => 'Semi Mandiri',
    //         'user' => $nipdosen,
    //         'validation' => \Config\Services::validation()
    //     ];
    //     return view('dosen/tampilan/penelitianForm', $data);
    //     // return view('dosen/tampilan/penelitianForm2', $data);
    // }

    // public function penelitianDidanaiInstitusi()
    // {
    //     session();
    //     $data = [
    //         'title' => 'PPPM Politeknik Statistika STIS',
    //         'jenis' => 'Di Danai Institusi',
    //         'validation' => \Config\Services::validation()
    //     ];
    //     return view('dosen/tampilan/penelitianForm', $data);
    //     // return view('dosen/tampilan/penelitianForm2', $data);
    // }

    // public function penelitianInstitusi()
    // {
    //     session();
    //     $data = [
    //         'title' => 'PPPM Politeknik Statistika STIS',
    //         'jenis' => 'Institusi',
    //         'validation' => \Config\Services::validation()
    //     ];
    //     // return view('dosen/tampilan/penelitianForm2', $data);
    //     return view('dosen/tampilan/penelitianForm', $data);
    // }

    public function pkmForm($jenis)
    {
        $nipdosen = $this->dosenModel->get_nip_peneliti(auth()->user()->nip);
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'jenis' => $jenis,
            'user' => $nipdosen,
        ];
        // dd($data['jenis']);
        return view('dosen/tampilan/pkmForm', $data);
    }

    // public function pkmMandiri()
    // {
    //     $nipdosen = $this->dosenModel->get_nip_peneliti(auth()->user()->nip);
    //     $data = [
    //         'title' => 'PPPM Politeknik Statistika STIS',
    //         'jenis' => 'Mandiri',
    //         'user' => $nipdosen,
    //     ];
    //     return view('dosen/tampilan/pkmMandiri', $data);
    // }

    // public function pkmKelompok()
    // {
    //     $nipdosen = $this->dosenModel->get_nip_peneliti(auth()->user()->nip);
    //     $data = [
    //         'user' => $nipdosen,
    //         'title' => 'PPPM Politeknik Statistika STIS',
    //         'jenis' => 'Kelompok'
    //     ];
    //     return view('dosen/tampilan/pkmKelompok', $data);
    // }

    // public function pkmTerstruktur()
    // {
    //     $nipdosen = $this->dosenModel->get_nip_peneliti(auth()->user()->nip);
    //     $data = [
    //         'title' => 'PPPM Politeknik Statistika STIS',
    //         'user' => $nipdosen,
    //         'jenis' => 'Terstruktur'
    //     ];
    //     return view('dosen/tampilan/pkmTerstruktur', $data);
    // }

    // public function penelitianSemiMandiri1($id_penelitian)
    // {
    //     $data = [
    //         'title' => 'PPPM Politeknik Statistika STIS',
    //         'penelitian' => $this->penelitianModel->find($id_penelitian)
    //     ];
    //     return view('dosen/tampilan/penelitianProses/penelitianSemiMandiri1', $data);
    // }

    // public function penelitianSemiMandiri2()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('dosen/tampilan/penelitianProses/penelitianSemiMandiri2', $data);
    // }

    // public function penelitianSemiMandiri3()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('dosen/tampilan/penelitianProses/penelitianSemiMandiri3', $data);
    // }

    // public function penelitianSemiMandiri4()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('dosen/tampilan/penelitianProses/penelitianSelesai', $data);
    // }

    // public function penelitianDidanaiInstitusi1()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('dosen/tampilan/penelitianProses/penelitianProses1', $data);
    // }

    // public function penelitianDidanaiInstitusi2()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('dosen/tampilan/penelitianProses/penelitianProses2', $data);
    // }

    // public function penelitianDidanaiInstitusi3()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('dosen/tampilan/penelitianProses/penelitianProses3', $data);
    // }

    // public function penelitianDidanaiInstitusi4()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('dosen/tampilan/penelitianProses/penelitianSelesai', $data);
    // }


    // public function penelitianInstitusi1()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('dosen/tampilan/penelitianProses/penelitianProses1', $data);
    // }

    // public function penelitianInstitusi2()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('dosen/tampilan/penelitianProses/penelitianProses2', $data);
    // }

    // public function penelitianInstitusi3()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('dosen/tampilan/penelitianProses/penelitianProses3', $data);
    // }

    // public function penelitianInstitusi4()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('dosen/tampilan/penelitianProses/penelitianSelesai', $data);
    // }

    // ======================PKM Detail=========================
    public function pkmDetail1($idPKM)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'pkm' => $this->pkmModel->find($idPKM)
        ];
        return view('dosen/tampilan/pkmProses/pkmProses1', $data);
    }

    public function pkmDetail2($idPKM)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'pkm' => $this->pkmModel->find($idPKM),
            'validation' => \Config\Services::validation(),
        ];
        return view('dosen/tampilan/pkmProses/pkmProses2', $data);
    }

    public function pkmDetail3($idPKM)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'pkm' => $this->pkmModel->find($idPKM)
        ];
        return view('dosen/tampilan/pkmProses/pkmProses3', $data);
    }

    public function pkmDetail4($idPKM)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'pkm' => $this->pkmModel->find($idPKM)
        ];
        return view('dosen/tampilan/pkmProses/pkmSelesai', $data);
    }

    //======================PKM Detail=========================

    // public function pkmMandiri1()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('dosen/tampilan/pkmProses/pkmProses1', $data);
    // }

    // public function pkmMandiri2()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('dosen/tampilan/pkmProses/pkmProses2', $data);
    // }

    // public function pkmMandiri3()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('dosen/tampilan/pkmProses/pkmProses3', $data);
    // }

    // public function pkmMandiri4()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('dosen/tampilan/pkmProses/pkmSelesai', $data);
    // }

    // public function pkmTerstruktur1()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('dosen/tampilan/pkmProses/pkmProses1', $data);
    // }

    // public function pkmTerstruktur2()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('dosen/tampilan/pkmProses/pkmProses2', $data);
    // }

    // public function pkmTerstruktur3()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('dosen/tampilan/pkmProses/pkmProses3', $data);
    // }

    // public function pkmTerstruktur4()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('dosen/tampilan/pkmProses/pkmSelesai', $data);
    // }

    // public function pkmKelompok1()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('dosen/tampilan/pkmProses/pkmProses1', $data);
    // }

    // public function pkmKelompok2()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('dosen/tampilan/pkmProses/pkmProses2', $data);
    // }

    // public function pkmKelompok3()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('dosen/tampilan/pkmProses/pkmProses3', $data);
    // }

    // public function pkmKelompok4()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('dosen/tampilan/pkmProses/pkmSelesai', $data);
    // }
    //===========================new===========================================
    public function penelitianProses1($id_penelitian)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $this->penelitianModel->find($id_penelitian)
        ];
        return view('dosen/tampilan/penelitianProses/penelitianDetail1', $data);
    }
    public function penelitianProses2($id_penelitian)
    {
        //Mencari Laporan dengan id penelitian
        $laporan = $this->laporanPenelitianModel->find_by_idpenelitian($id_penelitian);

        // if (($laporan['kontrak'] == null || $laporan['laporan_dana'] == null)) {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $this->penelitianModel->find($id_penelitian),
            'validation' => \Config\Services::validation(),
            'laporan' => $this->laporanPenelitianModel->find_by_idpenelitian($id_penelitian)
        ];
        return view('dosen/tampilan/penelitianProses/penelitianDetail2', $data);
    }
    public function penelitianProses2Kontrak($id_penelitian)
    {
        $this->laporanPenelitianModel->find_by_idpenelitian($id_penelitian);
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $this->penelitianModel->find($id_penelitian),
            'validation' => \Config\Services::validation(),
            'laporan' => $this->laporanPenelitianModel->find_by_idpenelitian($id_penelitian)
        ];
        return view('dosen/tampilan/penelitianProses/penelitianDetail2Kontrak', $data);
    }
    public function penelitianProses3($id_penelitian)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $this->penelitianModel->find($id_penelitian),
            'laporan' => $this->laporanPenelitianModel->find_by_idpenelitian($id_penelitian),
            'validation' => \Config\Services::validation()
        ];
        return view('dosen/tampilan/penelitianProses/penelitianDetail3', $data);
    }
    public function penelitianProses4($id_penelitian)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $this->penelitianModel->find($id_penelitian)
        ];
        return view('dosen/tampilan/penelitianProses/penelitianDetail4', $data);
    }


    public function editProfil()
    {
        if (!$this->validate([
            'fotoProfil' => [
                'rules' => 'uploaded[fotoProfil]',
                'errors' => [
                    'uploaded' => "{field} file tidak boleh kosong"
                ]
            ]
        ])) {
            $this->dosenModel->save([
                'NIP_dosen' => auth()->user()->nip,
                'nama_dosen' => $this->request->getVar('namaLengkap'),
                'email_dosen' => $this->request->getVar('email'),
                'minat_penelitian' => $this->request->getVar('minat'),
                'no_hp' => $this->request->getVar('hp'),
                'google_scholar' => $this->request->getVar('scholar'),
                'link_sinta' => $this->request->getVar('sinta'),
                'link_orcid' => $this->request->getVar('orcid'),
                'link_wos' => $this->request->getVar('wos'),
                'link_scopus' => $this->request->getVar('scopus'),
            ]);
        } else {
            $fileFoto = $this->request->getFile('fotoProfil');
            $namaFoto = $fileFoto->getName();
            $fileFoto->move('foto_profil', $namaFoto);
            // if ($fileFoto == null) {
            //     $namaFoto = -;
            // } else {
            // }
            $this->dosenModel->save([
                'NIP_dosen' => auth()->user()->nip,
                'nama_dosen' => $this->request->getVar('namaLengkap'),
                'email_dosen' => $this->request->getVar('email'),
                'minat_penelitian' => $this->request->getVar('minat'),
                'foto_dosen' => $namaFoto,
                'no_hp' => $this->request->getVar('hp'),
                'google_scholar' => $this->request->getVar('scholar'),
                'link_sinta' => $this->request->getVar('sinta'),
                'link_orcid' => $this->request->getVar('orcid'),
                'link_wos' => $this->request->getVar('wos'),
                'link_scopus' => $this->request->getVar('scopus'),
            ]);
        }
        session()->setFlashdata('pesan', 'Data berhasil diedit');
        // $response = ['status' => 200, 'error' => null, 'messages' => ['success' => 'Data produk berhasil ditambah.']];

        return redirect()->to('/indexDosen');
    }

    public function reimburse()
    {
        //mengambil data user yang sedang login
        $user = auth()->user();

        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $this->penelitianModel->get_penelitian_done($user->nip, 10),
            'pkm' => $this->pkmModel->get_pkm_done($user->nip, 7),

        ];

        return view('dosen/tampilan/reimburse', $data);
    }


    public function detailReimburse($id_kegiatan)
    {

        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $this->penelitianModel->find($id_kegiatan),
            // 'kegiatan' => $kegiatan,
            //'loa' => $this->penelitianModel->get_penelitian($id_kegiatan),
            // 'naskah_artikel' => $this->reimburseModel->get_id_penelitian($id_kegiatan),
            // 'bukti_pembayaran' => $this->reimburseModel->get_id_penelitian($id_kegiatan),
            'validation' => \Config\Services::validation()
        ];

        return view('dosen/tampilan/detailReimburse', $data);
    }


    public function detailReimburse2($id_kegiatan)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            // 'kegiatan' => $kegiatan,
            'pkm' => $this->pkmModel->find($id_kegiatan),
            'validation' => \Config\Services::validation()
        ];
        return view('dosen/tampilan/detailReimburse2', $data);
    }
}
