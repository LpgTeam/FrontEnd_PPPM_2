<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\PenelitianModel;
use App\Models\DosenModel;
use App\Models\PkmModel;
use App\Models\SuratKeteranganPkmModel;
use App\Models\PembiayaanPkmModel;
use App\Models\RincianPKMModel;
use App\Models\TimPKMModel;
use App\Models\LuaranTargetModel;
use App\Models\DanaPKMModel;
use CodeIgniter\I18n\Time;
use App\Libraries\Pdfgenerator;
use App\Models\GlobalSettingModel;

class ProposalPKM extends BaseController
{
    use ResponseTrait;
    protected $penelitianModel;
    protected $ketuatimpenelitiModel;
    protected $timpenelitiModel;
    protected $dosenModel;
    protected $luaranModel;
    protected $pkmModel;
    protected $danapkmModel;
    protected $rincianModel;
    protected $biayaModel;
    protected $settingTTD;

    public function __construct()
    {
        $this->timpkmModel = new TimPKMModel();
        $this->dosenModel = new DosenModel();
        $this->pkmModel = new PkmModel();
        $this->danapkmModel = new DanaPKMModel();
        $this->suratPkmModel = new SuratKeteranganPkmModel();
        $this->rincianModel = new RincianPKMModel();
        $this->biayaModel = new PembiayaanPkmModel;
        $this->settingTTD = new GlobalSettingModel();
    }

    public function download_proposal($id_pkm)
    {
        $Pdfgenerator = new Pdfgenerator();

        $dataPkm = [
            'pkm'    => $this->pkmModel->find($id_pkm),
            'anggotapkm'   => $this->timpkmModel->get_anggota_timpkm($id_pkm),
            'timpkm'   => $this->timpkmModel->get_timpkm_byid($id_pkm),
            'biaya' => $this->biayaModel->find_by_idpkm($id_pkm),
            'settingTTD' => $this->settingTTD->find(1)
        ];
        // dd($dataPkm['settingTTD']);
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
            'rincian'  => $this->rincianModel->find_by_idpkm($id_pkm),
            'no_surat'  => $this->suratPkmModel->get_by_id_pkm($id_pkm),
            'settingTTD' => $this->settingTTD->find(1)
        ];
        // dd($dataPkm['no_surat']);

        
        $file_pdf = 'Form Pengajuan Kegiatan PKM - ';
        // . $dataPkm['penelitian']['judul_penelitian'];
        $paper = 'A4';
        $orientation = "portrait";
        $html = view('proposal/PKM/Surat_Keterangan', $dataPkm);
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function download_memo_pkm($id_pkm)
    {
        $Pdfgenerator = new Pdfgenerator();

        $datapkm = [
            'pkm'    => $this->pkmModel->find($id_pkm),
            'timpkm'   => $this->timpkmModel->get_timpkm_byid($id_pkm),
            // 'targetpkm'  => $this->luaranModel->get_luaran_byid($id_pkm),
            'dana'              => $this->danapkmModel->get_dana_byid($id_pkm),
            'settingTTD' => $this->settingTTD->find(1)
        ];

        $file_pdf = 'Memo Pembiayaan Publikasi - ' . $datapkm['pkm']['topik_kegiatan'];
        $paper = 'A4';
        $orientation = "portrait";
        $html = view('proposal/memo_pkm', $datapkm);
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function download_laporan($idpkm)
    {
        $Pdfgenerator = new Pdfgenerator();

        $timpkm = $this->timpkmModel->get_data_timpkm_byId_Pkm($idpkm);
        $datapkm = [
            'pkm'    => $this->pkmModel->find($idpkm),
            'timpkm'   => $timpkm,
            'anggotapkm'   => $this->timpkmModel->get_anggota_timpkm($idpkm),
            'timpkm'   => $this->timpkmModel->get_timpkm_byid($idpkm),
            'ketuapkm' => $this->dosenModel->get_nip_peneliti($timpkm[0]['nip']),
            'biaya' => $this->biayaModel->find_by_idpkm($idpkm),
            'settingTTD' => $this->settingTTD->find(1)
        ];

        $file_pdf = 'Proposal PKM - ' . $datapkm['pkm']['topik_kegiatan'];
        $paper = 'A4';
        $orientation = "portrait";
        $html = view('proposal/pkm/all_pkm_proposal', $datapkm);
        // $Pdfgenerator->set_option('isRemoteEnabled', TRUE);
        $hasil = $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function printLaporan($id_pkm, $btn)
    {
        $Pdfgenerator = new Pdfgenerator();

        $timpkm = $this->timpkmModel->get_timpkm_byid($id_pkm);
        $pkm = $this->pkmModel->find($id_pkm);
        $rincian = $this->rincianModel->find_by_idpkm($id_pkm);
        $suratPernyataan = 'surat_pernyataan/pkm/' . $rincian['surat_pernyataan'];
        $buktiKegiatan = 'bukti_kegiatan/pkm/' . $rincian['bukti_kegiatan'];

        $timpkm = $this->timpkmModel->get_data_timpkm_byId_Pkm($id_pkm);
        $datapkm = [
            'pkm'    => $this->pkmModel->find($id_pkm),
            'timpkm'   => $timpkm,
            'anggotapkm'   => $this->timpkmModel->get_anggota_timpkm($id_pkm),
            'timpkm'   => $this->timpkmModel->get_timpkm_byid($id_pkm),
            'biaya' => $this->biayaModel->find_by_idpkm($id_pkm),
            'ketuapkm' => $this->dosenModel->get_nip_peneliti($timpkm[0]['nip']),
            'settingTTD' => $this->settingTTD->find(1)

        ];

        $file_pdf = 'Laporan PKM - ' . $datapkm['pkm']['topik_kegiatan'];
        $paper = 'A4';
        $orientation = "portrait";
        $direktori = 'laporan_akhir_pkm';
        $html = view('proposal/pkm/all_pkm_proposal', $datapkm);
        // $Pdfgenerator->set_option('isRemoteEnabled', TRUE);
        $hasil = $Pdfgenerator->save_to_local($html, $file_pdf, $direktori, $paper, $orientation);

        $pdf = new \Jurosh\PDFMerge\PDFMerger;
        $pdf->addPDF($direktori . '/' . $file_pdf . '.pdf', 'all', 'vertical')
            ->addPDF($suratPernyataan, 'all')
            ->addPDF($buktiKegiatan, 'all');
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
        return view('proposal/PKM/ViewLaporanPKM', $data);
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
}
