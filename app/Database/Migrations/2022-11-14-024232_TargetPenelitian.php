<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TargetPenelitian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penelitian' => [
                'type' => 'INT',
                'constraint' => 15,
                'nullable' => false
            ],

            'jenis_luaran' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'nullable' => false
            ],

            'target-capaian' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'nullable' => false
            ],

            'jurnal_tujuan' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'nullable' => false
            ]
        ]);
        $this->forge->addKey('id_status', true);
        $this->forge->createTable('target_penelitian');
    }

    public function down()
    {
        //
    }
}
