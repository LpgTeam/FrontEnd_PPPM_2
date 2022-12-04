<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggaranTotalModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'anggaran_total';
    protected $primaryKey       = 'id_total';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields      = [
        'id_total',
        'tahun',
        'dana_keluar',
        'sisa_anggaran', 
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


    public function get_sisa_terakhir(){
        return $this->orderBy('id_total', 'DESC')->first();
    }
}