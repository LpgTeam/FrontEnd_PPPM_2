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
        'file_proposal',
        'biaya'
    ];
    public function getData()
    {
        return $this->findAll();
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
}
