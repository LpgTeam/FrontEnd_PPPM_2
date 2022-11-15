<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Administrator extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'NIP' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],

            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            
            'nama_unit_pppm' => [
                'type' => 'VARCHAR',
                'constraint' => 30
            ],
            
            'jabatan' => [
                'type' => 'VARCHAR',
                'constraint' => 30
            ],
            
            'hak_akses' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ]
        ]);
        $this->forge->createTable('administrator');
    }

    public function down()
    {
        //
    }
}
