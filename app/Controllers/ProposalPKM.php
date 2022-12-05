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
        // dd($dataPkm['peneliti']);

        $file_pdf = 'Form Pengajuan Kegiatan PKM - ';
        // . $dataPkm['penelitian']['judul_penelitian'];
        $paper = 'A4';
        $orientation = "portrait";
        $html = view('proposal/PKM/Surat_Keterangan', $dataPkm);
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function printLaporan($id_pkm, $btn)
    {
        $Pdfgenerator = new Pdfgenerator();

        $timpkm = $this->timpkmModel->get_timpkm_byid($id_pkm);
        $pkm = $this->pkmModel->find($id_pkm);
        $laporan = $this->laporanModel->find_by_idpkm($id_pkm);
        // dd($laporan);
        if ($pkm['jenis_pkm'] == 'Semi Mandiri') {
            $tambahanFile = 'bukti_pendanaan/' . $laporan['laporan_dana'];
        } else {
            $tambahanFile = 'kontrak/' . $laporan['kontrak'];
        }

        $dataPenelitian = [
            'pkm'        => $pkm,
            'timpkm'       => $this->timpkmModel->get_timpkm_byid($id_pkm),
            'anggotapeneliti'   => $this->timpkmModel->get_anggota_timpkm($id_pkm),
            'ketuapeneliti'     => $this->dosenModel->get_nip_peneliti($timpkm[0]['NIP']),
            'luaran'            => $this->luaranModel->get_luaran_byid($id_pkm),
            'jenis'             => 'R'
            // 'addProses2'        => $tambahanFile,
        ];
        // dd($dataPenelitian['timpkm']);

        $file_pdf = 'Laporan Penelitian - ' . $dataPenelitian['pkm']['judul_pkm'];
        $paper = 'A4';
        $orientation = "portrait";
        $direktori = 'laporan_akhir_pkm';
        $html = view('proposal/all_Laporan', $dataPenelitian);
        // $Pdfgenerator->set_option('isRemoteEnabled', TRUE);
        $hasil = $Pdfgenerator->save_to_local($html, $file_pdf, $direktori, $paper, $orientation);

        $pdf = new \Jurosh\PDFMerge\PDFMerger;
        $pdf->addPDF($direktori . '/' . $file_pdf . '.pdf', 'all', 'vertical')
            ->addPDF($tambahanFile, 'all');
        $pdf->merge('file', $direktori . '/' . $file_pdf . ' - Akhir.pdf');

        $judul_pkm = $file_pdf . " - Akhir.pdf";
        // dd($btn);
        if ($btn == 1) {
            return redirect()->to('/pkm/view_laporan_proposal/' . $id_pkm . "/" .  $judul_pkm);
        } elseif ($btn == 2) {
            return redirect()->to('/pkm/download_laporan_proposal/' . $id_pkm . "/" .  $judul_pkm);
        }
    }

    public function view_laporan_proposal($id_pkm, $judul_pkm)
    {
        $data = [
            'pkm'    => $this->pkmModel->find($id_pkm),
            'judul_pkm' => $judul_pkm,
        ];
        // dd($data['judul_pkm']);

        // return $this->response->download('laporan_akhir_pkm/'.$judul_pkm, null);
        return view('proposal/ViewLaporanProposal', $data);
    }

    public function download_laporan_proposal($id_pkm, $judul_pkm)
    {
        $data = [
            'pkm'    => $this->pkmModel->find($id_pkm),
            'judul_pkm' => $judul_pkm,
        ];
        // dd($data['judul_pkm']);

        return $this->response->download('laporan_akhir_pkm/' . $judul_pkm, null);
        // return view('proposal/ViewLaporanProposal', $data);
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

    public function download_memo_pkm($id_pkm)
    {
        $Pdfgenerator = new Pdfgenerator();
        $timpkm = $this->timpkmModel->get_timpkm_byid($id_pkm);

        $dataPkm = [
            'pkm'    => $this->pkmModel->find($id_pkm),
            'timpkm'   => $this->timpkmModel->get_timpkm_byid($id_pkm),
            // 'targetpkm'  => $this->luaranModel->get_luaran_byid($id_pkm),
        ];

        $file_pdf = 'Memo Pembiayaan Publikasi - ' . $dataPkm['pkm']['topik_kegiatan'];
        $paper = 'A4';
        $orientation = "portrait";
        $html = view('proposal/memo_pkm', $dataPkm);
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
