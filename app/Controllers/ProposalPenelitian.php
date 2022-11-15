<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\PenelitianModel;
use App\Models\DosenModel;
use App\Models\TimPenelitiModel;
use CodeIgniter\I18n\Time;
use App\Libraries\Pdfgenerator;

class ProposalPenelitian extends BaseController
{
    use ResponseTrait;
    protected $penelitianModel;
    protected $ketuatimpenelitiModel;
    protected $timpenelitiModel;
    protected $dosenModel;
    public function __construct()
    {
        $this->penelitianModel = new PenelitianModel();
        $this->timpenelitiModel = new TimPenelitiModel();
        $this->ketuatimpenelitiModel = new TimPenelitiModel();
        $this->dosenModel = new DosenModel();
    }

    public function download_P1_proposal($id_penelitian)
    {
        $Pdfgenerator = new Pdfgenerator();
        // title dari pdf
        $this->data['title_pdf'] = 'Proposal';

        $timpeneliti = $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian);
        // $penelitian = $this->penelitianModel->find($id_penelitian);

        $dataPenelitian = [
            'penelitian'    => $this->penelitianModel->find($id_penelitian),
            'timpeneliti'   => $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian),
        ];

        // dd($dataPenelitian);
        // filename dari pdf ketika didownload
        $file_pdf = 'P1. Halaman Sampul - ' . $dataPenelitian['penelitian']['judul_penelitian'];
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = view('proposal/P1_proposal', $dataPenelitian);

        // run dompdf
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function download_P2_proposal($id_penelitian)
    {
        $Pdfgenerator = new Pdfgenerator();

        // $timpeneliti = $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian);
        // $penelitian = $this->penelitianModel->find($id_penelitian);

        $dataPenelitian = [
            'penelitian'    => $this->penelitianModel->find($id_penelitian),
            'timpeneliti'   => $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian),
        ];

        $file_pdf = 'P2. Halaman Pengesahan - ' . $dataPenelitian['penelitian']['judul_penelitian'];
        $paper = 'A4';
        $orientation = "portrait";
        $html = view('proposal/P2_proposal', $dataPenelitian);
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function download_P3_proposal($id_penelitian)
    {
        $Pdfgenerator = new Pdfgenerator();

        // $timpeneliti = $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian);
        // $penelitian = $this->penelitianModel->find($id_penelitian);

        $dataPenelitian = [
            'penelitian'    => $this->penelitianModel->find($id_penelitian),
            'timpeneliti'   => $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian),
        ];

        $file_pdf = 'P3. Surat Pernyataan - ' . $dataPenelitian['penelitian']['judul_penelitian'];
        $paper = 'A4';
        $orientation = "portrait";
        $html = view('proposal/P3_proposal', $dataPenelitian);
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function download_P4_proposal($id_penelitian)
    {
        $Pdfgenerator = new Pdfgenerator();

        // $timpeneliti = $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian);
        // $penelitian = $this->penelitianModel->find($id_penelitian);

        $dataPenelitian = [
            'penelitian'    => $this->penelitianModel->find($id_penelitian),
            'timpeneliti'   => $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian),
        ];

        $file_pdf = 'P4. Tugas Tim Peneliti - ' . $dataPenelitian['penelitian']['judul_penelitian'];
        $paper = 'A4';
        $orientation = "portrait";
        $html = view('proposal/P4_proposal', $dataPenelitian);
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }




    public function lihat_pdf()
    {
        $dataPenelitian = [
            'jenis_penelitian' => 'Mandiri',
            'judul_penelitian' => 'Testing judul Mandiri',
        ];

        return view('dosen/tampilan/fileDownloadProposal', $dataPenelitian);
    }
}
