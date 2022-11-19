<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\API\ResponseTrait;
use App\Models\AnggaranAwalModel;
use App\Models\AnggaranTotalModel;
use App\Models\DanaAwalDosenModel;
use App\Models\DanaPenelitianModel;
use App\Models\DanaPKMModel;
use App\Models\PenelitianModel;
use App\Models\PkmModel;

class Dosen extends BaseController
{
    use ResponseTrait;
    protected $penelitianModel;
    public function __construct()
    {
        $this->penelitianModel = new PenelitianModel();
    }

    public function index()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
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
        $penelitianModel = new PenelitianModel();
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $penelitianModel->getData(),
        ];
        return view('dosen/tampilan/penelitian', $data);
    }

    public function pkm()
    {
        $pkmModel = new PkmModel();
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'pkm' => $pkmModel->getData(),

        ];
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
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'jenis' => 'Mandiri',
            'validation' => \Config\Services::validation()
        ];
        // return view('dosen/tampilan/penelitianForm1', $data);
        return view('dosen/tampilan/penelitianForm', $data);
    }

    public function penelitianKerjasama()
    {
        session();
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'jenis' => 'Kerjasama',
            'validation' => \Config\Services::validation()
        ];
        return view('dosen/tampilan/penelitianForm', $data);
        // return view('dosen/tampilan/penelitianForm1', $data);
    }

    public function penelitianSemiMandiri()
    {
        session();
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'jenis' => 'Semi Mandiri',
            'validation' => \Config\Services::validation()
        ];
        return view('dosen/tampilan/penelitianForm', $data);
        // return view('dosen/tampilan/penelitianForm2', $data);
    }

    public function penelitianDidanaiInstitusi()
    {
        session();
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'jenis' => 'Di Danai Institusi',
            'validation' => \Config\Services::validation()
        ];
        return view('dosen/tampilan/penelitianForm', $data);
        // return view('dosen/tampilan/penelitianForm2', $data);
    }

    public function penelitianInstitusi()
    {
        session();
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'jenis' => 'Institusi',
            'validation' => \Config\Services::validation()
        ];
        // return view('dosen/tampilan/penelitianForm2', $data);
        return view('dosen/tampilan/penelitianForm', $data);
    }

    public function pkmMandiri()
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'jenis' => 'Mandiri'
        ];
        return view('dosen/tampilan/pkmMandiri', $data);
    }

    public function pkmKelompok()
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'jenis' => 'Kelompok'
        ];
        return view('dosen/tampilan/pkmKelompok', $data);
    }

    public function pkmTerstruktur()
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
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
            'validation' => \Config\Services::validation()
        ];
        return view('dosen/tampilan/penelitianProses/penelitianDetail2', $data);
    }
    public function penelitianProses2Kontrak($id_penelitian)
    {   
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $this->penelitianModel->find($id_penelitian),
            'validation' => \Config\Services::validation()
        ];
        return view('dosen/tampilan/penelitianProses/penelitianDetail2Kontrak', $data);
    }
    public function penelitianProses3($id_penelitian)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $this->penelitianModel->find($id_penelitian)
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
}
