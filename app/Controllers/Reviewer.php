<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenelitianModel;
use App\Models\StatusPenelitianModel;
use App\Models\AnggaranAwalModel;
use App\Models\AnggaranTotalModel;
use App\Models\DanaAwalDosenModel;
use App\Models\DanaPenelitianModel;
use App\Models\DanaPKMModel;
use App\Models\ReimburseModel;
use CodeIgniter\API\ResponseTrait;


class Reviewer extends BaseController
{
    use ResponseTrait;
    protected $penelitianModel;
    protected $statusPenelitianModel;

    public function __construct()
    {
        $this->penelitianModel = new PenelitianModel();
        $this->statusPenelitianModel = new StatusPenelitianModel();
        $this->reimburseModel = new ReimburseModel();
    }

    public function index()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('reviewer/tampilan/index', $data);
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
    //     $total_pengajuan = null;
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

    //     return view('dosen/tampilan/anggaran', $data);
    // }
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
            'danaTersedia'      => $sisaAnggaran['sisa_anggaran'] - $danaDiajukan
       ];
       return view('reviewer/tampilan/anggaran', $data);

    }

    public function penelitian()
    {
        $penelitianModel = new PenelitianModel();
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            // 'penelitian' => $penelitianModel->get_penelitian_by_id_status(2)
            'penelitian' => $penelitianModel->getData()
        ];
        // dd($data['penelitian']);
        return view('reviewer/tampilan/penelitian', $data);
    }

    public function persetujuan($id_penelitian)
    {
        $this->penelitianModel->find($id_penelitian);

        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $this->penelitianModel->find($id_penelitian)
        ];
        return view('reviewer/tampilan/persetujuan', $data);
    }

    public function acc_penelitian_reviewer($id_penelitian)
    {
        $this->penelitianModel->save([
            'id_penelitian'     => $id_penelitian,
            'id_status'         => 2,
            'status_pengajuan'  => 'Disetujui oleh Reviewer'
        ]);
        $this->statusPenelitianModel->save([
            'id_penelitian' => $id_penelitian,
            'status'        => 'Disetujui oleh Reviewer'
        ]);

        session()->setFlashdata('pesan', 'Penelitian berhasil disetujui');

        return redirect()->to('/penelitianReviewer');
    }

    public function rjc_penelitian_reviewer($id_penelitian)
    {
        $this->penelitianModel->save([
            'id_penelitian'     => $id_penelitian,
            'id_status'         => 7,
            'status_pengajuan'  => 'Ditolak oleh Reviewer',
            'alasan'            => $this->request->getVar('alasan')
        ]);

        $this->statusPenelitianModel->save([
            'id_penelitian' => $id_penelitian,
            'status'        => 'Ditolak oleh Reviewer'
        ]);
        session()->setFlashdata('pesan', 'Penelitian telah ditolak');

        return redirect()->to('/penelitianReviewer');
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

        return view('reviewer/tampilan/reimburse', $data);
    }

    public function detailReimburse($id_reimburse)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'reimburse' => $this->reimburseModel->find($id_reimburse),
            'validation' => \Config\Services::validation()
        ];
        return view('reviewer/tampilan/detailReimburse', $data);
    }

    public function detailReimburse2($id_reimburse)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'reimburse' => $this->reimburseModel->find($id_reimburse),
            'validation' => \Config\Services::validation()
        ];
        return view('reviewer/tampilan/detailReimburse2', $data);
    }
}