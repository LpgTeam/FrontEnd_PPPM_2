<?php

namespace App\Controllers;

use CodeIgniter\Shield\Entities\User;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModelCI;
use App\Models\AuthGroupsModel;
use CodeIgniter\I18n\Time;

// use vendor\codeigniter4\shield\src\Models\UserModel;

class AdminUserSetting extends BaseController
{
    use ResponseTrait;
    protected $penelitianModel;
    protected $userModel;
    protected $authGroupModel;

    public function __construct()
    {
        $this->userModel = new UserModelCI();
        $this->authGroupModel = new AuthGroupsModel();
    }

    public function index()
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'user'  => $this->userModel->getAllData(),
        ];
        // dd($data);
        return view('adminPPPM/tampilan/userSetting', $data);
    }

    public function editUser($id)
    {
        // $grupUser = auth()->user()->getGroups();
        // // dd($grupUser[1]);
        // $user = auth()->user();
        $edit = $this->authGroupModel->get_groupUser_by_id($id);
        // // dd($user);
        // $user->removeGroup();
        // $user->addGroup('dosen');


        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            // 'user' => $this->authGroupModel->get_groupUser_by_id($id)
            'user1' => $this->userModel->find($id)
        ];
        // dd($data);
        // dd($this->authGroupModel->get_groupUser_by_id($id));
        return view('adminPPPM/tampilan/editUser', $data);
    }

    public function editRole($user_id)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'user1' => $this->userModel->find($user_id),
            'userRole' => $this->authGroupModel->get_all_role_by_user_id($user_id)
        ];
        // dd($data['userRole']);
        return view('adminPPPM/tampilan/userSettingRole', $data);
    }


    public function updateUser($id)
    {
        // $grupUser = auth()->user()->getGroups();
        // // dd($grupUser[1]);
        // $user = auth()->user();
        // $edit = $this->authGroupModel->get_groupUser_by_id($id);
        // dd($id);
        // $user->removeGroup();
        // $user->addGroup('dosen');
        $this->authGroupModel->save([
            // "id" => $id,
            "user_id" => $id,
            "group" => $this->request->getVar('role'),
            // "creater_at" => Time::now(),
            // "nama" => $this->request->getVar('nama'),
        ]);

        session()->setFlashdata('pesan', 'Role berhasil ditambahkan.');
        // dd($this->request->getVar('role'));
        // return view('adminPPPM/tampilan/editUser');
        return redirect()->to('/userSetting');
    }

    public function deleteUser($user_id)
    {
        // $this->userModel->delete($user_id);

        $users = model('UserModel');
        $user = $users->findById($user_id);
        // dd($user_id);
        $users->delete($user->id, true);

        session()->setFlashdata('pesan', 'Akun User berhasil dihapus.');
        return redirect()->to('/userSetting');
    }

    public function deleteRole($group_id)
    {
        $this->authGroupModel->delete($group_id);
        session()->setFlashdata('pesan', 'Role User berhasil dihapus.');
        return redirect()->to('/userSetting');
    }
}
