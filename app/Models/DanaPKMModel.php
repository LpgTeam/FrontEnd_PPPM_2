<?php

namespace App\Models;

use CodeIgniter\Model;

class DanaPKMModel extends Model
{
    protected $table            = 'dana_pkm';
    protected $primaryKey       = 'id_dana';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_dana',
        'id_pkm',
        'tanggal',
        'dana_keluar',
        'dana_tidak_terserap'
    ];
    protected $DBGroup          = 'default';

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

    public function get_dana_pkm_by_idpkm($id_pkm)
    {
        return $this->where(['id_pkm' => $id_pkm])->findAll();
    }
    
    public function get_dana_byid($id_pkm)
    {
        $builder = $this->db->table('dana_pkm');
        $query = $builder->getWhere(['id_pkm' => $id_pkm]);
        return $query->getResultArray();
    }
}
