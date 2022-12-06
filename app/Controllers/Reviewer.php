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
use App\Models\StatusPkmModel;
use App\Models\PkmModel;
use App\Models\SuratKeteranganPkmModel;
use App\Models\ReimburseModel;
use App\Models\TimPKMModel;
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
        $this->pkmModel = new PkmModel();
        $this->timpkmModel = new TimPKMModel();
        $this->statusPkmModel = new StatusPkmModel();
        $this->reimburseModel = new ReimburseModel();
        $this->suratPkmModel = new SuratKeteranganPkmModel();
        $this->anggaranTotalModel = new AnggaranTotalModel();
        $this->anggaranAwalModel = new AnggaranAwalModel();
    }

    public function index()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('reviewer/tampilan/index', $data);
    }


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
}