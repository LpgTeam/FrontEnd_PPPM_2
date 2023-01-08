<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenelitianModel;
use App\Models\PkmModel;
use App\Models\StatusPenelitianModel;
use App\Models\StatusPkmModel;
use App\Models\DetailStatusPenelitianModel;
use App\Models\DetailStatusPkmModel;
use App\Models\AnggaranAwalModel;
use App\Models\AnggaranTotalModel;
use App\Models\DanaAwalDosenModel;
use App\Models\DanaPenelitianModel;
use App\Models\DanaPKMModel;
use App\Models\ReimburseModel;
use App\Models\GlobalSettingModel;

use function PHPUnit\Framework\isNull;

class Admin extends BaseController
{
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

    public function __construct()
    {
        $this->statusPenelitianModel = new StatusPenelitianModel();
        $this->statusPkmModel = new StatusPkmModel();
        $this->detailStatus = new DetailStatusPenelitianModel();
        $this->detailStatusPkm = new DetailStatusPkmModel();
        $this->penelitianModel = new PenelitianModel();
        $this->pkmModel = new PkmModel();
        $this->reimburseModel = new ReimburseModel();
        $this->settingGlobal = new GlobalSettingModel();
        $this->anggaranAwalModel = new AnggaranAwalModel();
        $this->anggaranTotalModel = new AnggaranTotalModel();
        $this->danaPKMModel = new DanaPKMModel();
        $this->danaPenelitianModel = new DanaPenelitianModel();
    }
    public function index()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('penelitian');
        $builder->selectMax('id_penelitian');
        $query = $builder->get();
        $datapenelitian = $query->getResultArray();

