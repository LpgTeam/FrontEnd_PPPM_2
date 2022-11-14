<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PengajuanPkm extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ID_pkm' => [
                'type' => 'INT',
                'constraint' => 11,
                'nullable' => false,
                'auto_increment' => true
            ],

            'jenis_pkm' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'nullable' => false
            ],

            'topik_kegiatan' => [
                'type' => 'text',
                'nullable' => false
            ],

            'bentuk_kegiatan' => [
                'type' => 'text',
                'nullable' => false
            ],

            'waktu_kegiatan' => [
                'type' => 'date',
                'nullable' => false
            ],

            'tempat_kegiatan' => [
                'type' => 'text',
                'nullable' => false
            ],

            'sasaran' => [
                'type' => 'text',
                'nullable' => false
            ],

            'target_peserta' => [
                'type' => 'INT',
                'constraint' => 11,
                'nullable' => false
            ],

            'hasil' => [
                'type' => 'text',
                'nullable' => false
            ],

            'pembiayaan_diajukan' => [
                'type' => 'text',
                'nullable' => true
            ],

            'diajukan_lainnya' => [
                'type' => 'text',
                'nullable' => true
            ],

            'tanggal_pengajuan' => [
                'type' => 'date',
                'nullable' => false
            ],
            
            'status' => [
                'type' => 'text',
                'nullable' => false
            ],

            'id_status' => [
                'type' => 'INT',
                'constraint' => 11,
                'nullable' => false
            ]
        ]);
        $this->forge->addKey('ID_pkm', true);
        $this->forge->createTable('pengajuan_pkm');
    }

    public function down()
    {
        //
    }
}
