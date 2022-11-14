<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailstatusPenelitian extends Migration
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
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            
            'deskripsi' => [
                'type' => 'TEXT'
            ]
        ]);
        $this->forge->addKey('id_detail', true);
        $this->forge->createTable('detailstatus_penelitian');
    }

    public function down()
    {
        //
    }
}
