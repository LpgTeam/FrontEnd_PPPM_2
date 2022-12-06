<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TargetPenelitian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_luaran' => [
                'type' => 'INT',
                'constraint' => 15,
                'null' => false,
                'auto_increment' => true
            ],

            'id_penelitian' => [
                'type' => 'INT',
                'constraint' => 15,
                'null' => false
            ],

            'jenis_luaran' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],

            'target_capaian' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],

            'jurnal_tujuan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],

            'index_jurnal_tujuan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ]

        ]);
        $this->forge->addKey('id_luaran', true);
        $this->forge->createTable('target_penelitian');
    }

    public function down()
    {
        //
    }
}
