<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LaporanPenelitian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_laporan' => [
                'type' => 'INT',
                'constraint' => 15
            ],

            'id_penelitian' => [
                'type' => 'INT',
                'constraint' => 15
            ],

            'kontrak' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            
            'laporan_luaran' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            
            'laporan_dana' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            
            'hasil' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            
            'form_usulan_publikasi' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            
            'status_penelitian' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ]
        ]);
        $this->forge->addKey('id_laporan', true);
        $this->forge->createTable('laporan_penelitian');
    }

    public function down()
    {
        //
    }
}
