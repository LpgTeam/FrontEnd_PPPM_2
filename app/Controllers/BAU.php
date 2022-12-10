<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\AnggaranAwal;
use App\Models\PenelitianModel;
use App\Models\StatusPenelitianModel;
use App\Models\AnggaranAwalModel;
use App\Models\AnggaranTotalModel;
use App\Models\DanaAwalDosenModel;
use App\Models\DanaPenelitianModel;
use App\Models\DanaPKMModel;
use App\Models\PkmModel;
use App\Models\ReimburseModel;
use App\Models\StatusPkmModel;
use CodeIgniter\API\ResponseTrait;


class BAU extends BaseController
{
    use ResponseTrait;
    protected $penelitianModel;
    protected $statusPenelitianModel;
    protected $pkmModel;
    protected $statusPkmModel;
    public function __construct()
    {
        $this->statusPenelitianModel = new StatusPenelitianModel();
        $this->penelitianModel = new PenelitianModel();
        $this->pkmModel = new PkmModel();
        $this->statusPkmModel = new StatusPkmModel();
        $this->reimburseModel = new ReimburseModel();
        $this->anggaranTotalModel = new AnggaranTotalModel();
        $this->anggaranAwalModel = new AnggaranAwalModel();
        $this->danaPKMModel = new DanaPKMModel();
        $this->danaPenelitianModel = new DanaPenelitianModel();
    }

