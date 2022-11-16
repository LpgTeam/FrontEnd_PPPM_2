<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LuaranTargetPenelitian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_luaran' => [
                'type' => 'INT',
                'constraint' => 15,
                'nullable' => false,
                'auto_increment' => true
            ],
            'id_penelitian' => [
                'type' => 'INT',
                'constraint' => 15,
                'nullable' => false,
            ],
            'jenis_luaran' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'nullable' => false,
            ],
            'target_capaian' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'nullable' => false,
            ],
            'jurnal' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'nullable' => false,
            ],

        ]);
        $this->forge->addKey('id_luaran', true);
        $this->forge->createTable('luaran_target_penelitian');
    }

    public function down()
    {
        //
    }
}
