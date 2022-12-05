<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederAll extends Seeder
{
    public function run()
    {
        $this->call('Dosen');
        $this->call('UserSeed');
        $this->call('StatusPenelitian');
        $this->call('StatusPkm');
    }
}
