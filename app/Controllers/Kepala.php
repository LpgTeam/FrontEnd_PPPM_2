<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenelitianModel;
use App\Models\StatusPenelitianModel;
use App\Models\PkmModel;
use App\Models\SuratKeteranganPkmModel;
use App\Models\TimPKMModel;
use App\Models\StatusPkmModel;
use App\Models\AnggaranAwalModel;
use App\Models\AnggaranTotalModel;
use App\Models\DanaAwalDosenModel;
use App\Models\DanaPenelitianModel;
use App\Models\DanaPKMModel;
use App\Models\ReimburseModel;  
use CodeIgniter\API\ResponseTrait;
// use App\Libraries\SendEmail;


class Kepala extends BaseController
{
    use ResponseTrait;
    protected $penelitianModel;
    protected $statusPenelitianModel;
    protected $pkmModel;
    protected $timpkmModel;
    protected $statusPkmModel;
    protected $suratPkmModel;
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
        return view('kepala/tampilan/index', $data);
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

    //     return view('kepala/tampilan/anggaran', $data);
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
       return view('kepala/tampilan/anggaran', $data);

    }

    public function penelitian()
    {
        $penelitianModel = new PenelitianModel();
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            // 'penelitian' => $penelitianModel->get_penelitian_by_id_status(3),
            'penelitian' => $penelitianModel->getData(),
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
            // 'pkm'   => $this->pkmModel->get_pkm_by_status2(2, 4),
            'pkm'   => $this->pkmModel->getData(),
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

        $this->statusPenelitianModel->save([
            'id_penelitian' => $id_penelitian,
            'status'        => 'Disetujui oleh Kepala PPPM'
        ]);

        // $sendEmail = new SendEmail();
        // $sendEmail->send_email_persetujuan('Kepala PPPM');
        session()->setFlashdata('pesan', 'Penelitian berhasil disetujui');

        return redirect()->to('/penelitianKepala');
    }

    public function rjc_penelitian_kepala($id_penelitian)
    {
        $this->penelitianModel->save([
            'id_penelitian'     => $id_penelitian,
            'id_status'         => 9,
            'status_pengajuan'  => 'Ditolak Kepala PPPM',
            'alasan'            => $this->request->getVar('alasan')
        ]);

        $this->statusPenelitianModel->save([
            'id_penelitian' => $id_penelitian,
            'status'        => 'Ditolak oleh Kepala PPPM'
        ]);

        session()->setFlashdata('pesan', 'Penelitian telah ditolak');

        return redirect()->to('/penelitianKepala');
    }

    public function acc_pkm_kepala($id_pkm)
    {
        $this->pkmModel->save([
            'ID_pkm'            => $id_pkm,
            'id_status'         => 2,
            'status'            => 'Pengajuan dalam proses'
        ]);

        $this->statusPkmModel->save([
            'id_pkm' => $id_pkm,
            'status' => 'Pengajuan dalam proses'
        ]);

        session()->setFlashdata('pesan', 'PKM berhasil disetujui');

        return redirect()->to('/pkmKepala');
    }

    public function rjc_pkm_kepala($id_pkm)
    {
        $this->pkmModel->save([
            'ID_pkm'            => $id_pkm,
            'id_status'         => 5,
            'status'            => 'Ditolak Oleh Kepala PPPM',
            'alasan'            => $this->request->getVar('alasan')
        ]);

        $this->statusPkmModel->save([
            'id_pkm' => $id_pkm,
            'status' => 'Ditolak Oleh Kepala PPPM'
        ]);

        session()->setFlashdata('pesan', 'PKM telah ditolak');

        return redirect()->to('/pkmKepala');
    }

    public function accAkhir_pkm_kepala($id_pkm)
    {   
        // save no surat
        $nSurat = $this->timpkmModel->get_row_timpkm_byId_Pkm($id_pkm);
        // dd();
        for ($i=0; $i < $nSurat; $i++) { 
            # code...
            $nomor = 'PKM/'.date('Y').'/'.$id_pkm.'/'.$i+1;
            // echo $nomor;
            $this->suratPkmModel->save([
                'no_surat'  => $nomor,
                'id_pkm'    => $id_pkm
            ]);
        }
        //============endNoSurat=======================

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

        //mengambil data user yang sedang login
        $user = auth()->user();

        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'reimburse' => $this->reimburseModel->findAll(),
            // 'penelitian' => $this->penelitianModel->get_penelitian_reimburse_diajukan(1), 
            // 'pkm' => $this->pkmModel->get_pkm_reimburse_diajukan(1),

        ];

        return view('kepala/tampilan/reimburse', $data);
    }

    public function detailReimburse($id_reimburse)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'reimburse' => $this->reimburseModel->find($id_reimburse),
            'validation' => \Config\Services::validation()
        ];
        return view('kepala/tampilan/detailReimburse', $data);
    }

    public function detailReimburse2($id_reimburse)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'reimburse' => $this->reimburseModel->find($id_reimburse),
            'validation' => \Config\Services::validation()
        ];
        return view('kepala/tampilan/detailReimburse2', $data);
    }
}