<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TruncateUser extends Seeder
{
    public function run()
    {
        $db      = \Config\Database::connect();
        $builder = $this->db->table('users');
        $builder->truncate();
        $builder = $this->db->table('auth_groups_users');
        $builder->truncate();
        $builder = $this->db->table('auth_identities');
        $builder->truncate();
    }
}
