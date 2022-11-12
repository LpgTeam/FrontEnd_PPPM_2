<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\pkmModel;
use App\Models\DosenModel;
use App\Models\TimPenelitiModel;
use CodeIgniter\I18n\Time;

class PKM extends BaseController
{
    public function __construct()
    {
        $this->pkmModel = new pkmModel();
        $this->timpenelitiModel = new TimPenelitiModel();
        $this->ketuatimpenelitiModel = new TimPenelitiModel();
        $this->dosenModel = new DosenModel();
    }

    public function index()
    {

        //pager initialize
        $pager = \Config\Services::pager();
        // $pkmModel = new pkmModel();
        $data = array(
            // 'posts' => $postModel->paginate(2, 'post'),
            // 'pkm' => $pkmModel,
            // 'pager' => $postModel->pager
        );
        $data['title'] = 'pkm';


        return view('pkm/index', $data);
    }


    public function save()
    {
        // //validasi input
        // if (!$this->validate([
        //     // 'nama_obat' => 'required|is_unique[obat.nama_obat]'
        //     'nama_obat' => [
        //         'rules' => 'required|is_unique[obat.nama_obat]',
        //         'errors' => [
        //             'required' => '{field} obat harus diisi.',
        //             'is_unique' => '{field} obat sudah terdaftar.'
        //         ]
        //     ],
        //     'sampul' => [
        //         'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
        //         'errors' => [
        //             'max_size' => "Ukuran gambar terlalu besar",
        //             'is_image' => "Yang anda pilih bukan gambar",
        //             'mime_in' => "Yang anda pilih bukan gambar"
        //         ]
        //     ]

        // ])) {
        //     // $validation = \Config\Services::validation();
        //     // dd($validation);
        //     // return redirect()->to('/obat/create')->withInput()->with('validation', $validation);
        //     return redirect()->to('/add-pkm')->withInput();
        // }

        // $slug = url_title($this->request->getVar('judul_pkm'), '-', true);

        $this->pkmModel->save([
            'jenis_pkm' => $this->request->getVar('jenis_pkm'),
            'judul_pkm' => $this->request->getVar('judul_pkm'),
            'bidang' => $this->request->getVar('bidang'),
            'tanggal_pengajuan' => Time::now(),
            'id_status' => '1',
            'status_pengajuan' => 'diajukan',
            'file_proposal' => $this->request->getFile('upload'),
            'biaya'  => $this->request->getVar('biaya')
            // 'file_proposal' => $this->request->getVar(''),
            // 'biaya'  => '8348538319439'
        ]);

        $idpkm = $this->pkmModel->get_id_pkm($this->request->getVar('judul_pkm'));
        // dd($idpkm);
        $nipdosen = $this->dosenModel->get_nip_peneliti($this->request->getVar('nip'));
        // dd($nipdosen);



        $KetuatimpenelitiModel = new TimPenelitiModel();
        $timpenelitiModel = new TimPenelitiModel();

        $KetuatimpenelitiModel->save([
            'ID_pkm' => $idpkm['ID_pkm'],
            'NIP' => $nipdosen,
            'bidang_keahlian' => "efadsd",
            'peran'         => "Ketua pkm"
        ]);
        $no = $this->request->getVar('anggota');
        for ($i = 1; $i <= $no; $i++) {
            $timpenelitiModel->save([
                'ID_pkm' => $idpkm['ID_pkm'],
                'NIP' => "3112" . $i,
                'bidang_keahlian' => $this->request->getVar('bidangAnggota' . $i),
                'peran'         => $this->request->getVar('tugasAnggota' . $i),
            ]);
        };



        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        // $response = ['status' => 200, 'error' => null, 'messages' => ['success' => 'Data produk berhasil ditambah.']];

        return redirect()->to('/pkmDosen');
        // return $this->respondCreated($response);
    }

    public function list()
    {
        // $model = new M_user();
        $model = new DosenModel();
        $request = \Config\Services::request();
        $id = $request->getPostGet('term');
        $user = $model->like('nama_dosen', $id)->findAll();
        $w = array();
        foreach ($user as $rt) :
            $w[] = [
                "label" => $rt['nama_dosen'],
                "nip" => $rt['NIP_dosen'],
                "jabatan" => $rt['jabatan_dosen'],
                "progStudi" => $rt['program_studi'],
                "hp" => $rt['no_hp'],
                "email" => $rt['email_dosen'],
            ];

        endforeach;
        echo json_encode($w);
    }
}

