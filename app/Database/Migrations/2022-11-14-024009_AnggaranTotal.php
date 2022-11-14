<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AnggaranTotal extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tahunAnggaran' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            
            'tahun_anggaran' => [
                'type' => 'VARCHAR',
                'constraint' => 4
            ],
            
            'jumlah' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            
            'sisa_anggaran' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ]
        ]);
        $this->forge->addKey('id_tahunAnggaran', true);
        $this->forge->createTable('anggaran_total');
    }

    public function down()
    {
        //
    }
}
