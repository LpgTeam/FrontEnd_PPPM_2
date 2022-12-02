<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\AnggaranAwal;
use App\Models\PenelitianModel;
use App\Models\AnggaranAwalModel;
use App\Models\AnggaranTotalModel;
use App\Models\DanaAwalDosenModel;
use App\Models\DanaPenelitianModel;
use App\Models\DanaPKMModel;
use App\Models\PKMModel;
use App\Models\ReimburseModel;
use CodeIgniter\API\ResponseTrait;


class BAU extends BaseController
{
    use ResponseTrait;
    protected $penelitianModel;
    protected $pkmModel;
    public function __construct()
    {
        $this->penelitianModel = new PenelitianModel();
        $this->pkmModel = new PKMModel();
        $this->reimburseModel = new ReimburseModel();
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

        session()->setFlashdata('pesan', 'Penelitian berhasil disetujui');

        return redirect()->to('/penelitianBAU');
    }

    public function rjc_penelitian_bau($id_penelitian)
    {
        $this->penelitianModel->save([
            'id_penelitian'     => $id_penelitian,
            'id_status'         => 7,
            'status_pengajuan'  => 'Ditolak'
        ]);

        session()->setFlashdata('pesan', 'Penelitian telah ditolak');

        return redirect()->to('/penelitianBAU');
    }

    //=======================Reimbursemen================================
    public function reimburse()
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'reimburse' => $this->reimburseModel->get_reimburse_by_id_status(1)
        ];
        return view('bau/tampilan/reimburse', $data);
    }

    public function persetujuan1Reimburse($id_penelitian)
    {
        $this->reimburseModel->find($id_penelitian);

        $data = [
            'title'         => 'PPPM Politeknik Statistika STIS',
            'reimburse'    => $this->reimburseModel->find($id_penelitian)

        ];
        return view('bau/tampilan/persetujuan1Reimburse', $data);
    }

    public function persetujuan2Reimburse($id_pkm)
    {
        $this->reimburseModel->find($id_pkm);

        $data = [
            'title'         => 'PPPM Politeknik Statistika STIS',
            'reimburse'    => $this->reimburseModel->find($id_pkm)

        ];
        return view('bau/tampilan/persetujuan2Reimburse', $data);
    }

    public function acc_reimburse($id_reimburse)
    {
        $this->reimburseModel->save([
            'id_reimburse'     => $id_reimburse,
            'id_status'         => 2,
            'status_reimburse'  => 'Dana telah dicairkan oleh BAU'
        ]);

        session()->setFlashdata('pesan', 'Dana Reimbursemen berhasil dicairkan');

        return redirect()->to('/reimburseBAU');
    }
}
