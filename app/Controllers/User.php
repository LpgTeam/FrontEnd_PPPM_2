<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DosenModel;

class User extends BaseController
{
    protected $dosenModel;

    public function __construct()
    {
        $this->dosenModel = new DosenModel();
       
    }

    public function index()
    {
        //
    }

    public function ganti_password()
    {
        $nip = auth()->user()->nip;
        
     
        // dd($this->dosenModel->get_nip_peneliti($nip));
        $data = [
            'title'         => 'Ubah Password',
            'user'          => $this->dosenModel->get_nip_peneliti($nip),
        ];
        return view('/ubahPassword', $data);
    }

    public function act_ganti_password(){
        $data = $this->request->getPost();

        $nip = auth()->user()->nip;
        $user = $this->dosenModel->get_nip_peneliti($nip);
        // dd($user['email_dosen']);
        $credentials = [
            'email' => '222011494@stis.ac.id',
            'password' => $data['passwordLama'],
        ];

        if(!auth()->check($credentials)->isOK()){
            session()->setFlashdata('error', 'Password lama salah!');
            return redirect()->to('/user/ubahPaswword');
        }
        
        if(!$data['passwordBaru'] == $data['confPasswordBaru']){
            session()->setFlashdata('error', 'Password baru tidak sama!');
            return redirect()->to('/user/ubahPaswword');
        }

        $user = auth()->user();
        $user->setPassword($data['passwordBaru']);
        $user->saveEmailIdentity();
    
        session()->setFlashdata('pesan', 'Berhasil ganti password');
        return redirect()->to('/user/ubahPaswword');
    }
}
