<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AnggaranTotal extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_total' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            
            'tahun' => [
                'type' => 'VARCHAR',
                'constraint' => 4
            ],
            
            'dana_keluar' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            
            'sisa_anggaran' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ]
        ]);
        $this->forge->addKey('id_total', true);
        $this->forge->createTable('anggaran_total');
    }

    public function down()
    {
        //
    }
}
