<?php

namespace App\Models;

use CodeIgniter\Model;

class PenelitianModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'penelitian';
    protected $primaryKey       = 'id_penelitian';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_penelitian',
        'jenis_penelitian',
        'judul_penelitian',
        'bidang',
        'tanggal_pengajuan',
        'jumlah_anggota',
        'id_status',
        'status_pengajuan',
        'tanda_tangan',
        'file_proposal',
        'biaya',
        'id_status_reimburse',
        'alasan'
    ];
    public function getData()
    {
        return $this->orderBy('tanggal_pengajuan','DESC')->findAll();
        // return $this->findAll();
    }

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function get_id_penelitian($judul_penelitian)
    {
        return $this->where(['judul_penelitian' => $judul_penelitian])->first();
    }

    public function get_penelitian($id_penelitian)
    {
        return $this->where(['id_penelitian' => $id_penelitian])->first();
    }                                       

    public function get_penelitian_by_id_status($id_status)
    {
        return $this->where(['id_status' => $id_status])->findAll();
    }

    public function get_penelitian_done($nip, $id_status){
        return $this->join('tim_peneliti', 'tim_peneliti.id_penelitian = penelitian.id_penelitian')
        ->select('tim_peneliti.nip')->select('penelitian.*')
        // ->select('laporan_penelitian.*')
        ->where(['nip' => $nip])-> where (['id_status' => $id_status])->findAll();
        // return $this->where(['id_status' => $id_status])->findAll();
    }
  
    // public function get_penelitian_by_nip_user($nip)
    // {
    //     //     return $this->join('users', 'users.id = auth_groups_users.user_id')->select('users.username')->select('auth_groups_users.*')
    //     //     ->where(['auth_groups_users.id' => $id])->first();
    //     return $this->join('tim_peneliti', 'tim_peneliti.id_penelitan = penelitian.id_penelitian')->select('tim_peneliti.nip')->select('penelitian.*')
    //         ->where(['nip' => $nip]);
    // }
    public function get_penelitian_dan_laporan()
    {
        //     return $this->join('users', 'users.id = auth_groups_users.user_id')->select('users.username')->select('auth_groups_users.*')
        //     ->where(['auth_groups_users.id' => $id])->first();
        return $this->join('penelitian', 'penelitian.id_penelitian = laporan_penelitian.id_penelitian')->select('laporan_penelitian.*')->select('penelitian.*')->findAll();
    }


    public function get_penelitian_reimburse_diajukan($status_reimburse){
        return $this->where(['id_status_reimburse' => $status_reimburse])->findAll();
    }

    public function get_penelitian_by_year($tahun)
    {
        // $this->db->where('EXTRACT(YEAR_MONTH FROM P.payscale_date)',date('Ym'));
        return $this->where('year(tanggal_pengajuan)',$tahun)->findAll();
    }  

    //total dana keluar setelah laporan
    public function get_dana_keluar($tahun){
        $keluar =  $this->join('dana_penelitian', 'dana_penelitian.id_penelitian = penelitian.id_penelitian')
        ->select('dana_penelitian.dana_keluar')->select('penelitian.*')
        ->where('year(tanggal_pengajuan)', $tahun)->where(!['id_status_reimburse' => 2])->findAll();
        $total_keluar = 0;
        if (!$keluar == null){
            foreach($keluar as $data_keluar){
                $total_keluar = $total_keluar + $data_keluar['dana_keluar'];
            }
       } 
       return $total_keluar;
    }

    //total dana diajukan
    public function get_total_diajukan($tahun){
        $where2 = "id_status='2' OR id_status='3' OR id_status='4' OR id_status='5' OR id_status='6'";
        $pengajuan = $this->where('year(tanggal_pengajuan)',$tahun)->where($where2)->where(['id_status_reimburse' => 0])->findAll();
        
        $total_pengajuan = 0;
        if ($pengajuan != null){
            foreach($pengajuan as $data_pengajuan){
                $total_pengajuan = $total_pengajuan + $data_pengajuan['biaya'];
            }
       } 
      
       $total_pengajuan = $total_pengajuan + $this->get_dana_keluar($tahun);
       return $total_pengajuan;
      
    }


}