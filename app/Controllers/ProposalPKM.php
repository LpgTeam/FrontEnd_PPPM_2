<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\DosenModel;
use App\Models\PkmModel;
use App\Models\SuratKeteranganPkmModel;
use App\Models\PembiayaanPkmModel;
use App\Models\RincianPKMModel;
use App\Models\TimPKMModel;
use App\Models\DanaPKMModel;
use App\Libraries\Pdfgenerator;
use App\Models\GlobalSettingModel;
use App\Models\TandaTanganDosenModel;

class ProposalPKM extends BaseController
{
    use ResponseTrait;
    protected $penelitianModel;
    protected $ketuatimpenelitiModel;
    protected $timpenelitiModel;
    protected $dosenModel;
    protected $ttdDosenModel;
    protected $luaranModel;
    protected $pkmModel;
    protected $danapkmModel;
    protected $rincianModel;
    protected $biayaModel;
    protected $settingTTD;
    protected $suratPkmModel;
    protected $timpkmModel;

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
        $this->ttdDosenModel = new TandaTanganDosenModel();
    }

    //(generate) dompdf awal (proses 1) tanpa merge hanya form pengajuan proposal 
    public function download_proposal($id_pkm)
    {
        $Pdfgenerator = new Pdfgenerator();

        $timpkm = $this->timpkmModel->get_data_timpkm_byId_Pkm($id_pkm);

        $dataPkm = [
            'pkm'    => $this->pkmModel->find($id_pkm),
            'anggotapkm'   => $this->timpkmModel->get_anggota_timpkm($id_pkm),
            'timpkm'   => $this->timpkmModel->get_timpkm_byid($id_pkm),
            'biaya' => $this->biayaModel->find_by_idpkm($id_pkm),
            'settingTTD' => $this->settingTTD->find(1),
            'ttdDirektur'   => $this->ttdDosenModel->get_ttd_by_nip(196710221990032002),
            'ttdKepala'   => $this->ttdDosenModel->get_ttd_by_nip(198512222009021002),
            'ttd'         => $this->ttdDosenModel->get_ttd_by_nip($timpkm[0]['nip']),
        ];
        // dd($dataPkm['timpkm']);
        $file_pdf = 'Form Pengajuan Kegiatan PKM - ';
        $paper = 'A4';
        $orientation = "portrait";
        $html = view('proposal/PKM/Form_Pengajuan', $dataPkm);
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    //(generate) dompdf (proses 2), generate surat keterangan ketika sudah disetujui
    public function download_surat_keterangan($id_pkm)
    {
        $Pdfgenerator = new Pdfgenerator();

        $timpkm = $this->timpkmModel->get_data_timpkm_byId_Pkm($id_pkm);

        $dataPkm = [
            'pkm'    => $this->pkmModel->find($id_pkm),
            // 'peneliti' => $this->timpkmModel->get_data_timpkm_byId_Pkm($id_pkm),
            // 'peneliti' => $this->timpkmModel->get_data_timpkm($id_pkm),
            'peneliti' => $this->timpkmModel->get_timpkm_byid($id_pkm),
            'rincian'  => $this->rincianModel->find_by_idpkm($id_pkm),
            'no_surat'  => $this->suratPkmModel->get_by_id_pkm($id_pkm),
            'settingTTD' => $this->settingTTD->find(1),
            'ttdKepala'   => $this->ttdDosenModel->get_ttd_by_nip(198512222009021002),
            'ttd'         => $this->ttdDosenModel->get_ttd_by_nip($timpkm[0]['nip']),
        ];

        $file_pdf = 'Form Pengajuan Kegiatan PKM - ';
        // . $dataPkm['penelitian']['judul_penelitian'];
        $paper = 'A4';
        $orientation = "portrait";
        // $html = view('proposal/PKM/Surat_Keterangan', $dataPkm);
        $html = view('proposal/PKM/Surat_Keterangan', $dataPkm);
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    //(generate) download to local memo dari kepala pppm, ketika semua telah disetujui
    public function download_memo_pkm($id_pkm)
    {
        $Pdfgenerator = new Pdfgenerator();

        $timpkm = $this->timpkmModel->get_data_timpkm_byId_Pkm($id_pkm);

        $datapkm = [
            'pkm'    => $this->pkmModel->find($id_pkm),
            'timpkm'   => $this->timpkmModel->get_timpkm_byid($id_pkm),
            // 'targetpkm'  => $this->luaranModel->get_luaran_byid($id_pkm),
            'dana'       => $this->danapkmModel->get_dana_by_id($id_pkm),
            'settingTTD' => $this->settingTTD->find(1),
            'ttdDirektur'   => $this->ttdDosenModel->get_ttd_by_nip(196710221990032002),
            'ttdKepala'   => $this->ttdDosenModel->get_ttd_by_nip(198512222009021002),
            'ttd'         => $this->ttdDosenModel->get_ttd_by_nip($timpkm[0]['nip']),
        ];

        $file_pdf = 'Memo Pembiayaan Publikasi - ' . $datapkm['pkm']['topik_kegiatan'];
        $paper = 'A4';
        $orientation = "portrait";
        $html = view('proposal/memo_pkm', $datapkm);
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    //(generate) generate (proses selesai), dompdf dari cover+surat_pernyataan_pkm+Form_Pengajuan+tim_proposal
    public function download_laporan($idpkm)
    {
        $Pdfgenerator = new Pdfgenerator();

        $timpkm = $this->timpkmModel->get_data_timpkm_byId_Pkm($idpkm);
        // dd($timpkm);   
        $datapkm = [
            'pkm'    => $this->pkmModel->find($idpkm),
            'timpkm'   => $timpkm,
            'anggotapkm'   => $this->timpkmModel->get_anggota_timpkm($idpkm),
            'timpkm'   => $this->timpkmModel->get_timpkm_byid($idpkm),
            'ketuapkm' => $this->dosenModel->get_nip_peneliti($timpkm[0]['nip']),
            'biaya' => $this->biayaModel->find_by_idpkm($idpkm),
            'ttd'         => $this->ttdDosenModel->get_ttd_by_nip($timpkm[0]['nip']),
            'settingTTD' => $this->settingTTD->find(1)
        ];

        $file_pdf = 'Proposal PKM - ' . $datapkm['pkm']['topik_kegiatan'];
        $paper = 'A4';
        $orientation = "portrait";
        $html = view('proposal/pkm/all_pkm_proposal', $datapkm);
        // $Pdfgenerator->set_option('isRemoteEnabled', TRUE);
        $hasil = $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }


    //(save to local + merge) download laporan ketika sudah selesai
    //file = form proposal/laporan (cover+surat_pernyataan_pkm+Form_Pengajuan+tim_proposal) + bukti kegiatan
    public function laporan_merge($id_pkm, $btn)
    {

        // save to local laporan
        $Pdfgenerator = new Pdfgenerator();
        $timpkm = $this->timpkmModel->get_timpkm_byid($id_pkm);
        $pkm = $this->pkmModel->find($id_pkm);
        $rincian = $this->rincianModel->find_by_idpkm($id_pkm);
        // $suratPernyataan = 'surat_pernyataan/pkm/' . $rincian['surat_pernyataan'];
        $buktiKegiatan = 'bukti_kegiatan/pkm/' . $rincian['bukti_kegiatan'];

        $timpkm = $this->timpkmModel->get_data_timpkm_byId_Pkm($id_pkm);
        $datapkm = [
            'pkm'    => $this->pkmModel->find($id_pkm),
            'timpkm'   => $timpkm,
            'anggotapkm'   => $this->timpkmModel->get_anggota_timpkm($id_pkm),
            'timpkm'   => $this->timpkmModel->get_timpkm_byid($id_pkm),
            'biaya' => $this->biayaModel->find_by_idpkm($id_pkm),
            'ketuapkm' => $this->dosenModel->get_nip_peneliti($timpkm[0]['nip']),
            'settingTTD' => $this->settingTTD->find(1),
            'ttdDirektur'   => $this->ttdDosenModel->get_ttd_by_nip(196710221990032002),
            'ttdKepala'   => $this->ttdDosenModel->get_ttd_by_nip(198512222009021002),
            'ttd'         => $this->ttdDosenModel->get_ttd_by_nip($timpkm[0]['nip']),
        ];


        $file_pdf = 'Laporan PKM - ' . $datapkm['pkm']['topik_kegiatan'];
        $paper = 'A4';
        $orientation = "portrait";
        $direktori = 'laporan_akhir_pkm';
        $html = view('proposal/pkm/all_pkm_proposal', $datapkm);

        // if (file_exists($direktori . "/" . $file_pdf . ' - Akhir.pdf')) {
        //     unlink($direktori . "/" . $file_pdf . ' - Akhir.pdf');
        // }
        // save to local laporan
        $hasil = $Pdfgenerator->save_to_local($html, $file_pdf, $direktori, $paper, $orientation);
        //merge laporan + bukti kegiatan dan save ke local
        $pdf = new \Jurosh\PDFMerge\PDFMerger;
        $pdf->addPDF($direktori . '/' . $file_pdf . '.pdf', 'all', 'vertical')
            ->addPDF($buktiKegiatan, 'all');
        $pdf->merge('file', $direktori . '/' . $file_pdf . ' - Akhir.pdf');

        $judul_pkm = $file_pdf . " - Akhir.pdf";

        if ($btn == 1) {
            return redirect()->to('/pkm/view_laporan_pkm/' . $id_pkm . "/" .  $judul_pkm);
        } elseif ($btn == 2) {
            return redirect()->to('/pkm/download_laporan_pkm/' . $id_pkm . "/" .  $judul_pkm);
        }
    }

    // view laporan
    public function view_laporan_pkm($id_pkm, $judul_pkm)
    {
        $data = [
            'pkm'    => $this->pkmModel->find($id_pkm),
            'judul_pkm' => $judul_pkm,
        ];
        return view('proposal/PKM/ViewLaporanPKM', $data);
    }

    // download merge laporan + bukti kegiatan dari local
    public function download_laporan_pkm($id_pkm, $judul_pkm)
    {

        $data = [
            'pkm'    => $this->pkmModel->find($id_pkm),
            'judul_pkm' => $judul_pkm,
        ];
        return $this->response->download('laporan_akhir_pkm/' . $judul_pkm, null);
    }
}
