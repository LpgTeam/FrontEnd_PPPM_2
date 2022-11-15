<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatusPkm extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_status' => [
                'type' => 'INT',
                'constraint' => 11,
                'nullable' => false
            ],

            'id_pkm' => [
                'type' => 'int',
                'constraint' => 15,
                'nullable' => false
            ],

            'status' => [
                'type' => 'text',
                'constraint' => 50,
                'nullable' => false
            ]
        ]);
        $this->forge->addKey('id_status', true);
        $this->forge->createTable('status_pkm');
    }

    public function down()
    {
        //
    }
}
