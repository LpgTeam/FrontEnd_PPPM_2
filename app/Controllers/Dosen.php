<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\API\ResponseTrait;
use App\Models\AnggaranAwalModel;
use App\Models\AnggaranTotalModel;
use App\Models\DanaAwalDosenModel;
use App\Models\DanaPenelitianModel;
use App\Models\PenelitianModel;
use App\Models\RincianPKMModel;
use App\Models\TimPenelitiModel;
use App\Models\LaporanPenelitianModel;
use App\Models\TandaTanganDosenModel;
use App\Models\DanaPKMModel;
use App\Models\PkmModel;
use App\Models\TimPKMModel;
use App\Models\DosenModel;
use App\Models\StatusPenelitianModel;
use App\Models\StatusPKMModel;
use App\Models\ReimburseModel;
use App\Models\LuaranTargetModel;
use App\Models\PembiayaanPkmModel;
use CodeIgniter\I18n\Time;


class Dosen extends BaseController
{
    use ResponseTrait;
    protected $penelitianModel;
    protected $dosenModel;
    protected $timPenelitiModel;
    protected $timPKMModel;
    protected $pkmModel;
    protected $rincianModel;
    protected $ttdDosen;
    protected $danaPenelitianModel;
    protected $danaPKMModel;
    protected $statusPenelitianModel;
    protected $statusPKMModel;
    protected $laporanPenelitianModel;
    protected $statusPkmModel;
    protected $detailStatus;
    protected $detailStatusPkm;
    protected $settingGlobal;
    protected $reimburseModel;
    protected $anggaranAwalModel;
    protected $anggaranTotalModel;
    protected $luaranTargetModel;
    protected $pembiayaanPkmModel;

    public function __construct()
    {
        $this->penelitianModel = new PenelitianModel();
        $this->dosenModel = new DosenModel();
        $this->ttdDosen = new TandaTanganDosenModel();
        $this->timPenelitiModel = new TimPenelitiModel();
        $this->timPKMModel = new TimPKMModel();
        $this->pkmModel = new PkmModel();
        $this->rincianModel = new RincianPKMModel();
        $this->laporanPenelitianModel = new LaporanPenelitianModel();
        $this->reimburseModel = new ReimburseModel();
        $this->anggaranAwalModel = new AnggaranAwalModel();
        $this->anggaranTotalModel = new AnggaranTotalModel();
        $this->danaPKMModel = new DanaPKMModel();
        $this->danaPenelitianModel = new DanaPenelitianModel();
        $this->statusPenelitianModel = new StatusPenelitianModel();
        $this->statusPKMModel = new StatusPKMModel();
        $this->luaranTargetModel = new LuaranTargetModel();
        $this->pembiayaanPkmModel = new PembiayaanPkmModel();
    }

    public function index()
    {
        $user = auth()->user();
        $nip = $user->nip;
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'loginUser' => $this->dosenModel->get_nip_peneliti($nip),
            'ttd'       => $this->ttdDosen->get_ttd_by_nip($nip)
        ];

