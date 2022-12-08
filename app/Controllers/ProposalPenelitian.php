<?php

namespace App\Controllers;

use mikehaertl\pdftk\src\Pdf;
use CodeIgniter\API\ResponseTrait;
use App\Models\PenelitianModel;
use App\Models\DosenModel;
use App\Models\TimPenelitiModel;
use App\Models\LaporanPenelitianModel;
use App\Models\LuaranTargetModel;
use App\Models\DanaPenelitianModel;
use CodeIgniter\I18n\Time;
use App\Libraries\Pdfgenerator;
use App\Models\GlobalSettingModel;

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
    protected $settingTTD;
    protected $danaPenelitianModel;
    public function __construct()
    {
        $this->penelitianModel = new PenelitianModel();
        $this->laporanModel = new LaporanPenelitianModel();
        $this->timpenelitiModel = new TimPenelitiModel();
        $this->ketuatimpenelitiModel = new TimPenelitiModel();
        $this->dosenModel = new DosenModel();
        $this->luaranModel = new LuaranTargetModel();
        $this->settingTTD = new GlobalSettingModel();
        $this->danaPenelitianModel = new DanaPenelitianModel();
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
            'settingTTD' => $this->settingTTD->find(1),
            'jenis'             => ' ',
            'tujuan'            => ' ',
        ];
        // dd($dataPenelitian['timpeneliti']);

        $file_pdf = 'Proposal Penelitian - ' . $dataPenelitian['penelitian']['judul_penelitian'];
        $paper = 'A4';
        $orientation = "portrait";
        $html = view('proposal/all_proposal', $dataPenelitian);
        // $Pdfgenerator->set_option('isRemoteEnabled', TRUE);
        $hasil = $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function view_proposal_savelocal($id_penelitian, $btn)
    {
        $Pdfgenerator = new Pdfgenerator();
        $timpeneliti = $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian);
        $penelitian = $this->penelitianModel->find($id_penelitian);
        $tambahanFile = 'proposal/' . $penelitian["file_proposal"];

        // dd($timpeneliti);
        $dataPenelitian = [
            'penelitian'    => $this->penelitianModel->find($id_penelitian),
            'timpeneliti'   => $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian),
            'anggotapeneliti'   => $this->timpenelitiModel->get_anggota_timpeneliti($id_penelitian),
            'ketuapeneliti' => $this->dosenModel->get_nip_peneliti($timpeneliti[0]['NIP']),
            'luaran'        => $this->luaranModel->get_luaran_byid($id_penelitian),
            'jenis'         => '*) tentative',
            'jurnal'        => 'TARGET CAPAIAN YANG DITUJU*)',
            'tujuan'        => 'LUARAN DAN TARGET CAPAIAN',
            'target'        => 'TARGET',
            'judul'        => 'USULAN',
            'settingTTD' => $this->settingTTD->find(1)
        ];
        // dd($dataPenelitian['settingTTD']);

        $file_pdf = 'Proposal Penelitian - ' . $dataPenelitian['penelitian']['judul_penelitian'];
        $paper = 'A4';
        $orientation = "portrait";
        $direktori = 'proposal_akhir';
        $html = view('proposal/all_proposal', $dataPenelitian);
        // $Pdfgenerator->set_option('isRemoteEnabled', TRUE);
        // dd($direktori);
        // $hasil = $Pdfgenerator->save_to_local($html, $file_pdf, $paper, $orientation, $direktori);

        $hasil = $Pdfgenerator->save_to_local($html, $file_pdf, $direktori, $paper, $orientation);


        $judul_penelitian = $file_pdf . ".pdf";

        // return redirect()->to('/penelitian/view_laporan_proposal/' . $id_penelitian . "/" .  $judul_penelitian);

        // dd($judul_penelitian);
        $pdf = new \Jurosh\PDFMerge\PDFMerger;
        $pdf->addPDF($direktori . '/' . $file_pdf . '.pdf', 'all', 'vertical')
            ->addPDF($tambahanFile, 'all');
        $pdf->merge('file', $direktori . '/' . $file_pdf . '.pdf');

        $judul_penelitian = $file_pdf . ".pdf";
        // dd($btn);
        if ($btn == 1) {
            return redirect()->to('/penelitian/view_proposal/' . $id_penelitian . "/" .  $judul_penelitian);
            // return redirect()->to('/penelitian/view_laporan_proposal/' . $id_penelitian . "/" .  $judul_penelitian);
        } elseif ($btn == 2) {
            return redirect()->to('/penelitian/download_proposal/' . $id_penelitian . "/" .  $judul_penelitian);
        }
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

    public function download_proposal($id_penelitian, $judul_penelitian)
    {
        $data = [
            'penelitian'    => $this->penelitianModel->find($id_penelitian),
            'judul_penelitian' => $judul_penelitian,
        ];
        // dd($data['judul_penelitian']);

        return $this->response->download('proposal_akhir/' . $judul_penelitian, null);
        // return view('proposal/ViewLaporanProposal', $data);
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
            'settingTTD' => $this->settingTTD->find(1)
        ];
        // $dataPenelitian = [
        //     'jenis_penelitian' => 'Mandiri',
        //     'judul_penelitian' => 'Testing judul Mandiri',
        // ];

        return view('proposal/p2_proposal', $dataPenelitian);
    }

    public function printLaporan($id_penelitian, $btn)
    {
        $Pdfgenerator = new Pdfgenerator();

        $timpeneliti = $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian);
        $penelitian = $this->penelitianModel->find($id_penelitian);
        $laporan = $this->laporanModel->find_by_idpenelitian($id_penelitian);
        // dd($laporan);
        if ($penelitian['jenis_penelitian'] == 'Semi Mandiri') {
            $tambahanFile = 'bukti_pendanaan/' . $laporan['laporan_dana'];
        } elseif (($penelitian['jenis_penelitian'] == 'Didanani Institusi')||($penelitian['jenis_penelitian'] == 'Institusi')){
            $tambahanFile = 'kontrak/' . $laporan['kontrak'];
        } else{
            $tambahanFile = 'bukti_luaran/' . $laporan['laporan_luaran'];
        }
            $bukti = 'bukti_luaran/' . $laporan['laporan_luaran'];
        $dataPenelitian = [
            'penelitian'        => $penelitian,
            'timpeneliti'       => $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian),
            'anggotapeneliti'   => $this->timpenelitiModel->get_anggota_timpeneliti($id_penelitian),
            'ketuapeneliti'     => $this->dosenModel->get_nip_peneliti($timpeneliti[0]['NIP']),
            'luaran'            => $this->luaranModel->get_luaran_byid($id_penelitian),
            'jenis'             => ' ',
            'jurnal'            => ' ',
            'target'            => '',
            'tujuan'            => 'LUARAN DAN CAPAIAN',
            'judul'             => 'LAPORAN',
            'settingTTD' => $this->settingTTD->find(1)
            // 'addProses2'        => $tambahanFile,
        ];
        // dd($dataPenelitian['timpeneliti']);

        $file_pdf = 'Laporan Penelitian - ' . $dataPenelitian['penelitian']['judul_penelitian'];
        $paper = 'A4';
        $orientation = "portrait";
        $direktori = 'laporan_akhir_penelitian';
        $html = view('proposal/all_Laporan', $dataPenelitian);
        // $Pdfgenerator->set_option('isRemoteEnabled', TRUE);
        $hasil = $Pdfgenerator->save_to_local($html, $file_pdf, $direktori, $paper, $orientation);

        $pdf = new \Jurosh\PDFMerge\PDFMerger;
        $pdf->addPDF($direktori . '/' . $file_pdf . '.pdf', 'all', 'vertical')
            ->addPDF($tambahanFile, 'all')
            ->addPDF($bukti, 'all');
        $pdf->merge('file', $direktori . '/' . $file_pdf . ' - Akhir.pdf');

        $judul_penelitian = $file_pdf . " - Akhir.pdf";
        // dd($btn);
        if ($btn == 1) {
            return redirect()->to('/penelitian/view_laporan_proposal/' . $id_penelitian . "/" .  $judul_penelitian);
        } elseif ($btn == 2) {
            return redirect()->to('/penelitian/download_laporan_proposal/' . $id_penelitian . "/" .  $judul_penelitian);
        }
    }

    public function view_laporan_proposal($id_penelitian, $judul_penelitian)
    {
        $data = [
            'penelitian'    => $this->penelitianModel->find($id_penelitian),
            'judul_penelitian' => $judul_penelitian,
            // 'settingTTD' => $this->settingTTD->find(1)
        ];
        // dd($data['settingTTD']);

        // return $this->response->download('laporan_akhir_penelitian/'.$judul_penelitian, null);
        return view('proposal/ViewLaporanProposal', $data);
    }

    public function download_laporan_proposal($id_penelitian, $judul_penelitian)
    {
        $data = [
            'penelitian'    => $this->penelitianModel->find($id_penelitian),
            'judul_penelitian' => $judul_penelitian,
            'settingTTD' => $this->settingTTD->find(1),
            'tujuan'            => ' ',
        ];
        // dd($data['judul_penelitian']);

        return $this->response->download('laporan_akhir_penelitian/' . $judul_penelitian, null);
        // return view('proposal/ViewLaporanProposal', $data);
    }

    public function download_memo_penelitian($id_penelitian)
    {
        $Pdfgenerator = new Pdfgenerator();
        $timpeneliti = $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian);

        $dataPenelitian = [
            'penelitian'    => $this->penelitianModel->find($id_penelitian),
            'timpeneliti'   => $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian),
            'targetpenelitian'  => $this->luaranModel->get_luaran_byid($id_penelitian),
            'dana'              => $this->danaPenelitianModel->get_dana_byid($id_penelitian),
            'settingTTD' => $this->settingTTD->find(1)
        ];

        $file_pdf = 'Memo Pembiayaan Publikasi - ' . $dataPenelitian['penelitian']['judul_penelitian'];
        $paper = 'A4';
        $orientation = "portrait";
        $html = view('proposal/memo_penelitian', $dataPenelitian);
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }











    //========================= p1-p5 testing download
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
}
