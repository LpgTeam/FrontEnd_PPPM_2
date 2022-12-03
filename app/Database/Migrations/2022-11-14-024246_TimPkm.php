<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TimPkm extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_timpkm' => [
                'type' => 'int',
                'constraint' => 11,
                'null' => false,
                'auto_increment' => true
            ],

            'id_pkm' => [
                'type' => 'int',
                'constraint' => 11,
                'null' => false
            ],

            'nip' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => true
            ],

            'nama' => [
                'type' => 'TEXT',
                'null' => false
            ],

            'peran' => [
                'type' => 'TEXT',
                'null' => true
            ],

            'bidang_keahlian' => [
                'type' => 'TEXT',
                'null' => true
            ],

            'pangkat' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => false
            ]
        ]);
        $this->forge->addKey('id_timpkm', true);
        $this->forge->createTable('tim_pkm');
    }

    public function down()
    {
        //
    }
}
