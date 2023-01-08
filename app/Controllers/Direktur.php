<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Pemberitahuan;
use App\Models\PenelitianModel;
use App\Models\StatusPenelitianModel;
use App\Models\AnggaranAwalModel;
use App\Models\AnggaranTotalModel;
use App\Models\DanaAwalDosenModel;
use App\Models\DanaPenelitianModel;
use App\Models\DanaPKMModel;
use App\Models\StatusPkmModel;
use App\Models\PkmModel;
use App\Models\SuratKeteranganPkmModel;
use App\Models\ReimburseModel;
use App\Models\TandaTanganDosenModel;
use App\Models\TimPKMModel;
use CodeIgniter\API\ResponseTrait;

class Direktur extends BaseController
{
    use ResponseTrait;
    protected $penelitianModel;
    protected $pkmModel;
    protected $statusPenelitianModel;
    protected $statusPkmModel;
    protected $detailStatus;
    protected $detailStatusPkm;
    protected $settingGlobal;
    protected $reimburseModel;
    protected $anggaranAwalModel;
    protected $anggaranTotalModel;
    protected $danaPenelitianModel;
    protected $danaPKMModel;
    protected $timpkmModel;
    protected $suratPkmModel;
    protected $ttdDosenModel;

    public function __construct()
    {
        $this->penelitianModel = new PenelitianModel();
        $this->statusPenelitianModel = new StatusPenelitianModel();
        $this->pkmModel = new PkmModel();
        $this->timpkmModel = new TimPKMModel();
        $this->statusPkmModel = new StatusPkmModel();
        $this->reimburseModel = new ReimburseModel();
        $this->suratPkmModel = new SuratKeteranganPkmModel();
        $this->anggaranTotalModel = new AnggaranTotalModel();
        $this->anggaranAwalModel = new AnggaranAwalModel();
        $this->ttdDosenModel = new TandaTanganDosenModel();
    }

    public function index()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('direktur/tampilan/index', $data);
    }

    // public function anggaran()
    // {
    //     $dana_awal = new AnggaranAwalModel();
    //     $dana_penelitian = new DanaPenelitianModel();
    //     $dana_pkm = new DanaPKMModel();
    //     $dana_terealisasi = new AnggaranTotalModel();
    //     $dana_pengajuan = new PenelitianModel();

    //     //ambil dana penelitian
    //     $ambil_penelitian = $dana_penelitian->findAll();
    //     $ambil_pkm = $dana_pkm->findAll();

    //     //ambil dana terealisasi
    //     $total = null;
    //     foreach ($ambil_penelitian as $data) {
    //         $total = $total + $data['dana_keluar'];
    //     };

    //     foreach ($ambil_pkm as $data) {
    //         $total = $total + $data['dana_keluar'];
    //     }

    //     //ambil dana total 
    //     $anggaranAwal = $dana_awal->orderBy('id_tahunAnggaran', 'DESC')->first();

    //     //current year
    //     $year = date("Y");

    //     $input_terealisasi = [
    //         'tahun' => $year,
    //         'dana_keluar' => $total,
    //         'sisa_anggaran' => $anggaranAwal['jumlah'] - $total
    //     ];

    //     // update data tabel anggaran_total
    //     //update data table anggaran_total harusnya ketika BAU klik "cairkan dana"
    //     $total_saved = $dana_terealisasi->save($input_terealisasi);

    //     //ambil dana pengajuan 
    //     $ambil_pengajuan = $dana_pengajuan->findAll();
    //     $total_pengajuan = 0;
    //     foreach ($ambil_pengajuan as $data_pengajuan) {
    //         if (($data_pengajuan['id_status'] == 5) or ($data_pengajuan['id_status'] == 4)) {
    //             $total_pengajuan = $total_pengajuan + $data_pengajuan['biaya'];
    //         }
    //     }


    //     //semua dana
    //     $data = [
    //         'title'               => 'PPPM Politeknik Statistika STIS',
    //         'anggaranAwal'        => $dana_awal->orderBy('id_tahunAnggaran', 'DESC')->first(),
    //         'anggaranTerealisasi' =>  $dana_terealisasi->orderBy('id_total', 'DESC')->first(),
    //         'anggaranDiajukan'    => $total_pengajuan
    //     ];

    //     return view('direktur/tampilan/anggaran', $data);
    // }
    public function anggaran()
    {
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
            'danaTersedia'      => $sisaAnggaran['sisa_anggaran'] - $danaDiajukan
        ];
        return view('direktur/tampilan/anggaran', $data);
    }
    public function penelitian()
    {
        $penelitianModel = new PenelitianModel();
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            // 'penelitian' => $penelitianModel->get_penelitian_by_id_status(4),
            'penelitian' => $penelitianModel->getData(),
        ];
        return view('direktur/tampilan/penelitian', $data);
    }

    public function persetujuan($id_penelitian)
    {
        $this->penelitianModel->find($id_penelitian);

        $data = [
            'title'         => 'PPPM Politeknik Statistika STIS',
            'penelitian'    => $this->penelitianModel->find($id_penelitian)

        ];
        return view('direktur/tampilan/persetujuan', $data);
    }

    public function acc_penelitian_direktur($id_penelitian)
    {

        $ttd = $this->ttdDosenModel->get_ttd_by_nip(auth()->user()->nip);
        if ($ttd['ttd_manual'] == null || $ttd['ttd_digital'] == null) {
            session()->setFlashdata('error', 'Anda belum upload tanda tangan, upload tanda tangan terlebih dahulu');

            return redirect()->to('/penelitianDirektur');
        } else {
            $this->penelitianModel->save([
                'id_penelitian'     => $id_penelitian,
                'id_status'         => 5,
                'status_pengajuan'  => 'Disetujui oleh Direktur'
            ]);

            $this->statusPenelitianModel->save([
                'id_penelitian' => $id_penelitian,
                'status'        => 'Disetujui oleh Direktur'
            ]);

            $notif = new Pemberitahuan();
            $notif->Send_Pemberitahuan_penelitian($id_penelitian);

            session()->setFlashdata('pesan', 'Penelitian berhasil disetujui');

            return redirect()->to('/penelitianDirektur');
        }
    }

    public function reimburse()
    {

        //mengambil data user yang sedang login
        $user = auth()->user();

        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'reimburse' => $this->reimburseModel->findAll(),
            // 'penelitian' => $this->penelitianModel->get_penelitian_reimburse_diajukan(1), 
            // 'pkm' => $this->pkmModel->get_pkm_reimburse_diajukan(1),

        ];

        return view('direktur/tampilan/reimburse', $data);
    }

    public function detailReimburse($id_reimburse, $idpenelitian)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'reimburse' => $this->reimburseModel->find($id_reimburse),
            'penelitian' => $this->penelitianModel->find($idpenelitian),
            'validation' => \Config\Services::validation(),
        ];
        // dd($data['reimburse']);
        return view('direktur/tampilan/detailReimburse', $data);
    }

    public function detailReimburse2($id_reimburse)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'reimburse' => $this->reimburseModel->find($id_reimburse),
            'validation' => \Config\Services::validation()
        ];
        return view('direktur/tampilan/detailReimburse2', $data);
    }
}
