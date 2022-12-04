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
        'id_status',
        'id_status_reimburse',
        'alasan'
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
        return $this->where(['topik_kegiatan' => $judul_pkm])->first();
    }

    public function get_pkm($id_pkm)
    {
        return $this->where(['ID_pkm' => $id_pkm])->first();
    }

    public function get_pkm_by_status2($id_status, $id_status2)
    {
        $builder = $this->db->table('pengajuan_pkm');
        $query = $builder->getWhere(['id_status >=' => $id_status, 'id_status <=' => $id_status2]);
        return $query->getResultArray();
        // return $this->where(['id_status >' => $id_status])->where(['id_status <' => $id_status2])->findAll();
    }

    public function get_pkm_by_status($id_status)
    {
        return $this->where(['id_status >' => $id_status])->findAll();
    }

    public function get_pkm_by_status_bau($id_status)
    {
        $builder = $this->db->table('pengajuan_pkm');
        $query = $builder->getWhere(['id_status' => $id_status, 'jenis_pkm !=' => "Mandiri"]);
        return $query->getResultArray();
    }

    public function get_pkm_done($nip, $id_status)
    {
        return $this->join('tim_pkm', 'pengajuan_pkm.ID_pkm = tim_pkm.id_pkm')
            ->select('tim_pkm.nip')->select('pengajuan_pkm.*')
            // ->select('laporan_penelitian.*')
            ->where(['nip' => $nip])->where(['id_status' => $id_status])->findAll();
    }

    public function get_pkm_reimburse_diajukan($status_reimburse)
    {
        return $this->where(['id_status_reimburse' => $status_reimburse])->findAll();
    }

    public function get_total_diajukan($tahun){
        $where2 = "id_status='3' OR id_status='4' OR id_status='7' AND id_status_reimburse='0'";
        $pengajuan = $this->where('year(tanggal_pengajuan)',$tahun)->where($where2)->findAll();
       
        $total_pengajuan = 0;
        foreach($pengajuan as $data_pengajuan){
            $total_pengajuan = $total_pengajuan + $data_pengajuan['pembiayaan_diajukan'];
        }
        return $total_pengajuan;
    }
}