<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggaranAwalModel;
use App\Models\AnggaranTotalModel;
use App\Models\PenelitianModel;
use App\Models\PkmModel;

class Anggaran extends BaseController
{
    public function __construct()
    {
        $this->anggaranAwalModel = new AnggaranAwalModel();
        $this->anggaranTotalModel = new AnggaranTotalModel();
        $this->penelitianModel = new PenelitianModel();
        $this->pkmModel = new PkmModel();
    }

    public function index()
    {
        //
    }

    public function anggaran(){
        //current year
        $year = date("Y");
        $penelitianDiajukan = $this->penelitianModel->get_total_diajukan($year);
        $pkmDiajukan = $this->pkmModel->get_total_diajukan($year);
        $danaDiajukan = $penelitianDiajukan + $pkmDiajukan;
        $sisaAnggaran = $this->anggaranTotalModel->get_sisa_terakhir();
        
       $data = [
            'title'             => 'PPPM Politeknik Statistika STIS',
            'anggaranAwal'      => $this->anggaranAwalModel->get_dana(),
            'danaTerealisasi'   => $this->anggaranTotalModel->get_total($year),
            'danaDiajukan'      => $danaDiajukan,
            'danaTersedia'      => $sisaAnggaran - $danaDiajukan
       ];
       return view('dosen/tampilan/anggaran', $data);

    }
}