    public function index()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('bau/tampilan/index', $data);
    }

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

        return view('bau/tampilan/anggaran', $data);
    }

    public function updateAnggaran()
    {
        //current year
        $year = date("Y");

        $this->anggaranAwalModel->save([
            'tahun_anggaran'  => $year,
            'jumlah'          => $this->request->getVar('danaBaru')
        ]);

        $anggaranTotalTerakhir = $this->anggaranTotalModel->get_sisa_terakhir();
        $this->anggaranTotalModel->save([
            'tahun'         => $year,
            'dana_keluar'   => 0,
            'sisa_anggaran' => $this->request->getVar('danaBaru')
        ]);
        return redirect()->to('/anggaranBAU');
    }
    //=======================Penelitian================================
    public function penelitian()
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            // 'penelitian' => $this->penelitianModel->get_penelitian_by_id_status(1),
            'penelitian' => $this->penelitianModel->getDataBau(),
        ];
        // dd($data['penelitian']);
        return view('bau/tampilan/penelitian', $data);
    }

    public function persetujuan($id_penelitian)
    {
        $this->penelitianModel->find($id_penelitian);

        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $this->penelitianModel->find($id_penelitian)
        ];
        return view('bau/tampilan/persetujuan', $data);
    }

    public function acc_penelitian_bau($id_penelitian)
    {
        $this->penelitianModel->save([
            'id_penelitian'     => $id_penelitian,
            'id_status'         => 3,
            'status_pengajuan'  => 'Disetujui oleh Reviewer'
        ]);

        $this->statusPenelitianModel->save([
            'id_penelitian' => $id_penelitian,
            'status'        => 'Disetujui oleh Reviewer'
        ]);

        session()->setFlashdata('pesan', 'Penelitian berhasil disetujui');

        return redirect()->to('/penelitianBAU');
    }

    public function rjc_penelitian_bau($id_penelitian)
    {

        $this->penelitianModel->save([
            'id_penelitian'     => $id_penelitian,
            'id_status'         => 8,
            'status_pengajuan'  => 'Ditolak oleh BAU',
            'alasan'            => $this->request->getVar('alasan')
        ]);
        $this->statusPenelitianModel->save([
            'id_penelitian' => $id_penelitian,
            'status'        => 'Ditolak oleh BAU'
        ]);

        session()->setFlashdata('pesan', 'Penelitian telah ditolak');

        return redirect()->to('/penelitianBAU');
    }

    //========================PKM===========================
    public function pkm()
    {
        // dd($this->pkmModel->get_pkm_by_status_bau(1));
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            // 'pkm'   => $this->pkmModel->get_pkm_by_status_bau(1),
            'pkm'   => $this->pkmModel->getData_bau(),
        ];
        return view('bau/tampilan/pkm', $data);
    }

    public function pkmPersetujuan($id_pkm)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'pkm' => $this->pkmModel->find($id_pkm)
        ];
        return view('bau/tampilan/pkmPersetujuan', $data);
    }

    public function acc_pkm_bau($id_pkm)
    {
        $this->pkmModel->save([
            'ID_pkm'            => $id_pkm,
            'id_status'         => 3,
            'status'            => 'Pengajuan Disetujui'
        ]);

        $this->statusPkmModel->save([
            'id_pkm' => $id_pkm,
            'status' => 'Pengajuan Disetujui'
        ]);

        session()->setFlashdata('pesan', 'PKM berhasil disetujui');

        return redirect()->to('/pkmBAU');
    }

    public function rjc_pkm_bau($id_pkm)
    {
        $this->pkmModel->save([
            'ID_pkm'            => $id_pkm,
            'id_status'         => 6,
            'status'            => 'Ditolak oleh BAU',
            'alasan'            => $this->request->getVar('alasan')
        ]);

        $this->statusPkmModel->save([
            'id_pkm' => $id_pkm,
            'status' => 'Ditolak oleh BAU'
        ]);

        session()->setFlashdata('pesan', 'PKM telah ditolak');

        return redirect()->to('/pkmBAU');
    }

    public function reimburse()
    {

        //mengambil data user yang sedang login
        $user = auth()->user();

        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'reimburse' => $this->reimburseModel->findAll(),
        ];
        return view('bau/tampilan/reimburse', $data);
    }

    public function detailReimburse($id_reimburse, $idpenelitian)
    {
        $kegiatan_penelitian = $this->danaPenelitianModel->get_dana_by_reimburse($id_reimburse);
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'reimburse' => $this->reimburseModel->find($id_reimburse),
            'dana_penelitian' => $kegiatan_penelitian[0]['dana_keluar'],
            'validation' => \Config\Services::validation(),
            'penelitian' => $this->penelitianModel->find($idpenelitian),
        ];
        // dd($data['reimburse']);

        return view('bau/tampilan/persetujuanReimburse', $data);
    }

    public function detailReimburse2($id_reimburse)
    {
        $kegiatan_pkm = $this->danaPKMModel->get_dana_by_reimburse($id_reimburse);
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'reimburse' => $this->reimburseModel->find($id_reimburse),
            //   'pkm' => $this->pkmModel->find($id_kegiatan),
            'dana_pkm' => $kegiatan_pkm[0]['dana_keluar'],
            'validation' => \Config\Services::validation()
        ];
        // dd($data);
        return view('bau/tampilan/persetujuan2Reimburse', $data);
    }

    public function acc_reimburse($id_reimburse)
    {
        //current year
        $year = date("Y");
        $biayaDicairkan = $this->request->getVar('biayaDicairkan');
        // $penelitian_diajukan = $this->penelitianModel->get_total_diajukan($year);
        $anggaranTotalModel = $this->anggaranTotalModel->get_sisa_terakhir();
        $sisa_anggaran = $anggaranTotalModel['sisa_anggaran'] - $biayaDicairkan;

        $this->reimburseModel->save([
            'id_reimburse'     => $id_reimburse,
            'total_biaya'       => $biayaDicairkan,
            'id_status'         => 2,
            'status_reimburse'  => 'reimbursementt telah dicairkan'
        ]);

        $id_penelitian = $this->reimburseModel->get_id_penelitian_done($id_reimburse);

        $this->anggaranTotalModel->save([
            'tahun'         => $year,
            'dana_keluar'   => $biayaDicairkan,
            'sisa_anggaran' => $sisa_anggaran
        ]);

        $id_penelitian = $this->reimburseModel->get_id_penelitian_done($id_reimburse);
        // $Pen = $this->penelitianModel->get_penelitian($id_penelitian);


        $this->penelitianModel->save([
            'id_penelitian'     => $id_penelitian['id_penelitian'],
            'id_status_reimburse' => 2
        ]);

        session()->setFlashdata('pesan', 'Dana Reimbursement berhasil dicairkan');

        return redirect()->to('/reimburseBAU');
    }

    public function acc_reimburse_pkm($id_reimburse)
    {
        $year = date("Y");
        $biayaDicairkan = $this->request->getVar('biayaDicairkan');
        $anggaranTotalModel = $this->anggaranTotalModel->get_sisa_terakhir();
        // $pkm_diajukan = $this->pkmModel->get_total_diajukan($year);
        $sisa_anggaran = $anggaranTotalModel['sisa_anggaran'] - $biayaDicairkan;

        $this->reimburseModel->save([
            'id_reimburse'     => $id_reimburse,
            'biaya_dicairkan'   => $biayaDicairkan,
            'id_status'         => 2,
            'status_reimburse'  => 'Reimbursement telah dicairkan'
        ]);

        $this->anggaranTotalModel->save([
            'tahun'         => $year,
            'dana_keluar'   => $biayaDicairkan,
            'sisa_anggaran' => $sisa_anggaran
        ]);

        $id_pkm = $this->reimburseModel->get_id_pkm_done($id_reimburse);

        $this->pkmModel->save([
            'ID_pkm'     => $id_pkm['id_pkm'],
            'id_status_reimburse' => 2
        ]);

        session()->setFlashdata('pesan', 'Dana Reimbursement berhasil dicairkan');

        return redirect()->to('/reimburseBAU');
    }
}
