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
                'null' => false,
                'auto_increment' => true
            ],

            'id_penelitian' => [
                'type' => 'int',
                'constraint' => 15,
                'null' => false
            ],

            'NIP' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true
            ],

            'namaPeneliti' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],

            'programStudi' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => false
            ],

            'peran' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true
            ],

            'bidang_keahlian' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true
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
