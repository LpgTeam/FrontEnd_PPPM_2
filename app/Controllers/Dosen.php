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

    public function __construct()
    {
        $this->penelitianModel = new PenelitianModel();
        $this->dosenModel = new DosenModel();
        $this->timPenelitiModel = new TimPenelitiModel();
        $this->timPKMModel = new TimPKMModel();
        $this->laporanPenelitianModel = new LaporanPenelitianModel();
    }

    public function index()
    {
        $user = auth()->user();
        $nip = $user->nip;
        // dd($user);
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
        $total_saved = $dana_terealisasi->save($input_terealisasi);

        //semua dana
        $data = [
            'title'               => 'PPPM Politeknik Statistika STIS',
            'anggaranAwal'        => $dana_awal->orderBy('id_tahunAnggaran', 'DESC')->first(),
            'anggaranTerealisasi' =>  $dana_terealisasi->orderBy('id_total', 'DESC')->first()
        ];
        //dd($data['jumlah']);

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

    public function penelitianMandiri()
    {
        session();
        $nipdosen = $this->dosenModel->get_nip_peneliti(auth()->user()->nip);
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'user' => $nipdosen,
            'jenis' => 'Mandiri',
            'validation' => \Config\Services::validation()
        ];
        // return view('dosen/tampilan/penelitianForm1', $data);
        return view('dosen/tampilan/penelitianForm', $data);
    }

    public function penelitianKerjasama()
    {
        session();
        $nipdosen = $this->dosenModel->get_nip_peneliti(auth()->user()->nip);
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'user' => $nipdosen,
            'jenis' => 'Kerjasama',
            'validation' => \Config\Services::validation()
        ];
        return view('dosen/tampilan/penelitianForm', $data);
        // return view('dosen/tampilan/penelitianForm1', $data);
    }

    public function penelitianSemiMandiri()
    {
        session();
        $nipdosen = $this->dosenModel->get_nip_peneliti(auth()->user()->nip);
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'jenis' => 'Semi Mandiri',
            'user' => $nipdosen,
            'validation' => \Config\Services::validation()
        ];
        return view('dosen/tampilan/penelitianForm', $data);
        // return view('dosen/tampilan/penelitianForm2', $data);
    }

    public function penelitianDidanaiInstitusi()
    {
        session();
        $nipdosen = $this->dosenModel->get_nip_peneliti(auth()->user()->nip);
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'user' => $nipdosen,
            'jenis' => 'Di Danai Institusi',
            'validation' => \Config\Services::validation()
        ];
        return view('dosen/tampilan/penelitianForm', $data);
        // return view('dosen/tampilan/penelitianForm2', $data);
    }

    public function penelitianInstitusi()
    {
        session();
        $nipdosen = $this->dosenModel->get_nip_peneliti(auth()->user()->nip);
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'jenis' => 'Institusi',
            'user' => $nipdosen,
            'validation' => \Config\Services::validation()
        ];
        // return view('dosen/tampilan/penelitianForm2', $data);
        return view('dosen/tampilan/penelitianForm', $data);
    }

    public function pkmMandiri()
    {
        $nipdosen = $this->dosenModel->get_nip_peneliti(auth()->user()->nip);
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'jenis' => 'Mandiri',
            'user' => $nipdosen,
        ];
        return view('dosen/tampilan/pkmMandiri', $data);
    }

    public function pkmKelompok()
    {
        $nipdosen = $this->dosenModel->get_nip_peneliti(auth()->user()->nip);
        $data = [
            'user' => $nipdosen,
            'title' => 'PPPM Politeknik Statistika STIS',
            'jenis' => 'Kelompok'
        ];
        return view('dosen/tampilan/pkmKelompok', $data);
    }

    public function pkmTerstruktur()
    {
        $nipdosen = $this->dosenModel->get_nip_peneliti(auth()->user()->nip);
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'user' => $nipdosen,
            'jenis' => 'Terstruktur'
        ];
        return view('dosen/tampilan/pkmTerstruktur', $data);
    }

    public function penelitianSemiMandiri1($id_penelitian)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $this->penelitianModel->find($id_penelitian)
        ];
        return view('dosen/tampilan/penelitianProses/penelitianSemiMandiri1', $data);
    }

    public function penelitianSemiMandiri2()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/penelitianProses/penelitianSemiMandiri2', $data);
    }

    public function penelitianSemiMandiri3()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/penelitianProses/penelitianSemiMandiri3', $data);
    }

    public function penelitianSemiMandiri4()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/penelitianProses/penelitianSelesai', $data);
    }

    public function penelitianDidanaiInstitusi1()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/penelitianProses/penelitianProses1', $data);
    }

    public function penelitianDidanaiInstitusi2()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/penelitianProses/penelitianProses2', $data);
    }

    public function penelitianDidanaiInstitusi3()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/penelitianProses/penelitianProses3', $data);
    }

    public function penelitianDidanaiInstitusi4()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/penelitianProses/penelitianSelesai', $data);
    }


    public function penelitianInstitusi1()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/penelitianProses/penelitianProses1', $data);
    }

    public function penelitianInstitusi2()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/penelitianProses/penelitianProses2', $data);
    }

    public function penelitianInstitusi3()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/penelitianProses/penelitianProses3', $data);
    }

    public function penelitianInstitusi4()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/penelitianProses/penelitianSelesai', $data);
    }


    public function pkmMandiri1()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/pkmProses/pkmProses1', $data);
    }

    public function pkmMandiri2()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/pkmProses/pkmProses2', $data);
    }

    public function pkmMandiri3()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/pkmProses/pkmProses3', $data);
    }

    public function pkmMandiri4()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/pkmProses/pkmSelesai', $data);
    }

    public function pkmTerstruktur1()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/pkmProses/pkmProses1', $data);
    }

    public function pkmTerstruktur2()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/pkmProses/pkmProses2', $data);
    }

    public function pkmTerstruktur3()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/pkmProses/pkmProses3', $data);
    }

    public function pkmTerstruktur4()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/pkmProses/pkmSelesai', $data);
    }

    public function pkmKelompok1()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/pkmProses/pkmProses1', $data);
    }

    public function pkmKelompok2()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/pkmProses/pkmProses2', $data);
    }

    public function pkmKelompok3()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/pkmProses/pkmProses3', $data);
    }

    public function pkmKelompok4()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/pkmProses/pkmSelesai', $data);
    }
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
            'laporan' => $this->laporanPenelitianModel->find_by_idpenelitian($id_penelitian)
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
}
