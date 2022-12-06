<?php

namespace App\Controllers;

use App\Models\PkmModel;
use App\Models\DosenModel;
use App\Models\TimPKMModel;
use App\Models\DanaPKMModel;
use App\Models\RincianPKMModel;
use App\Models\StatusPkmModel;

use CodeIgniter\I18n\Time;
use App\Controllers\BaseController;

class PkmDetail extends BaseController
{
    protected $pkmModel;
    protected $timModel;
    protected $ketuaTimModel;
    protected $dosenModel;
    protected $rincianModel;
    protected $statusPkmModel;
    protected $danapkmModel;

    public function __construct()
    {
        $this->pkmModel = new PkmModel();
        $this->timModel = new TimPKMModel();
        $this->ketuaTimModel = new TimPKMModel();
        $this->dosenModel = new DosenModel();
        $this->rincianModel = new RincianPKMModel();
        $this->statusPkmModel = new StatusPkmModel();
        $this->danapkmModel = new DanaPKMModel();
    }

    public function index()
    {
        //
    }

    public function saveSurat($idpkm)
    {
        if (!$this->validate([
            'suratPernyataan' => [
                'rules' => 'uploaded[suratPernyataan]|ext_in[suratPernyataan,pdf]|max_size[suratPernyataan,10000]',
                'errors' => [
                    'uploaded' => "{field} file tidak boleh kosong",
                    'ext_in' => "Format file harus pdf",
                    'max_size' => "Ukuran File terlalu besar"
                ]
            ]
        ])) {
            session()->setFlashdata('error', 'Terjadi Kesalahan!!');
            return redirect()->to('/pkmProses2/' . $idpkm)->withInput();
        }
        //Save surat pernyataan
        $fileSurat = $this->request->getFile('suratPernyataan');
        $namaSurat = $fileSurat->getName();
        $fileSurat->move('surat_pernyataan/pkm', $namaSurat);

        $rincian = $this->rincianModel->find_by_idpkm($idpkm);

        // dd($rincian);
        $this->rincianModel->save([
            // 'id'                => $rincian['id'],
            'id_pkm'            => $idpkm,
            'surat_pernyataan'  => $namaSurat,
        ]);

        $this->pkmModel->save([
            'ID_pkm'            => $idpkm,
            'id_status'         => 4,
            'status'  => 'Kegiatan sedang berlangsung'
        ]);

        $this->danapkmModel->save([
            'id_pkm'             => $idpkm,
            'tanggal'            => Time::now('Asia/jakarta'),
            'dana_keluar'        => $this->request->getVar('totalDana'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        // $response = ['status' => 200, 'error' => null, 'messages' => ['success' => 'Data produk berhasil ditambah.']];

        return redirect()->to('/pkmDosen');
    }

    public function saveBukti($idpkm)
    {
        if (!$this->validate([
            'uploadBukti' => [
                'rules' => 'uploaded[uploadBukti]|ext_in[uploadBukti,pdf]|max_size[uploadBukti,10000]',
                'errors' => [
                    'uploaded' => "{field} file tidak boleh kosong",
                    'ext_in' => "Format file harus pdf",
                    'max_size' => "Ukuran File terlalu besar"
                ]
            ]
        ])) {
            // dd($this->request->getVar('narasumber'),$this->request->getVar('penyelenggara'));
            session()->setFlashdata('error', 'Terjadi Kesalahan!!');
            return redirect()->to('/pkmProses3/' . $idpkm)->withInput();
        }

        //save bukti kegiatan
        $fileBukti = $this->request->getFile('uploadBukti');
        $namaBukti = $fileBukti->getName();
        $fileBukti->move('bukti_kegiatan/pkm', $namaBukti);

        $rincian = $this->rincianModel->find_by_idpkm($idpkm);

        $this->rincianModel->save([
            'id'        => $rincian['id'],
            'id_pkm'    => $idpkm,
            'bukti_kegiatan' => $namaBukti,
            'narasumber' => $this->request->getVar('narasumber'),
            'penyelenggara' => $this->request->getVar('penyelenggara'),
        ]);


        // $this->pkmModel->save([
        //     'ID_pkm'            => $idpkm,
        //     'id_status'         => 7,
        //     'status'  => 'Kegiatan telah selesai dilaksanakan'
        // ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        // $response = ['status' => 200, 'error' => null, 'messages' => ['success' => 'Data produk berhasil ditambah.']];

        return redirect()->to('/pkmDosen');
    }

    public function setujuiSurat($idpkm)
    {
        $this->pkmModel->save([
            'ID_pkm'            => $idpkm,
            'id_status'         => 4,
            'status'  => 'Kegiatan sedang berlangsung'
        ]);
        $this->statusPkmModel->save([
            'id_pkm' => $idpkm,
            'status' => 'Kegiatan sedang berlangsung'
        ]);
        return redirect()->to('/pkmDosen');
    }
}
