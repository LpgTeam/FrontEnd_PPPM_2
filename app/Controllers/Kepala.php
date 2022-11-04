<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenelitianModel;
use App\Models\AnggaranAwalModel;
use App\Models\AnggaranTotalModel;
use App\Models\DanaAwalDosenModel;
use App\Models\DanaPenelitianModel;
use App\Models\DanaPKMModel;

class Kepala extends BaseController
{
    public function index()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('kepala/tampilan/index', $data);
    }

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

        return view('kepala/tampilan/anggaran', $data);
    }

    public function penelitian()
    {
        $penelitianModel = new PenelitianModel();
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $penelitianModel->getData(),
        ];
        return view('kepala/tampilan/penelitian', $data);
    }

    public function penelitianPersetujuan()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('kepala/tampilan/penelitianPersetujuan', $data);
    }

    public function pkm()
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS'
        ];
        return view('kepala/tampilan/pkm', $data);
    }

    public function pkmPersetujuan()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('kepala/tampilan/pkmPersetujuan', $data);
    }
}
