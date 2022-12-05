<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penelitian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penelitian' => [
                'type' => 'INT',
                'constraint' => 15,
                'null' => false,
                'auto_increment' => true
            ],

            'jenis_penelitian' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ],

            'judul_penelitian' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],

            'bidang' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ],

            'tanggal_pengajuan' => [
                'type' => 'DATE',
                'null' => false
            ],

            'jumlah_anggota' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],

            'id_status' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],

            'status_pengajuan' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true
            ],

            'file_proposal' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],

            'tanda_tangan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],

            'biaya' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true
            ],

            'alasan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],

            'id_status_reimburse' => [
                'type' => 'INT',
                'constraint' => 15,
                'null' => true
            ]
        ]);
        $this->forge->addKey('id_penelitian', true);
        $this->forge->createTable('penelitian');
    }

    public function down()
    {
        //
    }
}
