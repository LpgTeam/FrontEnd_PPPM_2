<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\PenelitianModel;
use App\Models\DosenModel;
use App\Models\PkmModel;
use App\Models\PembiayaanPkmModel;
use App\Models\RincianPKMModel;
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
    protected $rincianModel;
    protected $biayaModel;

    public function __construct()
    {
        $this->timpkmModel = new TimPKMModel();
        $this->dosenModel = new DosenModel();
        $this->pkmModel = new PkmModel();
        $this->rincianModel = new RincianPKMModel();
        $this->biayaModel = new PembiayaanPkmModel;
    }

    public function download_proposal($id_pkm)
    {
        $Pdfgenerator = new Pdfgenerator();

        $dataPkm = [
            'pkm'    => $this->pkmModel->find($id_pkm),
            'anggotapkm'   => $this->timpkmModel->get_anggota_timpkm($id_pkm),
            'timpkm'   => $this->timpkmModel->get_timpkm_byid($id_pkm),
            'biaya' => $this->biayaModel->find_by_idpkm($id_pkm)
        ];

        $file_pdf = 'Form Pengajuan Kegiatan PKM - ';
        // . $dataPkm['penelitian']['judul_penelitian'];
        $paper = 'A4';
        $orientation = "portrait";
        $html = view('proposal/PKM/Form_Pengajuan', $dataPkm);
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function download_surat_keterangan($id_pkm)
    {
        $Pdfgenerator = new Pdfgenerator();

        $dataPkm = [
            'pkm'    => $this->pkmModel->find($id_pkm),
            // 'peneliti' => $this->timpkmModel->get_data_timpkm_byId_Pkm($id_pkm),

            // 'peneliti' => $this->timpkmModel->get_data_timpkm($id_pkm),
            'peneliti' => $this->timpkmModel->get_timpkm_byid($id_pkm),
            'rincian'  => $this->rincianModel->find_by_idpkm($id_pkm)
        ];

        
        $file_pdf = 'Form Pengajuan Kegiatan PKM - ';
        // . $dataPkm['penelitian']['judul_penelitian'];
        $paper = 'A4';
        $orientation = "portrait";
        $html = view('proposal/PKM/Surat_Keterangan', $dataPkm);
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function download_laporan($idpkm)
    {
        $Pdfgenerator = new Pdfgenerator();

        $timpkm = $this->timpkmModel->get_data_timpkm_byId_Pkm($idpkm);
        // dd($timpkm);
        $dataPenelitian = [
            'pkm'    => $this->pkmModel->find($idpkm),
            'timpkm'   => $timpkm,
            'anggotapkm'   => $this->timpkmModel->get_anggota_timpkm($idpkm),
            'timpkm'   => $this->timpkmModel->get_timpkm_byid($idpkm),
            'biaya' => $this->biayaModel->find_by_idpkm($idpkm)
        ];
        // dd($dataPenelitian);
        // dd($dataPenelitian['timpeneliti']);

        $file_pdf = 'Proposal Penelitian - ' . $dataPenelitian['pkm']['topik_kegiatan'];
        $paper = 'A4';
        $orientation = "portrait";
        $html = view('proposal/pkm/all_pkm_proposal', $dataPenelitian);
        // $Pdfgenerator->set_option('isRemoteEnabled', TRUE);
        $hasil = $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
