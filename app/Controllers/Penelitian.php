<?php

namespace App\Controllers;

use App\Models\UserModelCode;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\PenelitianModel;
use App\Models\DosenModel;
use App\Models\TimPenelitiModel;
use CodeIgniter\I18n\Time;


class Penelitian extends BaseController
{
    use ResponseTrait;
    protected $penelitianModel;
    protected $ketuatimpenelitiModel;
    protected $timpenelitiModel;
    protected $dosenModel;
    public function __construct()
    {
        $this->penelitianModel = new PenelitianModel();
        $this->timpenelitiModel = new TimPenelitiModel();
        $this->ketuatimpenelitiModel = new TimPenelitiModel();
        $this->dosenModel = new DosenModel();
    }

    public function index()
    {   
        //pager initialize
        $pager = \Config\Services::pager();
        // $penelitianModel = new PenelitianModel();
        // $data = array(
        //     // 'posts' => $postModel->paginate(2, 'post'),
        //     // 'penelitian' => $penelitianModel,
        //     // 'pager' => $postModel->pager
        // );
        $data['title'] = 'Penelitian';


        return view('penelitian/index', $data);
    }


    public function save()
    {
        // //validasi input
        if (!$this->validate([
            // 'nama_obat' => 'required|is_unique[obat.nama_obat]'
            // 'nama_obat' => [
            //     'rules' => 'required|is_unique[obat.nama_obat]',
            //     'errors' => [
            //         'required' => '{field} obat harus diisi.',
            //         'is_unique' => '{field} obat sudah terdaftar.'
            //     ]
            // ],
            // 'sampul' => [
            //     'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
            //     'errors' => [
            //         'max_size' => "Ukuran gambar terlalu besar",
            //         'is_image' => "Yang anda pilih bukan gambar",
            //         'mime_in' => "Yang anda pilih bukan gambar"
            //     ]
            // ]
            'upload' =>[
                    'rules' => 'uploaded[upload]|ext_in[upload,pdf]|max_size[upload,10]' ,
                    'errors' => [
                        'uploaded' => "{field} file tidak boleh kosong",
                        'ext_in' => "Format file harus pdf",
                        'max_size' => "Ukuran File terlalu besar"
                    ]
                ]

        ])) {
            // $validation = \Config\Services::validation();
            // dd($validation);
            $jenisPenelitian = $this->request->getVar('jenis_penelitian');
            // return redirect()->to('/obat/create')->withInput()->with('validation', $validation);
            if($jenisPenelitian == 'Mandiri'){
                return redirect()->to('/penelitianMandiri')->withInput();
            }else if($jenisPenelitian == 'Semi Mandiri'){
                return redirect()->to('/penelitianSemiMandiri')->withInput();
            }
        }

        // $slug = url_title($this->request->getVar('judul_penelitian'), '-', true);

        $this->penelitianModel->save([
            'jenis_penelitian' => $this->request->getVar('jenis_penelitian'),
            'judul_penelitian' => $this->request->getVar('judul_penelitian'),
            'bidang' => $this->request->getVar('bidang'),
            'tanggal_pengajuan' => Time::now(),
            'id_status' => '1',
            'status_pengajuan' => 'diajukan',
            'file_proposal' => $this->request->getFile('upload'),
            'biaya'  => $this->request->getVar('biaya')
            // 'file_proposal' => $this->request->getVar(''),
            // 'biaya'  => '8348538319439'
        ]);

        $idpenelitian = $this->penelitianModel->get_id_penelitian($this->request->getVar('judul_penelitian'));
        // dd($idpenelitian );
        $nipdosen = $this->dosenModel->get_nip_peneliti($this->request->getVar('nip'));
        // dd($nipdosen);



        $KetuatimpenelitiModel = new TimPenelitiModel();
        $timpenelitiModel = new TimPenelitiModel();

        // $KetuatimpenelitiModel->save([
        //     'id_penelitian' => $idpenelitian['id_penelitian'],
        //     'NIP' => $nipdosen['NIP_dosen'],
        //     'bidang_keahlian' => $this->request->getVar('bidangKeahlian'),
        //     'namaPeneliti' => $nipdosen['nama_dosen'],
        //     'programStudi' => $nipdosen['program_studi'],
        //     'peran'         => "Ketua Penelitian"
        // ]);
        // $no = $this->request->getVar('anggota');
        // for ($i = 1; $i <= $no; $i++) {
        //     $timpenelitiModel->save([
        //         'id_penelitian' => $idpenelitian['id_penelitian'],
        //         'NIP' => $this->request->getVar('nip' . $i),
        //         'bidang_keahlian' => $this->request->getVar('bidangAnggota' . $i),
        //         'peran'         => $this->request->getVar('tugasAnggota' . $i),
        //         'namaPeneliti' => $this->request->getVar('namaAnggota' . $i),
        //         'programStudi' => $this->request->getVar('studiAnggota' . $i),
        //     ]);
        // };



        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        // $response = ['status' => 200, 'error' => null, 'messages' => ['success' => 'Data produk berhasil ditambah.']];

        return redirect()->to('/penelitianDosen');
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
