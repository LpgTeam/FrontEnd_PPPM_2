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
                'nullable' => false,
                'auto_increment' => true
            ],

            'id_pkm' => [
                'type' => 'INT',
                'constraint' => 15,
                'nullable' => false,
            ],

            'pembiayaan_diajukan' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'nullable' => false
            ],

            'jumlah_biaya' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'nullable' => false
            ],
        ]);
        $this->forge->addKey('id_biaya', true);
        $this->forge->createTable('penelitian');
    }

    public function down()
    {
        //
    }
}
