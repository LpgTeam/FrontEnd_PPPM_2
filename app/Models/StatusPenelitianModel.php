<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusPenelitianModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'status_penelitian';
    protected $primaryKey       = 'id_status';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_status',    'id_penelitian',    'status'
    ];

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

    public function get_status_by_id_penelitian($id_penelitian)
    {
        return $this->where(['id_penelitian' => $id_penelitian])->findAll();
    }
    public function get_status_by_id_penelitian_last($id_penelitian)
    {
        return $this->where(['id_penelitian' => $id_penelitian])->orderBy('id_status', 'DESC')->first();
    }
}