        return view('dosen/tampilan/index', $data);
    }

    public function anggaran()
    {
        //current year
        $year = date("Y");
        $penelitianDiajukan = $this->penelitianModel->get_total_diajukan($year);
        $pkmDiajukan = $this->pkmModel->get_total_diajukan($year);
        $danaDiajukan = $penelitianDiajukan + $pkmDiajukan;
        $sisaAnggaran = $this->anggaranTotalModel->get_sisa_terakhir();

        //    dd($sisaAnggaran['sisa_anggaran']);
        $data = [
            'title'             => 'PPPM Politeknik Statistika STIS',
            'anggaranAwal'      => $this->anggaranAwalModel->get_dana(),
            'danaTerealisasi'   => $this->anggaranTotalModel->get_total($year),
            'danaDiajukan'      => $danaDiajukan,
            'danaTersedia'      => $sisaAnggaran['sisa_anggaran'] - $danaDiajukan
        ];
        return view('dosen/tampilan/anggaran', $data);
    }

    public function penelitian()
    {
        //mengambil data user yang sedang login
        $user = auth()->user();
        // $nip = $user->nip;
        // dd($nip);
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $this->timPenelitiModel->get_penelitian_by_nip_user($user->nip),
            'validation' => \Config\Services::validation(),
        ];
        // dd($data['validation']);
        // dd($data['penelitian']);
        return view('dosen/tampilan/penelitian', $data);
    }

    public function pkm()
    {
        $pkmModel = new PkmModel();
        $user = auth()->user();
        // $nip = $user->nip;
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'pkm' => $this->timPKMModel->get_pkm_by_nip_user($user->nip),
        ];
        // dd($data['pkm']);
        return view('dosen/tampilan/pkm', $data);
    }

    public function pkmjenis()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/pkmjenis', $data);
    }

    public function faq()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/faq', $data);
    }

    public function penelitianjenis()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('dosen/tampilan/penelitianjenis', $data);
    }

    public function penelitianForm($jenis)
    {
        $ttdDosen = $this->ttdDosen->get_ttd_by_nip(auth()->user()->nip);
        // dd($ttdDosen);
        if ($ttdDosen['ttd_manual'] == null && $ttdDosen['ttd_digital'] == null) {

            session()->setFlashdata('error', 'Anda belum upload tanda tangan, silahkan upload terlebih dahulu di Beranda');
            return redirect()->to('/penelitianDosen');
        } else {
            session();
            if ($jenis == "mandiri") {
                $jenisPenelitian = "Mandiri";
            } elseif ($jenis == "semi-mandiri") {
                $jenisPenelitian = "Semi Mandiri";
            } elseif ($jenis == "kerja-sama") {
                $jenisPenelitian = "Kerjasama";
            } elseif ($jenis == "didanai-institusi") {
                $jenisPenelitian = "Didanai Institusi";
            } elseif ($jenis == "institusi") {
                $jenisPenelitian = "Institusi";
            }
            // dd($jenisPenelitian);
            // dd($jenisPenelitian)198512122008011004

            $nipdosen = $this->dosenModel->get_nip_peneliti(auth()->user()->nip);

            $data = [
                'title' => 'PPPM Politeknik Statistika STIS',
                'jenis' => $jenisPenelitian,
                'user' => $nipdosen,
                'validation' => \Config\Services::validation()
            ];
            // return view('dosen/tampilan/penelitianForm1', $data);
            return view('dosen/tampilan/penelitianForm', $data);
        }
    }

    public function pkmForm($jenis)
    {
        $ttdDosen = $this->ttdDosen->get_ttd_by_nip(auth()->user()->nip);
        // dd($ttdDosen);
        if (($ttdDosen['ttd_manual'] == null && $ttdDosen['ttd_digital'] == null)) {

            session()->setFlashdata('error', 'Anda belum upload tanda tangan, silahkan upload terlebih dahulu di Beranda');
            return redirect()->to('/pkmDosen');
        } else {
            $nipdosen = $this->dosenModel->get_nip_peneliti(auth()->user()->nip);
            $data = [
                'title' => 'PPPM Politeknik Statistika STIS',
                'jenis' => $jenis,
                'user' => $nipdosen,
                'validation' => \Config\Services::validation()
            ];
            // dd($data['jenis']);
            return view('dosen/tampilan/pkmForm', $data);
        }
    }

    public function deletePenelitian($id_penelitian)
    {
        $this->penelitianModel->delete($id_penelitian);
        $this->timPenelitiModel->where(['id_penelitian' => $id_penelitian])->delete();
        $this->laporanPenelitianModel->where(['id_penelitian' => $id_penelitian])->delete();
        $this->statusPenelitianModel->where(['id_penelitian' => $id_penelitian])->delete();
        $this->luaranTargetModel->where(['id_penelitian' => $id_penelitian])->delete();

        session()->setFlashdata('pesan', 'Penelitian yang diajukan berhasil dibatalkan.');
        return redirect()->to('/penelitianDosen');
    }

    public function deletePKM($id_pkm)
    {
        $this->pkmModel->delete($id_pkm);
        $this->timPKMModel->where(['id_pkm' => $id_pkm])->delete();
        $this->rincianModel->where(['id_pkm' => $id_pkm])->delete();
        $this->statusPKMModel->where(['id_pkm' => $id_pkm])->delete();
        $this->pembiayaanPkmModel->where(['id_pkm' => $id_pkm])->delete();

        session()->setFlashdata('pesan', 'PKM yang diajukan berhasil dibatalkan.');
        return redirect()->to('/pkmDosen');
    }

    // ======================PKM Detail=========================
    public function pkmDetail1($idPKM)
    {
        $pkm = $this->timPKMModel->get_pkm_by_nip_user(auth()->user()->nip);
        $x = 1;
        foreach ($pkm as $key => $pen) {
            # code...
            if ($idPKM != $pen['ID_pkm']) {
                $x;
            } else {
                $x = 2;
            }
        }
        // dd($x);
        if ($x == 1) {
            return view('errors/html/error_404');
            // dd($x);
        } else {
            $data = [
                'title' => 'PPPM Politeknik Statistika STIS',
                'pkm' => $this->pkmModel->find($idPKM),
                'rincian' => $this->rincianModel->find_by_idpkm($idPKM),
            ];
            return view('dosen/tampilan/pkmProses/pkmProses1', $data);
        }
    }

    public function pkmDetail2($idPKM)
    {
        $pkm = $this->timPKMModel->get_pkm_by_nip_user(auth()->user()->nip);
        $x = 1;
        foreach ($pkm as $key => $pen) {
            # code...
            if ($idPKM != $pen['ID_pkm']) {
                $x;
            } else {
                $x = 2;
            }
        }
        // dd($x);
        if ($x == 1) {
            return view('errors/html/error_404');
            // dd($x);
        } else {
            $nip = auth()->user()->nip;
            // dd($nip);
            $data = [
                'title' => 'PPPM Politeknik Statistika STIS',
                'pkm' => $this->pkmModel->find($idPKM),
                'rincian' => $this->rincianModel->find_by_idpkm($idPKM),
                'ttd'   => $this->ttdDosen->get_ttd_by_nip($nip),
                'validation' => \Config\Services::validation(),
            ];
            // dd($data['ttd']);
            return view('dosen/tampilan/pkmProses/pkmProses2', $data);
        }
    }

    public function pkmDetail3($idPKM)
    {
        $pkm = $this->timPKMModel->get_pkm_by_nip_user(auth()->user()->nip);
        $x = 1;
        foreach ($pkm as $key => $pen) {
            # code...
            if ($idPKM != $pen['ID_pkm']) {
                $x;
            } else {
                $x = 2;
            }
        }
        // dd($x);
        if ($x == 1) {
            return view('errors/html/error_404');
            // dd($x);
        } else {
            $data = [
                'title' => 'PPPM Politeknik Statistika STIS',
                'pkm' => $this->pkmModel->find($idPKM),
                'rincian' => $this->rincianModel->find_by_idpkm($idPKM),
                'validation' => \Config\Services::validation(),
            ];
            return view('dosen/tampilan/pkmProses/pkmProses3', $data);
        }
    }

    public function pkmDetail4($idPKM)
    {
        $pkm = $this->timPKMModel->get_pkm_by_nip_user(auth()->user()->nip);
        $x = 1;
        foreach ($pkm as $key => $pen) {
            # code...
            if ($idPKM != $pen['ID_pkm']) {
                $x;
            } else {
                $x = 2;
            }
        }
        // dd($x);
        if ($x == 1) {
            return view('errors/html/error_404');
            // dd($x);
        } else {
            $data = [
                'title' => 'PPPM Politeknik Statistika STIS',
                'pkm' => $this->pkmModel->find($idPKM)
            ];
            return view('dosen/tampilan/pkmProses/pkmSelesai', $data);
        }
    }

    //======================PKM Detail=========================

    //===========================Penelitian Proses===========================================
    public function penelitianProses1($id_penelitian)
    {
        $penelitian = $this->timPenelitiModel->get_penelitian_by_nip_user(auth()->user()->nip);
        $x = 1;
        foreach ($penelitian as $key => $pen) {
            # code...
            if ($id_penelitian != $pen['id_penelitian']) {
                $x;
            } else {
                $x = 2;
            }
        }
        // dd($x);
        if ($x == 1) {
            return view('errors/html/error_404');
            // dd($x);
        } else {
            $data = [
                'title' => 'PPPM Politeknik Statistika STIS',
                'penelitian' => $this->penelitianModel->find($id_penelitian)
            ];
            return view('dosen/tampilan/penelitianProses/penelitianDetail1', $data);
        }
    }
    public function penelitianProses2($id_penelitian)
    {
        $penelitian = $this->timPenelitiModel->get_penelitian_by_nip_user(auth()->user()->nip);
        $x = 1;
        foreach ($penelitian as $key => $pen) {
            # code...
            if ($id_penelitian != $pen['id_penelitian']) {
                $x;
            } else {
                $x = 2;
            }
        }
        // dd($x);
        if ($x == 1) {
            return view('errors/html/error_404');
            // dd($x);
        } else { //Mencari Laporan dengan id penelitian
            $laporan = $this->laporanPenelitianModel->find_by_idpenelitian($id_penelitian);

            // if (($laporan['kontrak'] == null || $laporan['laporan_dana'] == null)) {
            $data = [
                'title' => 'PPPM Politeknik Statistika STIS',
                'penelitian' => $this->penelitianModel->find($id_penelitian),
                'validation' => \Config\Services::validation(),
                'laporan' => $this->laporanPenelitianModel->find_by_idpenelitian($id_penelitian)
            ];
            return view('dosen/tampilan/penelitianProses/penelitianDetail2', $data);
        }
    }
    public function penelitianProses2Kontrak($id_penelitian)
    {
        $penelitian = $this->timPenelitiModel->get_penelitian_by_nip_user(auth()->user()->nip);
        $x = 1;
        foreach ($penelitian as $key => $pen) {
            # code...
            if ($id_penelitian != $pen['id_penelitian']) {
                $x;
            } else {
                $x = 2;
            }
        }
        // dd($x);
        if ($x == 1) {
            return view('errors/html/error_404');
            // dd($x);
        } else {
            $this->laporanPenelitianModel->find_by_idpenelitian($id_penelitian);
            $data = [
                'title' => 'PPPM Politeknik Statistika STIS',
                'penelitian' => $this->penelitianModel->find($id_penelitian),
                'validation' => \Config\Services::validation(),
                'laporan' => $this->laporanPenelitianModel->find_by_idpenelitian($id_penelitian)
            ];
            // dd($data['laporan']);
            return view('dosen/tampilan/penelitianProses/penelitianDetail2Kontrak', $data);
        }
    }
    public function penelitianProses3($id_penelitian)
    {
        $penelitian = $this->timPenelitiModel->get_penelitian_by_nip_user(auth()->user()->nip);
        $x = 1;
        foreach ($penelitian as $key => $pen) {
            # code...
            if ($id_penelitian != $pen['id_penelitian']) {
                $x;
            } else {
                $x = 2;
            }
        }
        // dd($x);
        if ($x == 1) {
            return view('errors/html/error_404');
            // dd($x);
        } else {
            $data = [
                'title' => 'PPPM Politeknik Statistika STIS',
                'penelitian' => $this->penelitianModel->find($id_penelitian),
                'laporan' => $this->laporanPenelitianModel->find_by_idpenelitian($id_penelitian),
                'validation' => \Config\Services::validation()
            ];
            return view('dosen/tampilan/penelitianProses/penelitianDetail3', $data);
        }
    }
    public function penelitianProses4($id_penelitian)
    {
        $penelitian = $this->timPenelitiModel->get_penelitian_by_nip_user(auth()->user()->nip);
        $x = 1;
        foreach ($penelitian as $key => $pen) {
            # code...
            if ($id_penelitian != $pen['id_penelitian']) {
                $x;
            } else {
                $x = 2;
            }
        }
        // dd($x);
        if ($x == 1) {
            return view('errors/html/error_404');
            // dd($x);
        } else {
            $data = [
                'title' => 'PPPM Politeknik Statistika STIS',
                'penelitian' => $this->penelitianModel->find($id_penelitian)
            ];
            return view('dosen/tampilan/penelitianProses/penelitianDetail4', $data);
        }
    }


    public function editProfil()
    {
        if (!$this->validate([
            'fotoProfil' => [
                'rules' => 'uploaded[fotoProfil]',
                'errors' => [
                    'uploaded' => "{field} file tidak boleh kosong"
                ]
            ]
        ])) {
            $this->dosenModel->save([
                'NIP_dosen' => auth()->user()->nip,
                'nama_dosen' => $this->request->getVar('namaLengkap'),
                'email_dosen' => $this->request->getVar('email'),
                'minat_penelitian' => $this->request->getVar('minat'),
                'no_hp' => $this->request->getVar('hp'),
                'google_scholar' => $this->request->getVar('scholar'),
                'link_sinta' => $this->request->getVar('sinta'),
                'link_orcid' => $this->request->getVar('orcid'),
                'link_wos' => $this->request->getVar('wos'),
                'link_scopus' => $this->request->getVar('scopus'),
            ]);
        } else {
            $fileFoto = $this->request->getFile('fotoProfil');
            $namaFoto = $fileFoto->getName();
            $fileFoto->move('foto_profil', $namaFoto);
            // if ($fileFoto == null) {
            //     $namaFoto = -;
            // } else {
            // }
            $this->dosenModel->save([
                'NIP_dosen' => auth()->user()->nip,
                'nama_dosen' => $this->request->getVar('namaLengkap'),
                'email_dosen' => $this->request->getVar('email'),
                'minat_penelitian' => $this->request->getVar('minat'),
                'foto_dosen' => $namaFoto,
                'no_hp' => $this->request->getVar('hp'),
                'google_scholar' => $this->request->getVar('scholar'),
                'link_sinta' => $this->request->getVar('sinta'),
                'link_orcid' => $this->request->getVar('orcid'),
                'link_wos' => $this->request->getVar('wos'),
                'link_scopus' => $this->request->getVar('scopus'),
            ]);
        }
        session()->setFlashdata('pesan', 'Data berhasil diedit');
        // $response = ['status' => 200, 'error' => null, 'messages' => ['success' => 'Data produk berhasil ditambah.']];

        return redirect()->to('/indexDosen');
    }

    public function reimburse()
    {
        //mengambil data user yang sedang login
        $user = auth()->user();

        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $this->penelitianModel->get_penelitian_done($user->nip, 10),
            'pkm' => $this->pkmModel->get_pkm_done($user->nip, 7)
        ];
        // dd($data);
        return view('dosen/tampilan/reimburse', $data);
    }


    public function detailReimburse($id_kegiatan)
    {
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            'penelitian' => $this->penelitianModel->find($id_kegiatan),
            'dana_keluar' => $this->danaPenelitianModel->get_dana_penelitian_by_idpenelitian($id_kegiatan),
            // 'kegiatan' => $kegiatan,
            'validation' => \Config\Services::validation()
        ];
        // dd($data);
        return view('dosen/tampilan/detailReimburse', $data);
    }

    public function detailReimburse2($id_kegiatan)
    {
        // $kegiatan_pkm = $this->danaPKMModel->get_dana_by_id($id_kegiatan);
        //dd($kegiatan_pkm);
        $data = [
            'title' => 'PPPM Politeknik Statistika STIS',
            // 'kegiatan' => $kegiatan,
            'pkm' => $this->pkmModel->find($id_kegiatan),
            'dana_pkm' => $this->danaPKMModel->get_dana_pkm_by_idpkm($id_kegiatan),
            'validation' => \Config\Services::validation()
        ];
        // dd($data['dana_pkm']);
        return view('dosen/tampilan/detailReimburse2', $data);
    }



    //===========================================upload ttd===================================

    public function uploadTTD()
    {
        // dd($this->ttdDosen->get_ttd_by_nip(auth()->user()->nip));
        $id = $this->ttdDosen->get_ttd_by_nip(auth()->user()->nip);
        // dd($id['id']);
        if (!$this->validate([
            'ttdManual' => [
                'rules' => 'is_image[ttdManual]|mime_in[ttdManual,image/jpg,image/jpeg,image/png]|max_size[ttdManual,10000]',
                'errors' => [
                    'mime_in', 'is_image' => "Format file harus image/jpg,image/jpeg,image/png",
                    'max_size' => "Ukuran File terlalu besar (Max 100kb)"
                ]
            ],
            'ttdDigital' => [
                'rules' => 'is_image[ttdDigital]|mime_in[ttdDigital,image/jpg,image/jpeg,image/png]|max_size[ttdDigital,10000]',
                'errors' => [
                    'mime_in', 'is_image' => "Format file harus image/jpg,image/jpeg,image/png",
                    'max_size' => "Ukuran File terlalu besar (Max 100kb)"
                ]
            ]
        ])) {

            // dd($this->request->getFile('ttdManual')->getName());
            session()->setFlashdata('error', 'File yang anda upload tidak sesuai!!');
            return redirect()->to('/indexDosen')->withInput();
        } else {
            // dd($this->request->getFile('ttdManual')->getName() == null);



            //GetFile
            $fileManual = $this->request->getFile('ttdManual');
            $fileDigital = $this->request->getFile('ttdDigital');
            //GetNama
            $namaManual = $fileManual->getName();
            $namaDigital = $fileDigital->getName();
            //Cek
            // dd($namaManual);
            // if ($namaDigital == null) {
            //     $fileManual->move('ttd_dosen/manual', $namaManual);
            //     $this->ttdDosen->save([
            //         'id'          => $id['id'],
            //         'nip_dosen'   => auth()->user()->nip,
            //         'ttd_manual'  => $namaManual
            //     ]);
            // } elseif ($namaManual == null) {
            //     $fileDigital->move('ttd_dosen/manual', $namaDigital);
            //     $this->ttdDosen->save([
            //         'id'          => $id['id'],
            //         'nip_dosen'   => auth()->user()->nip,
            //         'ttd_digital'  => $namaDigital
            //     ]);
            // } else {
            $fileManual->move('ttd_dosen/manual', $namaManual);
            $fileDigital->move('ttd_dosen/digital', $namaDigital);
            $this->ttdDosen->save([
                'id'          => $id['id'],
                'nip_dosen'   => auth()->user()->nip,
                'ttd_manual'  => $namaManual,
                'ttd_digital'  => $namaDigital
            ]);
            // }
        }
        session()->setFlashdata('pesan', 'Data berhasil di tambahkan');
        // $response = ['status' => 200, 'error' => null, 'messages' => ['success' => 'Data produk berhasil ditambah.']];

        return redirect()->to('/indexDosen');
    }


    //===========================================end-upload-ttd===============================

}
