<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LaporanPenelitian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_laporan' => [
                'type' => 'INT',
                'constraint' => 15,
                'auto_increment' => true
            ],

            'id_penelitian' => [
                'type' => 'INT',
                'constraint' => 15
            ],

            'kontrak' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],

            'laporan_luaran' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],

            'laporan_dana' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],

            'hasil' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],

            'form_usulan_publikasi' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],

            'status_penelitian' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true
            ]
        ]);
        $this->forge->addKey('id_laporan', true);
        $this->forge->createTable('laporan_penelitian');
    }

    public function down()
    {
        //
    }
}
