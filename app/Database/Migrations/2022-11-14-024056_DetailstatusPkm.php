<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailstatusPkm extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            
            'status' => [
                'type' => 'TEXT'
            ],
            
            'Deskripsi' => [
                'type' => 'TEXT'
            ]
        ]);
        $this->forge->addKey('id_detail', true);
        $this->forge->createTable('detailstatus_pkm');
    }

    public function down()
    {
        //
    }
}
