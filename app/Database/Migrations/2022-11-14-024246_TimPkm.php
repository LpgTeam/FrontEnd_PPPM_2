<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TimPkm extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pkm' => [
                'type' => 'int',
                'constraint' => 11,
                'nullable' => false
            ],

            'nip' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'nullable' => true
            ],

            'nama' => [
                'type' => 'TEXT',
                'nullable' => false
            ],

            'peran' => [
                'type' => 'TEXT',
                'nullable' => true
            ],

            'bidang_keahlian' => [
                'type' => 'TEXT',
                'nullable' => true
            ],

            'pangkat' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'nullable' => false
            ]
        ]);
        $this->forge->createTable('tim_pkm');
    }

    public function down()
    {
        //
    }
}
