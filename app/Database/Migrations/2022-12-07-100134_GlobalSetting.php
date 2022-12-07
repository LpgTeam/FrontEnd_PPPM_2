<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GlobalSetting extends Migration
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

            'id_setting' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
                'null' => false
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('global_setting_ttd');
    }

    public function down()
    {
        //
    }
}
