<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TandaTanganDosen extends Migration
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

            'nip_dosen' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false
            ],

            'ttd_manual' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
                'null' => false
            ],

            'ttd_digital' => [
                'type' => 'VARCHAR',
                'null' => false
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tanda_tangan_dosen');
    }

    public function down()
    {
        //
    }
}
