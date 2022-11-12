<?php

namespace App\Models;

use CodeIgniter\Model;

class PkmModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengajuan_pkm';
    protected $primaryKey       = 'ID_pkm';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ID_pkm',
        'jenis_pkm',
        'topik_kegiatan',
    	'bentuk_kegiatan',
    	'waktu_kegiatan',
        'tempat_kegiatan',
    	'sasaran',
        'target_peserta',
        'hasil',
    	'pembiayaan_diajukan',
        'diajukan_lainnya',
        'tanggal_pengajuan',	
        'status',	
        'id_status'	
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

    public function getData()
    {
        return $this->findAll();
    }

    public function get_id_pkm($judul_pkm)
    {
        return $this->where(['judul_pkm' => $judul_pkm])->first();
    }

    public function get_pkm($id_pkm)
    {
        return $this->where(['ID_pkm' => $id_pkm])->first();
    }
}
