<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenelitianModel;
use App\Models\AnggaranAwalModel;
use App\Models\AnggaranTotalModel;
use App\Models\DanaAwalDosenModel;
use App\Models\DanaPenelitianModel;
use App\Models\DanaPKMModel;
use CodeIgniter\API\ResponseTrait;


class Reviewer extends BaseController
{
    use ResponseTrait;
    protected $penelitianModel;
    public function __construct()
    {
        $this->penelitianModel = new PenelitianModel();
    }

    public function index()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('reviewer/tampilan/index', $data);
    }

    public function anggaran()
    {
        $dana_awal = new AnggaranAwalModel();
        $dana_penelitian = new DanaPenelitianModel();
        $dana_pkm = new DanaPKMModel();
        $dana_terealisasi = new AnggaranTotalModel();

        $ambil_penelitian = $dana_penelitian->findAll();
        $ambil_pkm = $dana_pkm->findAll();

        //ambil dana terealisasi
        $total = null;
        foreach ($ambil_penelitian as $data) {
            $total = $total + $data['dana_keluar'];
        };

        foreach ($ambil_pkm as $data) {
            $total = $total + $data['dana_keluar'];
        }

        //ambil dana total 
        $anggaranAwal = $dana_awal->orderBy('id_tahunAnggaran', 'DESC')->first();

        //current year
        $year = date("Y");

        $input_terealisasi = [
            'tahun' => $year,
            'dana_keluar' => $total,
            'sisa_anggaran' => $anggaranAwal['jumlah'] - $total
        ];

        // update data tabel anggaran_total
        $total_saved = $dana_terealisasi->save($input_terealisasi);

        //semua dana
        $data = [
            'title'               => 'PPPM Politeknik Statistika STIS',
            'anggaranAwal'        => $dana_awal->orderBy('id_tahunAnggaran', 'DESC')->first(),
            'anggaranTerealisasi' =>  $dana_terealisasi->orderBy('id_total', 'DESC')->first()
        ];
        //dd($data['jumlah']);

        return view('reviewer/tampilan/anggaran', $data);
    }

    public function penelitian()
    {
        $penelitianModel = new PenelitianModel();
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $penelitianModel->getData(),
        ];
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
            'status_pengajuan'  => 'Disetujui'
        ]);

        session()->setFlashdata('pesan', 'Penelitian berhasil disetujui');

        return redirect()->to('/penelitianReviewer');
    }

    public function rjc_penelitian_reviewer($id_penelitian)
    {
        $this->penelitianModel->save([
            'id_penelitian'     => $id_penelitian,
            'id_status'         => 5,
            'status_pengajuan'  => 'Ditolak'
        ]);

        session()->setFlashdata('pesan', 'Penelitian telah ditolak');

        return redirect()->to('/penelitianReviewer');
    }
}
