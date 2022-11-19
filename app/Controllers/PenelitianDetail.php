<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\PenelitianModel;
use App\Models\DosenModel;
use App\Models\TimPenelitiModel;
use App\Models\LuaranTargetModel;
use App\Models\LaporanPenelitianModel;

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
        $this->penelitianModel = new PenelitianModel();
        $this->timpenelitiModel = new TimPenelitiModel();
        $this->ketuatimpenelitiModel = new TimPenelitiModel();
        $this->dosenModel = new DosenModel();
        $this->luaranModel = new LuaranTargetModel();
        $this->laporanPenelitianModel = new LaporanPenelitianModel();
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
}
