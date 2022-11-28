<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenelitianModel;
use App\Models\PkmModel;
use App\Models\AnggaranAwalModel;
use App\Models\AnggaranTotalModel;
use App\Models\DanaAwalDosenModel;
use App\Models\DanaPenelitianModel;
use App\Models\DanaPKMModel;
use CodeIgniter\API\ResponseTrait;

class Kepala extends BaseController
{
    use ResponseTrait;
    protected $penelitianModel;
    protected $pkmModel;
    public function __construct()
    {
        $this->penelitianModel = new PenelitianModel();
        $this->pkmModel = new PkmModel();
    }

    public function index()
    {
        // $email = \Config\Services::email();
        // $email->setFrom('lpgteam6@gmail.com');
        // $email->setTo('aljaffarsyah10@gmail.com');
        // $email->setSubject('testing');
        // $email->setMessage('<p>testing email</p>');
        // // $email->send();
        // if ($email->send()) {
        //     echo 'Email successfully sent';
        // } else {
        //     $data = $email->printDebugger(['headers']);
        //     print_r($data);
        // }

        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('kepala/tampilan/index', $data);
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
            }
        }

     
        //semua dana
        $data = [
            'title'               => 'PPPM Politeknik Statistika STIS',
            'anggaranAwal'        => $dana_awal->orderBy('id_tahunAnggaran', 'DESC')->first(),
            'anggaranTerealisasi' =>  $dana_terealisasi->orderBy('id_total', 'DESC')->first(),
            'anggaranDiajukan'    => $total_pengajuan
        ];

        return view('kepala/tampilan/anggaran', $data);
    }

    public function penelitian()
    {
        $penelitianModel = new PenelitianModel();
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $penelitianModel->get_penelitian_by_id_status(3),
        ];
        return view('kepala/tampilan/penelitian', $data);
    }

    public function penelitianPersetujuan($id_penelitian)
    {
        $this->penelitianModel->find($id_penelitian);

        $data = [
            'title'         => 'PPPM Politeknik Statistika STIS',
            'penelitian'    => $this->penelitianModel->find($id_penelitian)
        ];

        return view('kepala/tampilan/penelitianPersetujuan', $data);
    }

    public function pkm()
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'pkm'   => $this->pkmModel->get_pkm_by_status2(2, 4),
        ];
        return view('kepala/tampilan/pkm', $data);
    }

    public function pkmPersetujuan($id_pkm)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'pkm' => $this->pkmModel->find($id_pkm)
        ];
        return view('kepala/tampilan/pkmPersetujuan', $data);
    }

    public function pkmPersetujuanSelesai($id_pkm)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'pkm' => $this->pkmModel->find($id_pkm)
        ];
        return view('kepala/tampilan/pkmPersetujuanSelesai', $data);
    }

    public function acc_penelitian_kepala($id_penelitian)
    {
        $this->penelitianModel->save([
            'id_penelitian'     => $id_penelitian,
            'id_status'         => 4,
            'status_pengajuan'  => 'Disetujui oleh Kepala PPPM'
        ]);

        session()->setFlashdata('pesan', 'Penelitian berhasil disetujui');

        return redirect()->to('/penelitianKepala');
    }

    public function rjc_penelitian_kepala($id_penelitian)
    {
        $this->penelitianModel->save([
            'id_penelitian'     => $id_penelitian,
            'id_status'         => 6,
            'status_pengajuan'  => 'Ditolak kepala pppm'
        ]);

        session()->setFlashdata('pesan', 'Penelitian telah ditolak');

        return redirect()->to('/penelitianKepala');
    }

    public function acc_pkm_kepala($id_pkm)
    {
        $this->pkmModel->save([
            'ID_pkm'            => $id_pkm,
            'id_status'         => 3,
            'status'            => 'Disetujui Oleh Kepala PPPM'
        ]);

        session()->setFlashdata('pesan', 'PKM berhasil disetujui');

        return redirect()->to('/pkmKepala');
    }

    public function rjc_pkm_kepala($id_pkm)
    {
        $this->pkmModel->save([
            'ID_pkm'            => $id_pkm,
            'id_status'         => 6,
            'status'            => 'Ditolak Oleh Kepala PPPM'
        ]);

        session()->setFlashdata('pesan', 'PKM telah ditolak');

        return redirect()->to('/pkmKepala');
    }

    public function accAkhir_pkm_kepala($id_pkm)
    {
        $this->pkmModel->save([
            'ID_pkm'            => $id_pkm,
            'id_status'         => 7,
            'status'            => 'Kegiatan telah selesai dilaksanakan'
        ]);

        session()->setFlashdata('pesan', 'PKM telas selesai dilaksanakan');

        return redirect()->to('/pkmKepala');
    }

    public function reimburse()
    {
        $data = [
            'title'         => 'PPPM Politeknik Statistika STIS'
        ];
        return view('kepala/tampilan/reimburse', $data);
    }

    public function detailReimburse()
    {
        $data = [
            'title'         => 'PPPM Politeknik Statistika STIS'
        ];
        return view('kepala/tampilan/detailReimburse', $data);
    }


    public function detailReimburse2()
    {
        $data = [
            'title'         => 'PPPM Politeknik Statistika STIS'
        ];
        return view('kepala/tampilan/detailReimburse2', $data);
    }
}
