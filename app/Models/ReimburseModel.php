<?php

namespace App\Models;

use CodeIgniter\Model;

class ReimburseModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'permohonan_reimburse';
    protected $primaryKey       = 'id_reimburse';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_reimburse',
        'id_penelitian',
        'id_pkm',
        'jenis_penelitian',
        'jenis_pkm',
        'judul_penelitian',
        'judul_pkm',
        'tanggal_pengajuan',
        'loa',
        'naskah_artikel',
        'bukti_pembayaran',
        'usulan_publikasi',
        'biaya_dicairkan',
        'id_status',
        'status_reimburse'
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

    public function get_reimburse($id_reimburse)
    {
        return $this->where(['id_reimburse' => $id_reimburse])->findAll();
    }

    public function get_id_penelitian_done($id_reimburse){
        return $this->select(['id_reimburse','id_penelitian'])->where('id_reimburse', $id_reimburse)->first();
    }

    public function get_id_pkm_done($id_reimburse){
        return $this->select(['id_reimburse','id_pkm'])->where('id_reimburse', $id_reimburse)->first();
    }

    public function get_id_penelitian($id_penelitian)
    {
        return $this->join('penelitian', 'penelitian.id_penelitian = permohonan_reimburse.id_penelitian')
        ->select('permohonan_reimburse.id_penelitian')->select('penelitian.*')
            ->where(['id_penelitian' => $id_penelitian])->findAll();
    }

    public function get_id_pkm($id_pkm)
    {
        return $this->join('pengajuan_pkm', 'pengajuan_pkm.ID_pkm = permohonan_reimburse.id_pkm')
        ->select('permohonan_reimburse.id_pkm')->select('pengajuan_pkm.*')
            ->where(['id_pkm' => $id_pkm])->findAll();
    }

    public function find_by_idpenelitian($id_penelitian){
        return $this->where(['id_penelitian' => $id_penelitian])->first();
    }

    public function get_reimburse_by_id_status($id_status)
    {
        return $this->where(['id_status' => $id_status])->findAll();
    }
}