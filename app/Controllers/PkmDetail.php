<?php

namespace App\Controllers;

use App\Models\PkmModel;
use App\Models\DosenModel;
use App\Models\TimPKMModel;
use App\Models\RincianPKMModel;

use App\Controllers\BaseController;

class PkmDetail extends BaseController
{
    protected $pkmModel ;
    protected $timModel ;
    protected $ketuaTimModel ;
    protected $dosenModel ;
    protected $rincianModel ;
    
    public function __construct()
    {
        $this->pkmModel = new PkmModel();
        $this->timModel = new TimPKMModel();
        $this->ketuaTimModel = new TimPKMModel();
        $this->dosenModel = new DosenModel();
        $this->rincianModel = new RincianPKMModel();
    }

    public function index()
    {
        //
    }

    public function saveSurat($idpkm){

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
        
        // dd($idpkm);
        $this->rincianModel->save([
            'id_pkm'            => $idpkm,
            'surat_pernyataan'  => $namaSurat,
        ]);

        $this->pkmModel->save([
            'ID_pkm'            => $idpkm,
            'id_status'         => 4,
            'status'  => 'Kegiatan sedang berlangsung'
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        // $response = ['status' => 200, 'error' => null, 'messages' => ['success' => 'Data produk berhasil ditambah.']];

        return redirect()->to('/pkmDosen');
    }

    public function saveBukti($idpkm){
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

    
}
