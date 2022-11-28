<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenelitianModel;
use App\Models\AnggaranAwalModel;
use App\Models\AnggaranTotalModel;
use App\Models\DanaAwalDosenModel;
use App\Models\DanaPenelitianModel;
use App\Models\DanaPKMModel;

use function PHPUnit\Framework\isNull;

class Admin extends BaseController
{
    public function index()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('adminPPPM/tampilan/index', $data);
    }

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
        $total_pengajuan = null;
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

        return view('adminPPPM/tampilan/anggaran', $data);
    }

    public function penelitian()
    {
        $penelitianModel = new PenelitianModel();
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $penelitianModel->getData(),
        ];
        return view('adminPPPM/tampilan/penelitian', $data);
    }

    public function pkm()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('adminPPPM/tampilan/pkm', $data);
    }

    public function adminSemiMandiri1($idPenelitian)
    {
        $penelitianModel = new PenelitianModel();
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' =>$penelitianModel->find($idPenelitian)
        ];
        return view('adminPPPM/tampilan/penelitianProses/adminSemiMandiri1', $data);
    }

    public function adminSemiMandiri2()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('adminPPPM/tampilan/penelitianProses/adminSemiMandiri2', $data);
    }

    public function adminSemiMandiri3()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('adminPPPM/tampilan/penelitianProses/adminSemiMandiri3', $data);
    }

    public function adminProses1()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('adminPPPM/tampilan/penelitianProses/adminProses1', $data);
    }

    public function adminProses2()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('adminPPPM/tampilan/penelitianProses/adminProses2', $data);
    }

    public function adminProses3()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('adminPPPM/tampilan/penelitianProses/adminProses3', $data);
    }

    public function pkmAdminProses1()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('adminPPPM/tampilan/pkmProses/pkmProses1', $data);
    }

    public function pkmAdminProses2()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('adminPPPM/tampilan/pkmProses/pkmProses2', $data);
    }

    // public function userSetting()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('adminPPPM/tampilan/userSetting', $data);
    // }

    // public function editUser()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('adminPPPM/tampilan/editUser', $data);
    // }
}
