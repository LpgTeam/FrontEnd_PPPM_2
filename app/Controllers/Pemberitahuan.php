<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\SendEmail;
use App\Models\PenelitianModel;
use App\Models\PkmModel;
use App\Models\TimPenelitiModel;
use App\Models\TimPKMModel;
use CodeIgniter\API\ResponseTrait;

class Pemberitahuan extends BaseController
{
    use ResponseTrait;
    protected $penelitianModel;
    protected $pkmModel;
    protected $timpkmModel;
    protected $timpenelitiModel;
    public function __construct()
    {
        $this->penelitianModel = new PenelitianModel();
        $this->pkmModel = new PkmModel();
        $this->timpkmModel = new TimPKMModel();
        $this->timpenelitiModel = new TimPenelitiModel();
    }

    public function Send_Pemberitahuan_penelitian($id_penelitian)
    {
        $jenis = "penelitian";
        $penelitian = $this->penelitianModel->find($id_penelitian);
        $timpeneliti = $this->timpenelitiModel->get_timpeneliti_byid($id_penelitian);
        $sendEmail = new SendEmail();
        $sendEmail->send_email_pemberitahuan($jenis, $penelitian, $timpeneliti);
    }

    public function Send_Pemberitahuan_pkm($id_pkm)
    {
        $jenis = "pkm";
        $pkm = $this->pkmModel->find($id_pkm);
        $timpkm = $this->timpkmModel->get_timpkm_byid($id_pkm);
        $sendEmail = new SendEmail();
        $sendEmail->send_email_pemberitahuan($jenis, $pkm, $timpkm);
    }
}
