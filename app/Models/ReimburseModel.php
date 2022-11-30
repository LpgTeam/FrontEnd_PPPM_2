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
        'laporan',
        'loa',
        'naskah_artikel',
        'bukti_pembayaran',
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
        return $this->where(['id_reimburse' => $id_reimburse])->first();
    }

    public function get_id_penelitian($id_penelitian)
    {
        return $this->join('penelitian', 'penelitian.id_penelitian = permohonan_reimburse.id_penelitian')
        // ->select('permohonan_reimburse.id_penelitian')->select('penelitian.*')
            ->where(['id_penelitian' => $id_penelitian])->findAll();
    }

    public function get_id_pkm($id_pkm)
    {
        return $this->join('pengajuan_pkm', 'pengajuan_pkm.ID_pkm = permohonan_reimburse.id_pkm')
        // ->select('permohonan_reimburse.id_pkm')->select('pengajuan_pkm.*')
            ->where(['id_pkm' => $id_pkm])->findAll();
    }

    public function get_jenis_penelitian($jenis_penelitian)
    {
        return $this->join('penelitian', 'penelitian.jenis_penelitian = permohonan_reimburse.jenis_penelitian')
        // ->select('permohonan_reimburse.jenis_penelitian')->select('penelitian.*')
            ->where(['jenis_penelitian' => $jenis_penelitian])->findAll();
    }

    public function get_jenis_pkm($jenis_pkm)
    {
        return $this->join('pengajuan_pkm', 'pengajuan_pkm.jenis_pkm = permohonan_reimburse.jenis_pkm')
        // ->select('permohonan_reimburse.jenis_pkm')->select('pengajuan_pkm.*')
            ->where(['jenis_pkm' => $jenis_pkm])->findAll();
    }

    public function get_judul_penelitian($judul_penelitian)
    {
        return $this->join('penelitian', 'penelitian.judul_penelitian = permohonan_reimburse.judul_penelitian')
        // ->select('permohonan_reimburse.judul_penelitian')->select('penelitian.*')
            ->where(['judul_penelitian' => $judul_penelitian])->findAll();
    }

    public function get_judul_pkm($judul_pkm)
    {
        return $this->join('pengajuan_pkm', 'pengajuan_pkm.topik_kegiatan = permohonan_reimburse.judul_pkm')
        // ->select('permohonan_reimburse.judul_pkm')->select('pengajuan_pkm.*')
            ->where(['topik_kegiatan' => $judul_pkm])->findAll();
    }
}