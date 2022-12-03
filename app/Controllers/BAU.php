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
<<<<<<< HEAD
use App\Models\PKMModel;
use App\Models\ReimburseModel;
=======
use App\Models\PkmModel;
use App\Models\StatusPkmModel;
>>>>>>> 80e247aa8913b9cfb821244ce24cabfafd487606
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
<<<<<<< HEAD
        $this->pkmModel = new PKMModel();
        $this->reimburseModel = new ReimburseModel();
=======
        $this->pkmModel = new PkmModel();
        $this->statusPkmModel = new StatusPkmModel();
>>>>>>> 80e247aa8913b9cfb821244ce24cabfafd487606
    }

    public function index()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('bau/tampilan/index', $data);
    }

    public function anggaran()
    {
        $dana_awal = new AnggaranAwalModel();
        $dana_penelitian = new DanaPenelitianModel();
        $dana_pkm = new DanaPKMModel();
        $dana_terealisasi = new AnggaranTotalModel();
        $dana_pengajuan = new PenelitianModel();

        //ambil dana penelitian
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
        //update data table anggaran_total harusnya ketika BAU klik "cairkan dana"
        $total_saved = $dana_terealisasi->save($input_terealisasi);

        //ambil dana pengajuan 
        $ambil_pengajuan = $dana_pengajuan->findAll();
        $total_pengajuan = 0;
        foreach ($ambil_pengajuan as $data_pengajuan) {
            if (($data_pengajuan['id_status'] == 5) or ($data_pengajuan['id_status'] == 4)) {
                $total_pengajuan = $total_pengajuan + $data_pengajuan['biaya'];
                // dd($total_pengajuan);
            }
        }
        // dd($ambil_pengajuan);
        //semua dana
        $data = [
            'title'               => 'PPPM Politeknik Statistika STIS',
            'anggaranAwal'        => $dana_awal->orderBy('id_tahunAnggaran', 'DESC')->first(),
            'anggaranTerealisasi' =>  $dana_terealisasi->orderBy('id_total', 'DESC')->first(),
            'anggaranDiajukan'    => $total_pengajuan
        ];

        return view('bau/tampilan/anggaran', $data);
    }

    public function updateAnggaran()
    {
        $dana_awal = new AnggaranAwalModel();

        //current year
        $year = date("Y");

        $update_dana = [
            'tahun_anggaran'  => $year,
            'jumlah'          => $this->request->getVar('danaBaru')
        ];

        $update = $dana_awal->save($update_dana);
        return redirect()->to('/anggaranBAU');
    }
    //=======================Penelitian================================
    public function penelitian()
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $this->penelitianModel->get_penelitian_by_id_status(1),
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
            'id_status'         => 2,
            'status_pengajuan'  => 'Disetujui oleh BAU'
        ]);

        $this->statusPenelitianModel->save([
            'id_penelitian' => $id_penelitian,
            'status'        => 'Disetujui oleh BAU'
        ]);

        session()->setFlashdata('pesan', 'Penelitian berhasil disetujui');

        return redirect()->to('/penelitianBAU');
    }

    public function rjc_penelitian_bau($id_penelitian)
    {
        
        $this->penelitianModel->save([
            'id_penelitian'     => $id_penelitian,
            'id_status'         => 7,
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
            'pkm'   => $this->pkmModel->get_pkm_by_status_bau(1),
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
            'id_status'         => 2,
            'status'            => 'Disetujui oleh BAU'
        ]);

        $this->statusPkmModel->save([
            'id_pkm' => $id_pkm,
            'status' => 'Disetujui oleh BAU'
        ]);

        session()->setFlashdata('pesan', 'PKM berhasil disetujui');

        return redirect()->to('/pkmBAU');
    }

    public function rjc_pkm_bau($id_pkm)
    {
        $this->pkmModel->save([
            'ID_pkm'            => $id_pkm,
            'id_status'         => 5,
            'status'            => 'Ditolak oleh BAU'
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
            // 'penelitian' => $this->penelitianModel->get_penelitian_reimburse_diajukan(1), 
            // 'pkm' => $this->pkmModel->get_pkm_reimburse_diajukan(1),
            
        ];

        return view('bau/tampilan/reimburse', $data);
     }

     public function detailReimburse($id_reimburse){
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'reimburse' => $this->reimburseModel->find($id_reimburse),
            'validation' => \Config\Services::validation()
        ];
        return view('bau/tampilan/persetujuanReimburse', $data);
     }

    public function detailReimburse2($id_reimburse){
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'reimburse' => $this->reimburseModel->find($id_reimburse),
            'validation' => \Config\Services::validation()
        ];
        return view('bau/tampilan/persetujuan2Reimburse', $data);
     }

    public function acc_reimburse($id_reimburse)
    {
        $this->reimburseModel->save([
            'id_reimburse'     => $id_reimburse,
            'id_status'         => 2,
            'status_reimburse'  => 'Dana Reimburse berhasil dicairkan'
        ]);

        $id_penelitian = $this->reimburseModel->get_id_penelitian_done($id_reimburse);
        // $Pen = $this->penelitianModel->get_penelitian($id_penelitian);
      

        $this->penelitianModel->save([
            'id_penelitian'     => $id_penelitian,
            'id_status_reimburse' => 2
        ]);

        session()->setFlashdata('pesan', 'Dana Reimbursemen berhasil dicairkan');

        return redirect()->to('/reimburseBAU');
    }

    public function acc_reimburse_pkm($id_reimburse)
    {
        $this->reimburseModel->save([
            'id_reimburse'     => $id_reimburse,
            'id_status'         => 2,
            'status_reimburse'  => 'Dana Reimburse berhasil dicairkan'
        ]);

        $id_pkm = $this->reimburseModel->get_id_pkm_done($id_reimburse);

        $this->pkmModel->save([
            'ID_pkm'     => $id_pkm,
            'id_status_reimburse' => 2
        ]);

        session()->setFlashdata('pesan', 'Dana Reimbursemen berhasil dicairkan');

        return redirect()->to('/reimburseBAU');
    }

}

