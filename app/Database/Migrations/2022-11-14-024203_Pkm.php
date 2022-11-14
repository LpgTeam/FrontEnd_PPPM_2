<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pkm extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pkm' => [
                'type' => 'INT',
                'constraint' => 11,
                'nullable' => false
            ],

            'surat_pernyataan' => [
                'type' => 'text',
                'nullable' => false
            ],

            'bukti_kegiatan' => [
                'type' => 'text',
                'nullable' => false
            ]
        ]);    
        $this->forge->createTable('pkm');
    }

    public function down()
    {
        //
    }
}
