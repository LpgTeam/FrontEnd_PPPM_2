<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DanaPenelitian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_dana' => [
                'type' => 'INT',
                'constraint' => 15,
                'auto_increment' => true
            ],
            
            'id_penelitian' => [
                'type' => 'INT',
                'constraint' => 15
            ],
            
            'tanggal' => [
                'type' => 'DATE'
            ],
            
            'dana_keluar' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            
            'dana_tidak_terserap' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true
            ]
        ]);
        $this->forge->addKey('id_dana', true);
        $this->forge->createTable('dana_penelitian');
    }

    public function down()
    {
        //
    }
}
