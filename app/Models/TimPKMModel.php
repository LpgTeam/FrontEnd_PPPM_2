<?php

namespace App\Models;

use CodeIgniter\Model;

class TimPKMModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tim_pkm';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_pkm',
        'nip',
        'nama',
        'peran',
        'pangkat'
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

    public function get_pkm_by_nip_user($nip)
    {
        //     return $this->join('users', 'users.id = auth_groups_users.user_id')->select('users.username')->select('auth_groups_users.*')
        //     ->where(['auth_groups_users.id' => $id])->first();
        return $this->join('pengajuan_pkm', 'pengajuan_pkm.ID_pkm = tim_pkm.id_pkm')->select('tim_pkm.nip')->select('pengajuan_pkm.*')
            ->where(['nip' => $nip])->findAll();
    }

    public function get_data_timpkm($idpkm)
    {
        return $this->join('dosen', 'dosen.NIP_dosen = tim_pkm.nip')->select('tim_pkm.*')->select('dosen.jabatan_dosen')
            ->where(['id_pkm' => $idpkm])->findAll();
        // $builder = $this->db->table('tim_pkm');
        // $builder->join('dosen', 'dosen.NIP_dosen = tim_pkm.nip');
        // $query = $builder->getWhere(['ID_pkm' => $idpkm]);
        // return $query->getResultArray();
    }

    public function get_data_timpkm_byId_Pkm($idpkm)
    {
        return $this->where(['id_pkm' => $idpkm])->findAll();
        // $builder = $this->db->table('tim_pkm');
        // $builder->join('dosen', 'dosen.NIP_dosen = tim_pkm.nip');
        // $query = $builder->getWhere(['ID_pkm' => $idpkm]);
        // return $query->getResultArray();
    }

    public function get_timpkm_byid($id_pkm)
    {
        $builder = $this->db->table('tim_pkm')->join('dosen', 'dosen.NIP_dosen = tim_pkm.nip', 'left');
        $query = $builder->getWhere(['ID_pkm' => $id_pkm]);

        return $query->getResultArray();
    }
    public function get_anggota_timpkm($id_pkm)
    {
        $builder = $this->db->table('tim_pkm');
        $query = $builder->getWhere(['ID_pkm' => $id_pkm, 'peran !=' => "Ketua PKM"]);
        return $query->getResultArray();
    }
}
