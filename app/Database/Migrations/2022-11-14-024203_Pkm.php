<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pkm extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
                'auto_increment' => true

            ],

            'id_pkm' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],

            'surat_pernyataan' => [
                'type' => 'text',
                'null' => true
            ],

            'bukti_kegiatan' => [
                'type' => 'text',
                'null' => true
            ],

            'narasumber' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],

            'penyelenggara' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ]
        ]);    
        $this->forge->createTable('pkm');
    }

    public function down()
    {
        //
    }
}
