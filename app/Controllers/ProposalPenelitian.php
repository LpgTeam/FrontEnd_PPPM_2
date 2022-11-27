<?php

namespace App\Controllers;

use mikehaertl\pdftk\src\Pdf;
use CodeIgniter\API\ResponseTrait;
use App\Models\PenelitianModel;
use App\Models\DosenModel;
use App\Models\TimPenelitiModel;
use App\Models\LaporanPenelitianModel;
use App\Models\LuaranTargetModel;
use CodeIgniter\I18n\Time;
use App\Libraries\Pdfgenerator;
// use App\Libraries\Pdfgenerator\Option;

class ProposalPenelitian extends BaseController
{
    use ResponseTrait;
    protected $laporanModel;
    protected $penelitianModel;
    protected $ketuatimpenelitiModel;
    protected $timpenelitiModel;
    protected $dosenModel;
    protected $luaranModel;
    public function __construct()
    {
        $this->penelitianModel = new PenelitianModel();
        $this->laporanModel = new LaporanPenelitianModel();
        $this->timpenelitiModel = new TimPenelitiModel();
        $this->ketuatimpenelitiModel = new TimPenelitiModel();
        $this->dosenModel = new DosenModel();
        $this->luaranModel = new LuaranTargetModel();
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
            // 'timpeneliti'   => $this->timpenelitiModel->get_anggota_timpeneliti($id_penelitian),
        ];

