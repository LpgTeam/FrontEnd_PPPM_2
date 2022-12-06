<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PermohonanReimburse extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_reimburse' => [
                'type' => 'INT',
                'constraint' => 15,
                'null' => false,
                'auto_increment' => true
            ],

            'id_penelitian' => [
                'type' => 'INT',
                'constraint' => 15,
                'null' => true
            ],

            'id_pkm' => [
                'type' => 'INT',
                'constraint' => 15,
                'null' => true
            ],

            'jenis_penelitian' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],

            'jenis_pkm' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],

            'judul_penelitian' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],

            'judul_pkm' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],

            'tanggal_pengajuan' => [
                'type' => 'DATE',
                'null' => true
            ],

            'laporan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],

            'loa' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],

            'naskah_artikel' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],

            'bukti_pembayaran' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],

            'id_status' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],

            'status_reimburse' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],

            'usulan_publikasi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],

            'biaya_diajukan' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],

            'total_biaya' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('ID_permohonan_reimburse', true);
        $this->forge->createTable('permohonan_reimburse');
    }

    public function down()
    {
        //
    }
}
