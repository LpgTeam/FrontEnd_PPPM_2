<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\PenelitianModel;
use App\Models\DosenModel;
use App\Models\PkmModel;
use App\Models\TimPKMModel;
use App\Models\LuaranTargetModel;
use CodeIgniter\I18n\Time;
use App\Libraries\Pdfgenerator;

class ProposalPKM extends BaseController
{
    use ResponseTrait;
    protected $penelitianModel;
    protected $ketuatimpenelitiModel;
    protected $timpenelitiModel;
    protected $dosenModel;
    protected $luaranModel;
    protected $pkmModel;

    public function __construct()
    {
        $this->timpkmModel = new TimPKMModel();
        $this->dosenModel = new DosenModel();
        $this->pkmModel = new PkmModel();
    }

    public function download_proposal($id_pkm)
    {
        $Pdfgenerator = new Pdfgenerator();

        $dataPkm = [
            'pkm'    => $this->pkmModel->find($id_pkm),
            'anggotapkm'   => $this->timpkmModel->get_anggota_timpkm($id_pkm),
            'timpkm'   => $this->timpkmModel->get_timpkm_byid($id_pkm),
        ];

        $file_pdf = 'Form Pengajuan Kegiatan PKM - ';
        // . $dataPkm['penelitian']['judul_penelitian'];
        $paper = 'A4';
        $orientation = "portrait";
        $html = view('proposal/PKM/Form_Pengajuan', $dataPkm);
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
