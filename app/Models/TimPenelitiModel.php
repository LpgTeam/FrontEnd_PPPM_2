<?php

namespace App\Models;

use CodeIgniter\Model;

class TimPenelitiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tim_peneliti';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_penelitian',
        'NIP',
        'peran',
        'bidang_keahlian',
        'namaPeneliti',
        'programStudi',
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

    public function get_timpeneliti_byid($id_penelitian)
    {
        $builder = $this->db->table('tim_peneliti');
        $query = $builder->getWhere(['id_penelitian' => $id_penelitian]);
        return $query->getResultArray();
    }

    public function get_penelitian_by_nip_user($nip)
    {
        //     return $this->join('users', 'users.id = auth_groups_users.user_id')->select('users.username')->select('auth_groups_users.*')
        //     ->where(['auth_groups_users.id' => $id])->first();
        return $this->join('penelitian', 'penelitian.id_penelitian = tim_peneliti.id_penelitian')->select('tim_peneliti.nip')->select('penelitian.*')
            ->where(['nip' => $nip])->findAll();
    }
}
