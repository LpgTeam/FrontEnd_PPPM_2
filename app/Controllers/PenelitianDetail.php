<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\LaporanPenelitianModel;
use App\Models\PenelitianModel;
use App\Models\LuaranTargetModel;

class PenelitianDetail extends BaseController
{
    use ResponseTrait;
    protected $penelitianModel;
    protected $ketuatimpenelitiModel;
    protected $timpenelitiModel;
    protected $dosenModel;
    protected $luaranModel;

    protected $laporanPenelitianModel;

    public function __construct()
    {
        $this->luaranModel = new LuaranTargetModel();
        $this->laporanPenelitianModel = new LaporanPenelitianModel();
        $this->penelitianModel = new PenelitianModel();
    }

    public function saveLaporan($idpenelitian)
    {
        $nLuaran = (int)$this->request->getVar('jumlahrow');

        $fileLaporan = $this->request->getFile('laporan');
        $namaLaporan = $fileLaporan->getName();
        $fileLaporan->move('laporan_penelitian', $namaLaporan);

        $laporan = $this->laporanPenelitianModel->find_by_idpenelitian($idpenelitian);

        $this->laporanPenelitianModel->save([
            'id_laporan'        => $laporan['id_laporan'],
            'id_penelitian'     => $idpenelitian,
            'laporan_luaran'    => $namaLaporan,
        ]);


        for ($i = 1; $i <= $nLuaran; $i++) {
            $this->luaranModel->save([
                'id_penelitian'     => $idpenelitian,
                'jenis_luaran'      => $this->request->getVar('jenisLuaran' . $i),
                'target_capaian'    => $this->request->getVar('targetCapaian' . $i),
                'jurnal_tujuan'     => $this->request->getVar('jurnalTujuan' . $i),
            ]);
        };

        session()->setFlashdata('pesan', 'Data Laporan berhasil ditambahkan.');
        // $response = ['status' => 200, 'error' => null, 'messages' => ['success' => 'Data produk berhasil ditambah.']];

        return redirect()->to('/penelitianDosen');
        // return $this->respondCreated($response);
    }

    public function index()
    {
        //
    }

    public function saveKontrak($idPenelitian)
    {

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
            return redirect()->to('/penelitianProses2Kontrak/' . $idPenelitian)->withInput();
        }

        $penelitian = $this->penelitianModel->get_penelitian($idPenelitian);

        $fileKontrak = $this->request->getFile('uploadKontrak');
        $namaKontrak = $fileKontrak->getName();
        $this->laporanPenelitianModel->save([
            "id_penelitian" => $idPenelitian,
            "kontrak" => $namaKontrak,
            "status_penelitian" => $penelitian['status_pengajuan']
        ]);
        $fileKontrak->move('kontrak', $namaKontrak);


        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        // $response = ['status' => 200, 'error' => null, 'messages' => ['success' => 'Data produk berhasil ditambah.']];

        return redirect()->to('/penelitianProses2Kontrak/' . $idPenelitian);
    }

    public function savePendanaan($idPenelitian)
    {

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
            return redirect()->to('/penelitianProses2/' . $idPenelitian)->withInput();
        }

        $fileKontrak = $this->request->getFile('uploadPendanaan');
        $penelitian = $this->penelitianModel->get_penelitian($idPenelitian);
        // dd($penelitian);
        $namaKontrak = $fileKontrak->getName();
        $this->laporanPenelitianModel->save([
            "id_penelitian" => $idPenelitian,
            "kontrak" => $namaKontrak,
            "status_penelitian" => $penelitian['status_pengajuan']
        ]);
        $fileKontrak->move('bukti_pendanaan', $namaKontrak);


        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        // $response = ['status' => 200, 'error' => null, 'messages' => ['success' => 'Data produk berhasil ditambah.']];

        return redirect()->to('/penelitianProses2/' . $idPenelitian);
    }
}
