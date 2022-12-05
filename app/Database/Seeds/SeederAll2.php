<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederAll2 extends Seeder
{
    public function run()
    {
        $this->call('PenelitianOkta');
        $this->call('PkmOkta');
        $this->call('PenelitianAfnan');
        $this->call('PkmAfnan');
        $this->call('PenelitianTaufiq');
        $this->call('PkmTaufiq');
        $this->call('PenelitianIntan');
        $this->call('PkmIntan');
        $this->call('PenelitianFatya');
        $this->call('PkmFatya');
        $this->call('PenelitianAtikah');
        $this->call('PkmAtikah');
    }
}
