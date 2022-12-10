<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\LaporanPenelitianModel;
use App\Models\PenelitianModel;
use App\Models\StatusPenelitianModel;
use App\Models\LuaranTargetModel;
use App\Models\DanaPenelitianModel;
use CodeIgniter\I18n\Time;

class PenelitianDetail extends BaseController
{
    use ResponseTrait;
    protected $statusPenelitianModel;
    protected $penelitianModel;
    protected $ketuatimpenelitiModel;
    protected $timpenelitiModel;
    protected $dosenModel;
    protected $luaranModel;
    protected $danaPenelitianModel;
    protected $laporanPenelitianModel;

    public function __construct()
    {
        $this->luaranModel = new LuaranTargetModel();
        $this->laporanPenelitianModel = new LaporanPenelitianModel();
        $this->penelitianModel = new PenelitianModel();
        $this->statusPenelitianModel = new StatusPenelitianModel();
        $this->danaPenelitianModel = new DanaPenelitianModel();
    }

    public function index()
    {
        //
    }
    public function saveLaporan($idpenelitian)
    {
        $nLuaran = (int)$this->request->getVar('jumlahrow');
        if (!$this->validate([
            'uploadLaporan' => [
                'rules' => 'uploaded[uploadLaporan]|ext_in[uploadLaporan,pdf]|max_size[uploadLaporan,10000]',
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
            return redirect()->to('/penelitianProses3/' . $idpenelitian)->withInput();
        }

        //delete luaran sebelumnya
        $this->luaranModel->delete_by_idpenelitian($idpenelitian);

        $fileLaporan = $this->request->getFile('uploadLaporan');
        $namaLaporan = $fileLaporan->getName();
        $fileLaporan->move('laporan_penelitian', $namaLaporan);

        $Pen = $this->penelitianModel->get_penelitian($idpenelitian);
        $laporan = $this->laporanPenelitianModel->find_by_idpenelitian($idpenelitian);



        $this->penelitianModel->save([
            'id_penelitian'     => $Pen['id_penelitian'],
            'id_status'         => "10",
            'status_pengajuan'  => "Rangkaian penelitian selesai dilaksanakan"
        ]);


        $this->statusPenelitianModel->save([
            'id_penelitian' => $Pen['id_penelitian'],
            'status'        => 'Rangkaian penelitian selesai dilaksanakan'
        ]);

        $this->laporanPenelitianModel->save([
            'id_laporan'        => $laporan['id_laporan'],
            'id_penelitian'     => $idpenelitian,
            'laporan_luaran'    => $namaLaporan,
            'status_penelitian' => "Rangkaian penelitian selesai dilaksanakan"
        ]);

        $this->danaPenelitianModel->save([
            'id_penelitian'  => $Pen['id_penelitian'],
            'tanggal'        => Time::now('Asia/jakarta'),
            'dana_keluar'    => $this->request->getVar('totalDana'),
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

        // $penelitian = $this->penelitianModel->get_penelitian($idPenelitian);

        $fileKontrak = $this->request->getFile('uploadKontrak');
        $namaKontrak = $fileKontrak->getName();

        $laporan = $this->laporanPenelitianModel->find_by_idpenelitian($idPenelitian);

        $Pen = $this->penelitianModel->get_penelitian($idPenelitian);
        // dd($Pen);
        $this->penelitianModel->save([
            'id_penelitian'     => $Pen['id_penelitian'],
            'id_status'         => "6",
            'status_pengajuan'  => "Kegiatan selesai dilaksanakan"
        ]);

        $this->statusPenelitianModel->save([
            'id_penelitian' => $Pen['id_penelitian'],
            'status'        => 'Kegiatan selesai dilaksanakan'
        ]);

        $this->laporanPenelitianModel->save([
            "id_laporan" => $laporan['id_laporan'],
            "kontrak" => $namaKontrak,
            "status_penelitian" => 'Kegiatan selesai dilaksanakan'
        ]);
        $fileKontrak->move('kontrak', $namaKontrak);


        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        // $response = ['status' => 200, 'error' => null, 'messages' => ['success' => 'Data produk berhasil ditambah.']];

        return redirect()->to('/penelitianDosen');
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
            // return redirect()->to('/penelitianDosen')->withInput();
        }

        $filePendanaan = $this->request->getFile('uploadPendanaan');
        // $penelitian = $this->penelitianModel->get_penelitian($idPenelitian);
        // dd($penelitian);
        $namaPendanaan = $filePendanaan->getName();

        $laporan = $this->laporanPenelitianModel->find_by_idpenelitian($idPenelitian);

        $Pen = $this->penelitianModel->get_penelitian($idPenelitian);
        // dd($Pen);
        $this->penelitianModel->save([
            'id_penelitian'     => $Pen['id_penelitian'],
            'id_status'         => "6",
            'status_pengajuan'  => "Kegiatan selesai dilaksanakan"
        ]);

        $this->statusPenelitianModel->save([
            'id_penelitian' => $Pen['id_penelitian'],
            'status'        => 'Kegiatan selesai dilaksanakan'
        ]);

       

        $this->laporanPenelitianModel->save([
            "id_laporan" => $laporan['id_laporan'],
            "laporan_dana" => $namaPendanaan,
            "status_penelitian" => "Kegiatan selesai dilaksanakan"
        ]);
        $filePendanaan->move('bukti_pendanaan', $namaPendanaan);


        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        // $response = ['status' => 200, 'error' => null, 'messages' => ['success' => 'Data produk berhasil ditambah.']];

        // return redirect()->to('/penelitianProses2/' . $idPenelitian);
        return redirect()->to('/penelitianDosen');
    }
}
