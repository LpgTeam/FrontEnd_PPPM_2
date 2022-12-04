<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederBAU extends Seeder
{
    public function run()
    {
        //kalau sudah diseed pertama kali komen sisakan hanya seed penelitian
        $this->call('Dosen');
        $this->call('UserSeed');
        $this->call('StatusPenelitian');
        $this->call('StatusPkm');

        $this->call('PenelitianBAU');
        $this->call('PkmBAU');
    }
}
