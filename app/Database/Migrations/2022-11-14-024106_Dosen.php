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

            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],

            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],

            'nama_dosen' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],

            'jabatan_dosen' => [
                'type' => 'VARCHAR',
                'constraint' => 30
            ],

            'program_studi' => [
                'type' => 'VARCHAR',
                'constraint' => 30
            ],

            'no_hp' => [
                'type' => 'VARCHAR',
                'constraint' => 15
            ],

            'email_dosen' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],

            'minat_penelitian' => [
                'type' => 'TEXT',
                'nullable' => true
            ],

            'google_scholar' => [
                'type' => 'TEXT',
                'nullable' => true
            ],

            'link_sinta' => [
                'type' => 'TEXT',
                'nullable' => true
            ],

            'link_orcid' => [
                'type' => 'TEXT',
                'nullable' => true
            ],

            'link_wos' => [
                'type' => 'TEXT',
                'nullable' => true
            ],

            'link_scopus' => [
                'type' => 'TEXT',
                'nullable' => true
            ]
        ]);
        $this->forge->addKey('NIP_dosen', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('dosen');
    }

    public function down()
    {
        //
    }
}
