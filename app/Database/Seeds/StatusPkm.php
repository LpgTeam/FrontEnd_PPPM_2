<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StatusPkm extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_detail'     => '1',
                'status'        => 'Diajukan',
                'deskripsi'     => 'Diajukan oleh Dosen',
            ],
            [
                'id_detail'     => '2',
                'status'        => 'Diajukan',
                'deskripsi'     => 'Menunggu Persetujuan Kepala PPPM',
            ],
            [
                'id_detail'     => '3',
                'status'        => 'Diajukan',
                'deskripsi'     => 'Disetujui Oleh Kepala PPPM',
            ],
            [
                'id_detail'     => '4',
                'status'        => 'Proses',
                'deskripsi'     => 'Kegiatan sedang berlangsung',
            ],
            [
                'id_detail'     => '5',
                'status'        => 'Ditolak',
                'deskripsi'     => 'Ditolak oleh BAU',
            ],
            [
                'id_detail'     => '6',
                'status'        => 'Ditolak',
                'deskripsi'     => 'Ditolak oleh Kepala PPPM',
            ],
            [
                'id_detail'     => '1',
                'status'        => 'Diajukan',
                'deskripsi'     => 'Diajukan oleh Dosen',
            ],
        ];
        $this->db->table('detailstatus_pkm')->insertBatch($data);
    }
}
