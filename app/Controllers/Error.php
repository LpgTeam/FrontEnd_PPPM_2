<?php

namespace App\Controllers;

class Error extends BaseController
{
    public function index()
    {
        // return redirect()->to($_SERVER['HTTP_REFERER']);
        $this->load->library('user_agent');
        if ($this->agent->is_referral()) {
            echo $this->agent->referrer();
        }
    }
}
