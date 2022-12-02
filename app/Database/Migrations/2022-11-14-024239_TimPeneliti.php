<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TimPeneliti extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_timpeneliti' => [
                'type' => 'int',
                'constraint' => 15,
                'nullable' => false
            ],

            'id_penelitian' => [
                'type' => 'int',
                'constraint' => 15,
                'nullable' => false
            ],

            'NIP' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'nullable' => true
            ],

            'namaPeneliti' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'nullable' => false
            ],

            'programStudi' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'nullable' => false
            ],

            'peran' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'nullable' => true
            ],

            'bidang_keahlian' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'nullable' => true
            ]
        ]);
        $this->forge->addKey('id_timpeneliti', true);
        $this->forge->createTable('tim_peneliti');
    }

    public function down()
    {
        //
    }
}
