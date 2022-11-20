<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthGroupsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'auth_groups_users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'created_at',
        'user_id',
        'group'
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

    public function get_groupUser_by_id($id)
    {
        // dd($id);
        // return $this->where(['id' => $id])->first();
        return $this->join('users', 'users.id = auth_groups_users.user_id')->select('users.username')->select('auth_groups_users.*')
            ->where(['auth_groups_users.id' => $id])->first();
    }

    public function get_all_role_by_user_id($user_id)
    {
        return $this->where(['user_id' => $user_id])->findAll();
    }
}
