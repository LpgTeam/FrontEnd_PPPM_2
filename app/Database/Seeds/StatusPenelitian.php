<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StatusPenelitian extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_detail'     => 1,
                'status'        => 'Diajukan',
                'deskripsi'     => 'Diajukan oleh Dosen',
            ],
            [
                'id_detail'     => 2,
                'status'        => 'Disetujui',
                'deskripsi'     => 'Disetujui oleh BAU',
            ],
            [
                'id_detail'     => 3,
                'status'        => 'Disetujui',
                'deskripsi'     => 'Disetujui oleh Reviewer',
            ],
            [
                'id_detail'     => 4,
                'status'        => 'Disetujui',
                'deskripsi'     => 'Disetujui oleh Kepala PPPM',
            ],
            [
                'id_detail'     => 5,
                'status'        => 'Disetujui',
                'deskripsi'     => 'Disetujui oleh Direktur',
            ],
            [
                'id_detail'     => 6,
                'status'        => 'Kegiatan sedang berlangsung',
                'deskripsi'     => 'Proses',
            ],
            [
                'id_detail'     => 7,
                'status'        => 'Ditolak',
                'deskripsi'     => 'Ditolak oleh BAU',
            ],
            [
                'id_detail'     => 8,
                'status'        => 'Ditolak',
                'deskripsi'     => 'Ditolak oleh Reviewer',
            ],
            [
                'id_detail'     => 9,
                'status'        => 'Ditolak',
                'deskripsi'     => 'Ditolak oleh Kepala PPPM',
            ],
            [
                'id_detail'     => 10,
                'status'        => 'Ditolak',
                'deskripsi'     => 'Kegiatan telah selesai dilaksanakan',
            ]
        ];
        $this->db->table('detailstatus_penelitian')->insertBatch($data);
    }
}