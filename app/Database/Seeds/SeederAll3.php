<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederAll3 extends Seeder
{
    public function run()
    {
        $this->call('PenelitianDosen');
        $this->call('PkmDosen');
        $this->call('PenelitianDirektur');
        $this->call('PkmDirektur');
        $this->call('PenelitianKepalaPPPM');
        $this->call('PkmKepalaPPPM');
        $this->call('PenelitianBAU');
        $this->call('PkmBAU');
        $this->call('PenelitianReviewer');
        $this->call('PkmReviewer');
    }
}
