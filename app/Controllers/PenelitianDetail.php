<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\LaporanPenelitianModel;

class PenelitianDetail extends BaseController
{
    use ResponseTrait;
    protected $penelitianModel;
    protected $ketuatimpenelitiModel;
    protected $timpenelitiModel;
    protected $dosenModel;
    protected $luaranModel;
    public function __construct()
    {
        //new
        $this->laporanPenelitianModel = new LaporanPenelitianModel();
      
    }
    public function index()
    {
        //
    }

    public function saveKontrak($idPenelitian){
   
        if (!$this->validate([
            'uploadKontrak' => [
                'rules' => 'uploaded[uploadKontrak]|ext_in[uploadKontrak,pdf]|max_size[uploadKontrak,10000]',
                'errors' => [
                    'uploaded' => "{field} file tidak boleh kosong",
                    'ext_in' => "Format file harus pdf",
                    'max_size' => "Ukuran File terlalu besar"
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // dd($validation);
            session()->setFlashdata('error', 'Terjadi Kesalahan!');
            return redirect()->to('/penelitianProses2Kontrak/'.$idPenelitian)->withInput();
        }

        $fileKontrak = $this->request->getFile('uploadKontrak');
        $namaKontrak = $fileKontrak->getName();
        $this->laporanPenelitianModel->save([
            "id_penelitian" => $idPenelitian,
            "kontrak" => $namaKontrak
        ]);
        $fileKontrak->move('kontrak', $namaKontrak);


        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        // $response = ['status' => 200, 'error' => null, 'messages' => ['success' => 'Data produk berhasil ditambah.']];

        return redirect()->to('/penelitianProses2Kontrak/'.$idPenelitian);
    }

    public function savePendanaan($idPenelitian){
   
        if (!$this->validate([
            'uploadPendanaan' => [
                'rules' => 'uploaded[uploadPendanaan]|ext_in[uploadPendanaan,pdf]|max_size[uploadPendanaan,10000]',
                'errors' => [
                    'uploaded' => "{field} file tidak boleh kosong",
                    'ext_in' => "Format file harus pdf",
                    'max_size' => "Ukuran File terlalu besar"
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // dd($validation);
            session()->setFlashdata('error', 'Terjadi Kesalahan!');
            return redirect()->to('/penelitianProses2/'.$idPenelitian)->withInput();
        }

        $fileKontrak = $this->request->getFile('uploadPendanaan');
        $namaKontrak = $fileKontrak->getName();
        $this->laporanPenelitianModel->save([
            "id_penelitian" => $idPenelitian,
            "kontrak" => $namaKontrak
        ]);
        $fileKontrak->move('bukti_pendanaan', $namaKontrak);


        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        // $response = ['status' => 200, 'error' => null, 'messages' => ['success' => 'Data produk berhasil ditambah.']];

        return redirect()->to('/penelitianProses2/'.$idPenelitian);
    }
    
}
