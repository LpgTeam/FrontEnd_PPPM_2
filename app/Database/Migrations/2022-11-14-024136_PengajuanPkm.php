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
                'null' => false,
                'auto_increment' => true
            ],

            'jenis_pkm' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => false
            ],

            'topik_kegiatan' => [
                'type' => 'text',
                'null' => false
            ],

            'bentuk_kegiatan' => [
                'type' => 'text',
                'null' => false
            ],

            'waktu_kegiatan' => [
                'type' => 'date',
                'null' => false
            ],

            'tempat_kegiatan' => [
                'type' => 'text',
                'null' => false
            ],

            'sasaran' => [
                'type' => 'text',
                'null' => false
            ],

            'target_peserta' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],

            'hasil' => [
                'type' => 'text',
                'null' => false
            ],

            'pembiayaan_diajukan' => [
                'type' => 'text',
                'null' => true
            ],

            'diajukan_lainnya' => [
                'type' => 'text',
                'null' => true
            ],

            'tanggal_pengajuan' => [
                'type' => 'date',
                'null' => false
            ],

            'status' => [
                'type' => 'text',
                'null' => false
            ],

            'id_status' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],

            'jumlah_anggota' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
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
