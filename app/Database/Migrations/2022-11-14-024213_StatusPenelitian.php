<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatusPenelitian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_status' => [
                'type' => 'INT',
                'constraint' => 15,
                'nullable' => false
            ],

            'id_penelitian' => [
                'type' => 'int',
                'constraint' => 15,
                'nullable' => false
            ],

            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'nullable' => false
            ]
        ]);
        $this->forge->addKey('id_status', true);
        $this->forge->createTable('status_penelitian');
    }

    public function down()
    {
        //
    }
}
