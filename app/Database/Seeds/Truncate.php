<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Truncate extends Seeder
{
    public function run()
    {
        $db      = \Config\Database::connect();
        $builder = $this->db->table('penelitian');
        $builder->truncate();
        $builder = $this->db->table('tim_peneliti');
        $builder->truncate();
        $builder = $this->db->table('target_penelitian');
        $builder->truncate();
        $builder = $this->db->table('laporan_penelitian');
        $builder->truncate();
        $builder = $this->db->table('status_penelitian');
        $builder->truncate();
        $builder = $this->db->table('dana_penelitian');
        $builder->truncate();
        $builder = $this->db->table('pembiayaan_pkm');
        $builder->truncate();
        $builder = $this->db->table('pengajuan_pkm');
        $builder->truncate();
        $builder = $this->db->table('pkm');
        $builder->truncate();
        $builder = $this->db->table('tim_pkm');
        $builder->truncate();
        $builder = $this->db->table('status_pkm');
        $builder->truncate();
    }
}
