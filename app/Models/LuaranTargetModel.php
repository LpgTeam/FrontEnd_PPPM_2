<?php

namespace App\Models;

use CodeIgniter\Model;

class LuaranTargetModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'target_penelitian';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_penelitian', 'jenis_luaran', 'target_capaian', 'jurnal_tujuan'];

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

    public function get_luaran_byid($id_penelitian)
    {
        $builder = $this->db->table('target_penelitian');
        $query = $builder->getWhere(['id_penelitian' => $id_penelitian]);
        return $query->getResultArray();
    }
}
