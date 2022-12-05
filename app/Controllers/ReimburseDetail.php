<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenelitianModel;
use App\Models\PkmModel;
use App\Models\ReimburseModel;
use CodeIgniter\I18n\Time;
use DateTime;

class ReimburseDetail extends BaseController
{

    public function __construct()
    {
        $this->penelitianModel = new PenelitianModel();
        $this->reimburseModel = new ReimburseModel();
        $this->pkmModel = new PkmModel();
    }
    public function index()
    {
        //
    }

    public function savePenelitian($idpenelitian)
    {
        // dd($idpenelitian);
        if (!$this->validate([
            'uploadLoa' => [
                'rules' => 'uploaded[uploadLoa]|ext_in[uploadLoa,pdf]|max_size[uploadLoa,10000]',
                'errors' => [
                    'uploaded' => "{field} file tidak boleh kosong",
                    'ext_in' => "Format file harus pdf",
                    'max_size' => "Ukuran File terlalu besar"
                ]
            ],
            'uploadNaskah' =>  [
                'rules' => 'uploaded[uploadNaskah]|ext_in[uploadNaskah,pdf]|max_size[uploadNaskah,10000]',
                'errors' => [
                    'uploaded' => "{field} file tidak boleh kosong",
                    'ext_in' => "Format file harus pdf",
                    'max_size' => "Ukuran File terlalu besar"
                ]
            ],
            'uploadInvoice' =>  [
                'rules' => 'uploaded[uploadInvoice]|ext_in[uploadInvoice,pdf]|max_size[uploadInvoice,10000]',
                'errors' => [
                    'uploaded' => "{field} file tidak boleh kosong",
                    'ext_in' => "Format file harus pdf",
                    'max_size' => "Ukuran File terlalu besar"
                ]
            ],
            'uploadForm' =>  [
                'rules' => 'uploaded[uploadInvoice]|ext_in[uploadFormPublikasi,pdf]|max_size[uploadInvoice,10000]',
                'errors' => [
                    'uploaded' => "{field} file tidak boleh kosong",
                    'ext_in' => "Format file harus pdf",
                    'max_size' => "Ukuran File terlalu besar"
                ]
            ],
        ])) {
            session()->setFlashdata('error', 'Terjadi Kesalahan!');
            return redirect()->to('/detailReimburseDosen/penelitian/' . $idpenelitian)->withInput();
        }

        $fileLoa = $this->request->getFile('uploadLoa');
        $namaLoa = $fileLoa->getName();
        $fileLoa->move('loa', $namaLoa);

        $fileNaskah = $this->request->getFile('uploadNaskah');
        $namaNaskah = $fileNaskah->getName();
        $fileNaskah->move('naskah_artikel', $namaNaskah);

        $fileInvoice = $this->request->getFile('uploadInvoice');
        $namaInvoice = $fileInvoice->getName();
        $fileInvoice->move('invoice', $namaInvoice);

        $fileForm = $this->request->getFile('uploadForm');
        $namaForm = $fileForm->getName();
        $fileForm->move('form_publikasi', $namaForm);

        $Pen = $this->penelitianModel->get_penelitian($idpenelitian);
        $Loa = $this->reimburseModel->find_by_idpenelitian($idpenelitian);
        $naskah = $this->reimburseModel->find_by_idpenelitian($idpenelitian);
        $invoice = $this->reimburseModel->find_by_idpenelitian($idpenelitian);
        $formpublikasi = $this->reimburseModel->find_by_idpenelitian($idpenelitian);
        // $total_biaya = $this->request->getVar($dana_keluar);

        $this->reimburseModel->save([
            'id_penelitian'     => $Pen['id_penelitian'],
            'jenis_penelitian'  => $Pen['jenis_penelitian'],
            'judul_penelitian'  => $Pen['judul_penelitian'],
            'tanggal_pengajuan' => Time::now('Asia/jakarta'),
            'loa'               => $namaLoa,
            'naskah_artikel'    => $namaNaskah,
            'bukti_pembayaran'  => $namaInvoice,
            'usulan_publikasi'  => $namaForm,
            'total_biaya'       => $this->request->getVar('totalBiaya'),
            'id_status'         => "1",
            'status_reimburse'  => "Reimbursement diajukan"
        ]);

        $this->penelitianModel->save([
            'id_penelitian'     => $Pen['id_penelitian'],
            'id_status_reimburse' => 1
        ]);


        session()->setFlashdata('pesan', 'Reimbursement berhasil diajukan.');
        // $response = ['status' => 200, 'error' => null, 'messages' => ['success' => 'Data produk berhasil ditambah.']];

        return redirect()->to('/reimburseDosen');
    }

    public function savePKM($id_pkm)
    {
        $pkm = $this->pkmModel->get_pkm($id_pkm);
        $total_biaya = $this->request->getVar('totalBiaya');

        $this->reimburseModel->save([
            'id_pkm'     => $pkm['ID_pkm'],
            'jenis_pkm'  => $pkm['jenis_pkm'],
            'judul_pkm'  => $pkm['topik_kegiatan'],
            'tanggal_pengajuan' => Time::now('Asia/jakarta'),
            'total_biaya'       => $this->request->getVar('totalBiaya'),
            'id_status'         => "1",
            'status_reimburse'  => "Reimbursement diajukan",
            // 'biaya_diajukan'    => $total_biaya
        ]);

        $this->pkmModel->save([
            'ID_pkm'     => $pkm['ID_pkm'],
            'id_status_reimburse' => 1
        ]);

        session()->setFlashdata('pesan', 'Reimbursement berhasil diajukan.');
        // $response = ['status' => 200, 'error' => null, 'messages' => ['success' => 'Data produk berhasil ditambah.']];

        return redirect()->to('/reimburseDosen');
    }

    //======================== Reimburse Download

    public function download_loa($id_reimburse)
    {

        $reimburse = $this->reimburseModel->get_reimburse($id_reimburse);
        // dd($reimburse);
        return $this->response->download('loa/' . $reimburse[0]['loa'], null);
        // return view('proposal/ViewLaporanProposal', $data);
    }

    public function download_naskah_artikel($id_reimburse)
    {
        $reimburse = $this->reimburseModel->get_reimburse($id_reimburse);
        return $this->response->download('naskah_artikel/' . $reimburse[0]['naskah_artikel'], null);
        // return view('proposal/ViewLaporanProposal', $data);
    }

    public function download_invoice($id_reimburse)
    {
        $reimburse = $this->reimburseModel->get_reimburse($id_reimburse);
        return $this->response->download('invoice/' . $reimburse[0]['bukti_pembayaran'], null);
        // return view('proposal/ViewLaporanProposal', $data);
    }

    public function download_form_publikasi($id_reimburse)
    {
        $reimburse = $this->reimburseModel->get_reimburse($id_reimburse);
        return $this->response->download('form_publikasi/' . $reimburse[0]['usulan_publikasi'], null);
        // return view('proposal/ViewLaporanProposal', $data);
    }

    public function printFormPublikasi()
    {
        return $this->response->download('form_publikasi/[Penelitian] Template - Form Usulan Publikasi.docx', null)->setFileName("[Penelitian] Template - Form Usulan Publikasi.docx"); //download file
    }
}