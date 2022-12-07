<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PembiayaanPkm extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_biaya' => [
                'type' => 'INT',
                'constraint' => 15,
                'null' => false,
                'auto_increment' => true
            ],

            'id_pkm' => [
                'type' => 'INT',
                'constraint' => 15,
                'null' => false,
            ],

            'pembiayaan_diajukan' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ],

            'jumlah_biaya' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ],
        ]);
        $this->forge->addKey('id_biaya', true);
        $this->forge->createTable('pembiayaan_pkm');
    }

    public function down()
    {
        //
    }
}
