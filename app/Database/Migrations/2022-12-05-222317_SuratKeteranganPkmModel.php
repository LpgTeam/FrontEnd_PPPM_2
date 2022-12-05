<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuratKeteranganPkmModel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'constraint' => 11,
                'null' => false,
                'auto_increment' => true
            ],

            'no_surat' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => false
            ],

            'id_pkm' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => true
            ],

            'created_at' => [
                'type' => 'date',
                'null' => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('suratketeranganpkm');
    }

    public function down()
    {
        //
    }
}
