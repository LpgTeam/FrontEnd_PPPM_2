<?php

namespace App\Models;

use CodeIgniter\Model;

class DanaPenelitianModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'dana_penelitian';
    protected $primaryKey       = 'id_dana';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_dana',
        'id_penelitian',
        'tanggal_pencairan',
        'dana_keluar',
        'dana_tidak_terserap'
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


    public function get_dana_by_year($tahun){
        return $this->where('year(tanggal_pengajuan)', $tahun)->findAll();
    }

    public function get_dana_by_id ($id_penelitian){
        
    }

}