        // dd($dataPenelitian);
        // filename dari pdf ketika didownload
        $file_pdf = 'P1. Halaman Sampul - ' . $dataPenelitian['penelitian']['judul_penelitian'];
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = view('proposal/P1_proposal', $dataPenelitian);
        // $html->set_option('isRemoteEnabled', true);
        // run dompdf
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function download_P2_proposal($id_penelitian)
    {
        $Pdfgenerator = new Pdfgenerator();

        // $timpeneliti = $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian);
        // $penelitian = $this->penelitianModel->find($id_penelitian);
        $timpeneliti = $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian);
        // dd($timpeneliti[0]['NIP']);
        $dataPenelitian = [
            'penelitian'    => $this->penelitianModel->find($id_penelitian),
            'timpeneliti'   => $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian),
            'anggotapeneliti'   => $this->timpenelitiModel->get_anggota_timpeneliti($id_penelitian),
            'ketuapeneliti' => $this->dosenModel->get_nip_peneliti($timpeneliti[0]['NIP']),
        ];
        // dd($dataPenelitian['timpeneliti']);

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
        $timpeneliti = $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian);

        $dataPenelitian = [
            'penelitian'    => $this->penelitianModel->find($id_penelitian),
            'timpeneliti'   => $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian),
            'ketuapeneliti' => $this->dosenModel->get_nip_peneliti($timpeneliti[0]['NIP']),
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

    public function download_P5_proposal($id_penelitian)
    {
        $Pdfgenerator = new Pdfgenerator();

        $dataPenelitian = [
            'penelitian'    => $this->penelitianModel->find($id_penelitian),
            'timpeneliti'   => $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian),
            'luaran'        => $this->luaranModel->get_luaran_byid($id_penelitian),
        ];

        $file_pdf = 'P5. Luaran dan Target Capaian - ' . $dataPenelitian['penelitian']['judul_penelitian'];
        $paper = 'A4';
        $orientation = "portrait";
        $html = view('proposal/P5_proposal', $dataPenelitian);
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function download_all_proposal($id_penelitian)
    {
        $Pdfgenerator = new Pdfgenerator();

        $timpeneliti = $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian);

        $dataPenelitian = [
            'penelitian'    => $this->penelitianModel->find($id_penelitian),
            'timpeneliti'   => $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian),
            'anggotapeneliti'   => $this->timpenelitiModel->get_anggota_timpeneliti($id_penelitian),
            'ketuapeneliti' => $this->dosenModel->get_nip_peneliti($timpeneliti[0]['NIP']),
            'luaran'        => $this->luaranModel->get_luaran_byid($id_penelitian),
        ];
        // dd($dataPenelitian['timpeneliti']);

        $file_pdf = 'Proposal Penelitian - ' . $dataPenelitian['penelitian']['judul_penelitian'];
        $paper = 'A4';
        $orientation = "portrait";
        $html = view('proposal/all_proposal', $dataPenelitian);
        // $Pdfgenerator->set_option('isRemoteEnabled', TRUE);
        $hasil = $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function view_proposal_savelocal($id_penelitian)
    {
        $Pdfgenerator = new Pdfgenerator();
        $timpeneliti = $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian);

        $dataPenelitian = [
            'penelitian'    => $this->penelitianModel->find($id_penelitian),
            'timpeneliti'   => $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian),
            'anggotapeneliti'   => $this->timpenelitiModel->get_anggota_timpeneliti($id_penelitian),
            'ketuapeneliti' => $this->dosenModel->get_nip_peneliti($timpeneliti[0]['NIP']),
            'luaran'        => $this->luaranModel->get_luaran_byid($id_penelitian),
        ];
        // dd($dataPenelitian['ketuapeneliti']);

        $file_pdf = 'Proposal Penelitian - ' . $dataPenelitian['penelitian']['judul_penelitian'];
        $paper = 'A4';
        $orientation = "portrait";
        $direktori = 'cache';
        $html = view('proposal/all_proposal', $dataPenelitian);
        // $Pdfgenerator->set_option('isRemoteEnabled', TRUE);
        $hasil = $Pdfgenerator->save_to_local($html, $file_pdf, $paper, $orientation,$direktori);

        $judul_penelitian = $file_pdf . ".pdf";
        return redirect()->to('/penelitian/view_proposal/' . $id_penelitian . "/" .  $judul_penelitian);
    }

    public function view_proposal($id_penelitian, $judul_penelitian)
    {
        $data = [
            'penelitian'    => $this->penelitianModel->find($id_penelitian),
            'judul_penelitian' => $judul_penelitian,
        ];
        // dd($data['judul_penelitian']);

        return view('proposal/ViewProposal', $data);
    }

    public function lihat_pdf($id_penelitian)
    {

        $timpeneliti = $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian);
        // $penelitian = $this->penelitianModel->find($id_penelitian);

        $timpeneliti = $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian);

        $dataPenelitian = [
            'penelitian'    => $this->penelitianModel->find($id_penelitian),
            'timpeneliti'   => $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian),
            'ketuapeneliti' => $this->dosenModel->get_nip_peneliti($timpeneliti[0]['NIP']),
            'luaran'        => $this->luaranModel->get_luaran_byid($id_penelitian),
        ];
        // $dataPenelitian = [
        //     'jenis_penelitian' => 'Mandiri',
        //     'judul_penelitian' => 'Testing judul Mandiri',
        // ];

        return view('proposal/p2_proposal', $dataPenelitian);
    }

    public function printLaporan($id_penelitian)
    {
        $Pdfgenerator = new Pdfgenerator();

        $timpeneliti = $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian);
        $penelitian = $this->penelitianModel->find($id_penelitian);
        $laporan = $this->laporanModel->find($id_penelitian);

        if ($penelitian['jenis_penelitian'] == 'Semi Mandiri') {
            $tambahanFile = $laporan['laporan_dana'];
        } else {
            $tambahanFile = $laporan['kontrak'];
        }

        $dataPenelitian = [
            'penelitian'        => $penelitian,
            'timpeneliti'       => $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian),
            'anggotapeneliti'   => $this->timpenelitiModel->get_anggota_timpeneliti($id_penelitian),
            'ketuapeneliti'     => $this->dosenModel->get_nip_peneliti($timpeneliti[0]['NIP']),
            'luaran'            => $this->luaranModel->get_luaran_byid($id_penelitian),
            'addProses2'        => $tambahanFile,
        ];
        // dd($dataPenelitian['timpeneliti']);

        // $file_pdf = 'Laporan Penelitian - ' . $dataPenelitian['penelitian']['judul_penelitian'];
        // $paper = 'A4';
        // $orientation = "portrait";
        // $direktori = 'laporan_akhir_penelitian';
        // $html = view('proposal/all_Laporan', $dataPenelitian);
        // // $Pdfgenerator->set_option('isRemoteEnabled', TRUE);
        // $hasil = $Pdfgenerator->save_to_local($html, $file_pdf, $paper, $orientation, $direktori);

        $pdf = new \Clegginabox\PDFMerger\PDFMerger;

        // $pdf->addPDF('/one.pdf', '1, 3, 4');
        $pdf->addPDF(base_url('/bukti_kegiatan/3SI2_Kelompok5_222011494_TugasPertemuan11_3.pdf') , '1-2');
        $pdf->addPDF('/public/bukti_kegiatan/surat pernyataan penelitian.docx_1.pdf', 'all');
        
        //You can optionally specify a different orientation for each PDF
        // $pdf->addPDF('samplepdfs/one.pdf', '1, 3, 4', 'L');
        // $pdf->addPDF('samplepdfs/two.pdf', '1-2', 'P');
        
        $pdf->merge('file', '/public/bukti_kegiatan/tes-merge.pdf', 'P');
        
        // $pdf->addFile();
    }
}
