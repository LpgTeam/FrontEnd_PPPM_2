<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Pemberitahuan;
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
use App\Models\TimPenelitiModel;
use App\Models\ReimburseModel;
use CodeIgniter\API\ResponseTrait;
use App\Libraries\SendEmail;
use App\Models\TandaTanganDosenModel;

class Kepala extends BaseController
{
    use ResponseTrait;
    protected $penelitianModel;
    protected $statusPenelitianModel;
    protected $pkmModel;
    protected $timpkmModel;
    protected $timpenelitiModel;
    protected $statusPkmModel;
    protected $suratPkmModel;
    protected $ttdDosenModel;
    protected $dosenModel;
    protected $timPenelitiModel;
    protected $timPKMModel;
    protected $rincianModel;
    protected $ttdDosen;
    protected $danaPenelitianModel;
    protected $danaPKMModel;
    protected $laporanPenelitianModel;
    protected $detailStatus;
    protected $detailStatusPkm;
    protected $settingGlobal;
    protected $reimburseModel;
    protected $anggaranAwalModel;
    protected $anggaranTotalModel;

    public function __construct()
    {
        $this->penelitianModel = new PenelitianModel();
        $this->statusPenelitianModel = new StatusPenelitianModel();
        $this->pkmModel = new PkmModel();
        $this->timpkmModel = new TimPKMModel();
        $this->timpenelitiModel = new TimPenelitiModel();
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
        return view('kepala/tampilan/index', $data);
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
        $ttd = $this->ttdDosenModel->get_ttd_by_nip(auth()->user()->nip);
        if ($ttd['ttd_manual'] == null || $ttd['ttd_digital'] == null) {
            session()->setFlashdata('error', 'Anda belum upload tanda tangan, upload tanda tangan terlebih dahulu');

            return redirect()->to('/penelitianKepala');
        } else {
            $this->penelitianModel->save([
                'id_penelitian'     => $id_penelitian,
                'id_status'         => 4,
                'status_pengajuan'  => 'Disetujui oleh Kepala PPPM'
            ]);

            $this->statusPenelitianModel->save([
                'id_penelitian' => $id_penelitian,
                'status'        => 'Disetujui oleh Kepala PPPM'
            ]);

            $notif = new Pemberitahuan();
            $notif->Send_Pemberitahuan_penelitian($id_penelitian);

            session()->setFlashdata('pesan', 'Penelitian berhasil disetujui');
            return redirect()->to('/penelitianKepala');
        }
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

        $notif = new Pemberitahuan();
        $notif->Send_Pemberitahuan_penelitian($id_penelitian);

        session()->setFlashdata('pesan', 'Penelitian telah ditolak');

        return redirect()->to('/penelitianKepala');
    }

    public function acc_pkm_kepala($id_pkm)
    {
        $ttd = $this->ttdDosenModel->get_ttd_by_nip(auth()->user()->nip);
        if ($ttd['ttd_manual'] == null || $ttd['ttd_digital'] == null) {
            session()->setFlashdata('error', 'Anda belum upload tanda tangan, upload tanda tangan terlebih dahulu');

            return redirect()->to('/pkmKepala');
        } else {
            $this->pkmModel->save([
                'ID_pkm'            => $id_pkm,
                'id_status'         => 2,
                'status'            => 'Pengajuan dalam proses'
            ]);

            $this->statusPkmModel->save([
                'id_pkm' => $id_pkm,
                'status' => 'Pengajuan dalam proses'
            ]);

            $notif = new Pemberitahuan();
            $notif->Send_Pemberitahuan_pkm($id_pkm);

            session()->setFlashdata('pesan', 'PKM berhasil disetujui');

            return redirect()->to('/pkmKepala');
        }
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

        $notif = new Pemberitahuan();
        $notif->Send_Pemberitahuan_pkm($id_pkm);

        session()->setFlashdata('pesan', 'PKM telah ditolak');

        return redirect()->to('/pkmKepala');
    }

    public function accAkhir_pkm_kepala($id_pkm)
    {
        $ttd = $this->ttdDosenModel->get_ttd_by_nip(auth()->user()->nip);
        if ($ttd['ttd_manual'] == null || $ttd['ttd_digital'] == null) {
            session()->setFlashdata('error', 'Anda belum upload tanda tangan, upload tanda tangan terlebih dahulu');

            return redirect()->to('/pkmKepala');
        } else {
            // save no surat
            $nSurat = $this->timpkmModel->get_row_timpkm_byId_Pkm($id_pkm);
            // dd();
            for ($i = 0; $i < $nSurat; $i++) {
                # code...
                $nomor = 'PKM/' . date('Y') . '/' . $id_pkm . '/' . ($i + 1);
                // echo $nomor;
                $this->suratPkmModel->save([
                    'no_surat'  => $nomor,
                    'id_pkm'    => $id_pkm
                ]);
            }
            //============endNoSurat=======================
            $this->statusPkmModel->save([
                'id_pkm' => $id_pkm,
                'status' => 'Kegiatan telah selesai dilaksanakan'
            ]);
            $this->pkmModel->save([
                'ID_pkm'            => $id_pkm,
                'id_status'         => 7,
                'status'            => 'Kegiatan telah selesai dilaksanakan'
            ]);

            $notif = new Pemberitahuan();
            $notif->Send_Pemberitahuan_pkm($id_pkm);

            session()->setFlashdata('pesan', 'PKM telah selesai dilaksanakan');

            return redirect()->to('/pkmKepala');
        }
    }

    public function reimburse()
    {

        //mengambil data user yang sedang login
        $user = auth()->user();

        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'reimburse' => $this->reimburseModel->findAll(),
        ];

        return view('kepala/tampilan/reimburse', $data);
    }

    public function detailReimburse($id_reimburse, $idpenelitian)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'reimburse' => $this->reimburseModel->find($id_reimburse),
            'validation' => \Config\Services::validation(),
            'penelitian' => $this->penelitianModel->find($idpenelitian),
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
