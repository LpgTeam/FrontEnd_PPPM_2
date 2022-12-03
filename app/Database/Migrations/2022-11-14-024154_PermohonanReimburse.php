<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PermohonanReimburse extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ID_permohonan_reimburse' => [
                'type' => 'INT',
                'constraint' => 15,
                'null' => false
            ],

            'ID_penelitian' => [
                'type' => 'INT',
                'constraint' => 15,
                'null' => false
            ],

            'berkas' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],

            'status_reimburse' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ]
        ]);
        $this->forge->addKey('ID_permohonan_reimburse', true);
        $this->forge->createTable('permohonan_reimburse');
    }

    public function down()
    {
        //
    }
}
