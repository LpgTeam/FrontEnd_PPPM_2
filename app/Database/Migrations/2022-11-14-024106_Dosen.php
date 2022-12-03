<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dosen extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'NIP_dosen' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],

            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],

            'nama_dosen' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],

            'NIDN_dosen' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],

            'jabatan_dosen' => [
                'type' => 'VARCHAR',
                'constraint' => 30
            ],

            'program_studi' => [
                'type' => 'VARCHAR',
                'constraint' => 30
            ],

            'golongan' => [
                'type' => 'VARCHAR',
                'constraint' => 15
            ],

            'no_hp' => [
                'type' => 'VARCHAR',
                'constraint' => 15
            ],

            'email_dosen' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],

            'foto_dosen' => [
                'type' => 'VARCHAR',
                'constraint' => 15
            ],
            
            'minat_penelitian' => [
                'type' => 'TEXT',
                'null' => true
            ],

            'google_scholar' => [
                'type' => 'TEXT',
                'null' => true
            ],

            'link_sinta' => [
                'type' => 'TEXT',
                'null' => true
            ],

            'link_orcid' => [
                'type' => 'TEXT',
                'null' => true
            ],

            'link_wos' => [
                'type' => 'TEXT',
                'null' => true
            ],

            'link_scopus' => [
                'type' => 'TEXT',
                'null' => true
            ]
        ]);
        $this->forge->addKey('NIP_dosen', true);
        // $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('dosen');
    }

    public function down()
    {
        //
    }
}
