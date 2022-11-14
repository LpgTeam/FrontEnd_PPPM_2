<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penelitian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penelitian' => [
                'type' => 'INT',
                'constraint' => 15,
                'nullable' => false,
                'auto_increment' => true
            ],

            'jenis_penelitian' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'nullable' => false
            ],

            'judul_penelitian' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'nullable' => false
            ],

            'bidang' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'nullable' => false
            ],

            'tanggal_pengajuan' => [
                'type' => 'DATE',
                'nullable' => false
            ],
            
            'id_status' => [
                'type' => 'INT',
                'constraint' => 11,
                'nullable' => false
            ],

            'status_pengajuan' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'nullable' => false
            ],

            'file_proposal' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'nullable' => false
            ],

            'surat_pernyataan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'nullable' => false
            ],

            'biaya' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'nullable' => false
            ]
        ]);
        $this->forge->addKey('ID_penelitian', true);
        $this->forge->createTable('penelitian');
    }

    public function down()
    {
        //
    }
}
