<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;


class TimPeneliti extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            $data = [
                'NIP' => $faker->randomElement($array = array('Mandiri', 'Semi Mandiri', 'Di Danai Institusi', 'Institusi', 'Kerjasama')),
                'namaPeneliti' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'programStudi'        => $faker->randomElement($array = array("Small Area Estimation", "SDG's", "Metodologi Survei dan Sensus", "Sistem Indormasi Statistik", "Lainnya")),
                'peran' => Time::createFromTimestamp($faker->unixTime()),
                'bidang_keahlian' => $faker->randomElement($array = array(1, 2, 3)),
            ];
            $this->db->table('penelitian')->insert($data);
        }
    }
}
