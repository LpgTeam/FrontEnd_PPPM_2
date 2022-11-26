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

class Dosen extends BaseController
{
    use ResponseTrait;
    protected $penelitianModel;
    protected $dosenModel;
    protected $timPenelitiModel;
    protected $timPKMModel;
    protected $laporanPenelitianModel;
    protected $pkmModel;

    public function __construct()
    {
        $this->penelitianModel = new PenelitianModel();
        $this->dosenModel = new DosenModel();
        $this->timPenelitiModel = new TimPenelitiModel();
        $this->timPKMModel = new TimPKMModel();
        $this->pkmModel = new PkmModel();
        $this->laporanPenelitianModel = new LaporanPenelitianModel();
    }

    public function index()
    {
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
        foreach($ambil_pengajuan as $data_pengajuan){
            if(($data_pengajuan['id_status'] == 5) or ($data_pengajuan['id_status'] == 4)){
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
        session();
        //mengambil data user yang sedang login
        $user = auth()->user();
        // $nip = $user->nip;
        // dd($nip);
        $laporan = $this->timPenelitiModel->get_penelitian_by_nip_user($user->nip);
        // dd($laporan);

        // if($laporan["jenis_penelitian"]=="Semi Mandiri"){
        //     if($laporan["laporan_dana"]==null) $proses = "2";
        //     else $proses = "3";
        // }
        // if(($laporan["jenis_penelitian"]=="Di Danai Institusi" ) || ($laporan["jenis_penelitian"]=="Institusi" )){
        //     if($laporan["kontrak"]==null) $proses = "2Kontrak";
        //     else $proses = "3";
        // }
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $this->timPenelitiModel->get_penelitian_by_nip_user($user->nip),
            'validation' => \Config\Services::validation()
            // 'laporan' => $this->laporanPenelitianModel->find_by_idpenelitian($id_penelitian)
            // 'proses' => $proses,
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
        } elseif ($jenis == "didanai-institusi") {
            $jenisPenelitian = "Di Danai Institusi";
        } elseif ($jenis == "institusi") {
            $jenisPenelitian = "Institusi";
        }

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


    public function pkmForm($jenis)
    {
        $nipdosen = $this->dosenModel->get_nip_peneliti(auth()->user()->nip);
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'validation' => \Config\Services::validation(),
            'jenis' => $jenis,
            'user' => $nipdosen,
        ];
        // dd($data['jenis']);
        return view('dosen/tampilan/pkmForm', $data);
    }


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
            'pkm' => $this->pkmModel->find($idPKM)
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
            'laporan' => $laporan
        ];
        return view('dosen/tampilan/penelitianProses/penelitianDetail2', $data);
        // } else {
        //     $data = [
        //         'title' => 'PPPM Politeknik Statistika STIS',
        //         'penelitian' => $this->penelitianModel->find($id_penelitian),
        //         'laporan' => $laporan
        //     ];
        //     return view('dosen/tampilan/penelitianProses/penelitianDetail3', $data);
        // }
    }
    public function penelitianProses2Kontrak($id_penelitian)
    {
        $laporan = $this->laporanPenelitianModel->find_by_idpenelitian($id_penelitian);

        // if (!($laporan['kontrak'] == null || $laporan['laporan_dana'] == null)) {
            $data = [
                'title' => 'PPPM Politeknik Statistika STIS',
                'penelitian' => $this->penelitianModel->find($id_penelitian),
                'validation' => \Config\Services::validation(),
                'laporan' => $laporan
            ];
            return view('dosen/tampilan/penelitianProses/penelitianDetail2Kontrak', $data);
        // } else {
        //     // $data = [
        //     //     'title' => 'PPPM Politeknik Statistika STIS',
        //     //     'penelitian' => $this->penelitianModel->find($id_penelitian),
        //     //     'laporan' => $laporan
        //     // ];
        //     // return view('dosen/tampilan/penelitianProses/penelitianDetail3', $data);
        //     penelitianProses3($id_penelitian);
        // }
    }
    public function penelitianProses3($id_penelitian)
    {
        $laporan = $this->laporanPenelitianModel->find_by_idpenelitian($id_penelitian);

        // if (($laporan['laporan_luaran'] == null)) {
            $data = [
                'title' => 'PPPM Politeknik Statistika STIS',
                'penelitian' => $this->penelitianModel->find($id_penelitian),
                'laporan' => $laporan,
                'validation' =>\Config\Services::validation()
            ];
            return view('dosen/tampilan/penelitianProses/penelitianDetail3', $data);
        // } 
        // else {
        //     $data = [
        //         'title' => 'PPPM Politeknik Statistika STIS',
        //         'penelitian' => $this->penelitianModel->find($id_penelitian)
        //     ];
        //     return view('dosen/tampilan/penelitianProses/penelitianDetail4', $data);
        // }
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
}
