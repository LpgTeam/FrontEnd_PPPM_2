<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DanaPkm extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_dana' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],

            'id_pkm' => [
                'type' => 'INT',
                'constraint' => 11
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
        $this->forge->createTable('dana_pkm');
    }

    public function down()
    {
        //
    }
}
