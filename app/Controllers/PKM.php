<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\pkmModel;
use App\Models\DosenModel;
use App\Models\TimPKMModel;
use CodeIgniter\I18n\Time;

class PKM extends BaseController
{
    public function __construct()
    {
        $this->pkmModel = new pkmModel();
        $this->timModel = new TimPKMModel();
        $this->ketuaModel = new TimPKMModel();
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
        $data['title'] = 'Pkm';


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
            'topik_kegiatan' => $this->request->getVar('topik'),
            // 'bidang' => $this->request->getVar('bidang'),
            'bentuk_kegiatan' => $this->request->getVar('bentukKegiatan'),
            'waktu_pelaksanaan' =>$this->request->getVar('waktu'),
            'tempat_kegiatan' =>$this->request->getVar('tempat'),
            'sasaran' =>$this->request->getVar('sasaran'),
            'target_peserta' =>$this->request->getVar('target'),
            'id_status' => '1',
            'status' => 'diajukan',
            // 'file_proposal' => $this->request->getFile('upload'),
            'biaya'  => $this->request->getVar('biaya'),
            'tanggal_pengajuan' => Time::now()
        ]);

        $idpkm = $this->pkmModel->get_id_pkm($this->request->getVar('topik'));
        // dd($idpkm);
        // $nipdosen = $this->dosenModel->get_nip_peneliti($this->request->getVar('nip'));
        // dd($nipdosen);



        $KetuatimModel = new TimPKMModel();
        $timModel = new TimPKMModel();

        $KetuatimModel->save([
            'id_pkm' => $idpkm['ID_pkm'],
            'nip' =>$this->request->getVar('nip') ,
            'pangkat' => $this->request->getVar('pangkat'),
            'peran'         => "Ketua PKM"
        ]);
        $no = $this->request->getVar('anggota');
        for ($i = 1; $i <= $no; $i++) {
            $timModel->save([
                'id_pkm' => $idpkm['ID_pkm'],
                'nip' => $this->request->getVar('nipAnggota' . $i),
                'pangkat' => $this->request->getVar('pangkatAnggota' . $i),
                'peran'         => "Anggota".$i,
            ]);
        };



        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        // $response = ['status' => 200, 'error' => null, 'messages' => ['success' => 'Data produk berhasil ditambah.']];

        return redirect()->to('/pkmDosen');
        // return $this->respondCreated($response);
    }

  
}