        // dd($datapenelitian);

        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        // return view('adminPPPM/tampilan/index', $data);
    }
    public function registerView()
    {
        return view('register');
    }
    public function setting()
    {

        // dd($datapenelitian);
        $user = auth()->user();
        // dd(auth()->user()->getGroups());
        $nip = $user->nip;
        // dd($nip);
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            // 'loginUser' => $this->dosenModel->get_nip_peneliti($nip),
            'ttd'       => $this->settingGlobal->find(1)
        ];
        // dd($data['ttd']);
        return view('adminPPPM/tampilan/setting', $data);
    }

    public function save()
    {
        // dd($this->settingGlobal->findAll());
        // dd($this->request->getVar('setting'));
        $this->settingGlobal->kosongkan();
        $this->settingGlobal->save([
            'id_setting'    => $this->request->getVar('setting')
        ]);
        return redirect()->to('/Setting');
        // return $this->respondCreated($response);
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
            'danaTersedia'      => (int)$sisaAnggaran['sisa_anggaran'] - (int)$danaDiajukan
        ];
        return view('adminPPPM/tampilan/anggaran', $data);
    }

    public function penelitian()
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $this->penelitianModel->getData(),
        ];
        return view('adminPPPM/tampilan/penelitian', $data);
    }

    public function pkm()
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'pkm'   => $this->pkmModel->findAll()
        ];
        return view('adminPPPM/tampilan/pkm', $data);
    }
    //=====================Peneliian Proses==============================================
    public function adminProses1($idPenelitian)
    {
        $data = [
            'title'         => 'PPPM Politeknik Statistika STIS',
            'penelitian'    => $this->penelitianModel->find($idPenelitian),
            'status'        => $this->statusPenelitianModel->get_status_by_id_penelitian($idPenelitian),
            'statusTerbaru' => $this->statusPenelitianModel->get_status_by_id_penelitian_last($idPenelitian)
        ];
        // dd($data['status']);
        return view('adminPPPM/tampilan/penelitianProses/adminProses1', $data);
    }

    public function adminProses2($idPenelitian)
    {
        $data = [
            'title'         => 'PPPM Politeknik Statistika STIS',
            'penelitian'    => $this->penelitianModel->find($idPenelitian),
            'status'        => $this->statusPenelitianModel->get_status_by_id_penelitian($idPenelitian),
            'statusTerbaru' => $this->statusPenelitianModel->get_status_by_id_penelitian_last($idPenelitian)
        ];
        return view('adminPPPM/tampilan/penelitianProses/adminProses2', $data);
    }

    public function adminProses3($idPenelitian)
    {
        $data = [
            'title'         => 'PPPM Politeknik Statistika STIS',
            'penelitian'    => $this->penelitianModel->find($idPenelitian),
            'status'        => $this->statusPenelitianModel->get_status_by_id_penelitian($idPenelitian),
            'statusTerbaru' => $this->statusPenelitianModel->get_status_by_id_penelitian_last($idPenelitian)
        ];
        return view('adminPPPM/tampilan/penelitianProses/adminProses3', $data);
    }
    //==============================================================================

    public function pkmAdminProses1($idpkm)
    {
        $data = [
            'title'         => 'PPPM Politeknik Statistika STIS',
            'pkm'           => $this->pkmModel->find($idpkm),
            'status'        => $this->statusPkmModel->get_status_by_id_pkm($idpkm),
            'statusTerbaru' => $this->statusPkmModel->get_status_by_id_pkm_last($idpkm)
        ];
        return view('adminPPPM/tampilan/pkmProses/pkmProses1', $data);
    }

    public function pkmAdminProses2($idpkm)
    {
        $data = [
            'title'         => 'PPPM Politeknik Statistika STIS',
            'pkm'           => $this->pkmModel->find($idpkm),
            'status'        => $this->statusPkmModel->get_status_by_id_pkm($idpkm),
            'statusTerbaru' => $this->statusPkmModel->get_status_by_id_pkm_last($idpkm)
        ];
        return view('adminPPPM/tampilan/pkmProses/pkmProses2', $data);
    }
    //=========================Remove Status===============================================
    //penelitian
    public function removeStatus($id_penelitian, $id_status)
    {
        $this->statusPenelitianModel->delete([
            'id_status' => $id_status
        ]);

        $currentStatus = $this->statusPenelitianModel->get_status_by_id_penelitian_last($id_penelitian);
        $idCurrentStatus = $this->detailStatus->get_id_status_by_status($currentStatus['status']);
        // dd($currentStatus['status']);
        // dd($idCurrentStatus);

        $this->penelitianModel->save([
            'id_penelitian'     => $id_penelitian,
            'id_status'         => $idCurrentStatus['id_detail'],
            'status_pengajuan'  => $idCurrentStatus['deskripsi'],
        ]);

        return redirect()->to(site_url('penelitianAdmin'));
    }

    //pkm
    public function removeStatusPkm($id_pkm, $id_status)
    {
        $this->statusPkmModel->delete([
            'id_status' => $id_status
        ]);

        $currentStatus = $this->statusPkmModel->get_status_by_id_pkm_last($id_pkm);
        $idCurrentStatus = $this->detailStatusPkm->get_id_status_by_status($currentStatus['status']);
        // dd($currentStatus['status']);
        // dd($idCurrentStatus);

        $this->pkmModel->save([
            'ID_pkm'     => $id_pkm,
            'id_status'  => $idCurrentStatus['id_detail'],
            'status'     => $idCurrentStatus['Deskripsi'],
        ]);

        return redirect()->to(site_url('pkmAdmin'));
    }
    //=================================================================================

    // public function userSetting()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('adminPPPM/tampilan/userSetting', $data);
    // }

    // public function editUser()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('adminPPPM/tampilan/editUser', $data);
    // }

    public function reimburse()
    {

        //mengambil data user yang sedang login
        $user = auth()->user();

        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'reimburse' => $this->reimburseModel->findAll(),
        ];
        // dd($data);
        return view('adminPPPM/tampilan/reimburse', $data);
    }

    public function detailReimburse($id_reimburse)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'reimburse' => $this->reimburseModel->find($id_reimburse),
            'validation' => \Config\Services::validation()
        ];
        return view('adminPPPM/tampilan/detailReimburse', $data);
    }

    public function detailReimburse2($id_reimburse)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'reimburse' => $this->reimburseModel->find($id_reimburse),
            'validation' => \Config\Services::validation()
        ];
        return view('adminPPPM/tampilan/detailReimburse2', $data);
    }
}
