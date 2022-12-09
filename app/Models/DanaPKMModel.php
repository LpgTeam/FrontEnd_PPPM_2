<?php

namespace App\Models;

use CodeIgniter\Model;

class DanaPKMModel extends Model
{
    protected $DBGroup          = 'default';
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

    public function get_dana_by_id ($id_kegiatan){
        $kegiatan =  $this->where(['id_pkm'=> $id_kegiatan])->findAll();
        return $kegiatan;
    }

    public function get_dana_pkm_by_idpkm($id_pkm)
    {
        return $this->where(['id_pkm' => $id_pkm])->findAll();
    }

    public function get_dana_by_reimburse($id_reimburse){
        return $this->join('permohonan_reimburse', 'permohonan_reimburse.id_pkm = dana_pkm.id_pkm')
        ->select('permohonan_reimburse.id_reimburse')->select('dana_pkm.*')
        // ->select('laporan_penelitian.*')
        ->where(['id_reimburse' => $id_reimburse])->findAll();
    }
}
