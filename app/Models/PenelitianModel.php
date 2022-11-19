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
}
