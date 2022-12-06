<?php

namespace App\Models;

use CodeIgniter\Model;

class DanaPKMModel extends Model
{
    protected $table = 'dana_pkm';
    protected $primaryKey = 'id_dana';
    protected $allowedFields = ['id_pkm', 'tanggal_pencairan', 'tanggal', 'dana_keluar', 'dana_tidak_terserap'];

    public function get_dana_byid($id_pkm)
    {
        $builder = $this->db->table('dana_pkm');
        $query = $builder->getWhere(['id_pkm' => $id_pkm]);
        return $query->getResultArray();
    }
}
