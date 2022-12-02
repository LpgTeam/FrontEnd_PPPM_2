<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Ruang extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_ruang' => 'G111',
                'nama_ruang' => 'Gedung 1 Lt. 1'
            ],
            [
                'id_ruang' => 'G121',
                'nama_ruang' => 'Gedung 1 Lt. 2 PPPM'
            ],
            [
                'id_ruang' => 'G122',
                'nama_ruang' => 'Gedung 1 Lt. 2 Unit Kajian'
            ],
            [
                'id_ruang' => 'G131',
                'nama_ruang' => 'Gedung 1 Lt. 3 Prodi'
            ],
            [
                'id_ruang' => 'G132',
                'nama_ruang' => 'Gedung 1 Lt. 3 SPM'
            ],
            [
                'id_ruang' => 'G141',
                'nama_ruang' => 'Gedung 1 Lt. 4'
            ],
            [
                'id_ruang' => 'G211',
                'nama_ruang' => 'Gedung 2 Lt .1'
            ],
            [
                'id_ruang' => 'G221',
                'nama_ruang' => 'Gedung 2 Lt .2'
            ],
            [
                'id_ruang' => 'G231',
                'nama_ruang' => 'Gedung 2 Lt. 3'
            ],
            [
                'id_ruang' => 'G232',
                'nama_ruang' => 'Gedung 2 Lt. 3 Perpustakaan'
            ],
            [
                'id_ruang' => 'G241',
                'nama_ruang' => 'Gedung 2 Lt. 4 Unit TI'
            ],
            [
                'id_ruang' => 'G311',
                'nama_ruang' => 'Gedung 3 Lt. 1 BAAK'
            ],
            [
                'id_ruang' => 'G312',
                'nama_ruang' => 'Gedung 3 Lt.1 BU'
            ],
        ];
        $this->db->table('ruang')->insertBatch($data);
    }
}