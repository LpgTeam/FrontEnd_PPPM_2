<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Pkm_del extends Seeder
{
    public function run()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pengajuan_pkm');
        $builder->selectMax('ID_pkm');
        $query = $builder->get();
        $datapenelitian = $query->getResultArray();

        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            $data = [
                'ID_pkm'                => $i + $datapenelitian[0]['ID_pkm'],
                'jenis_pkm'             => $faker->randomElement($array = array("Mandiri", "Kelompok", "Terstruktur")),
                'topik_kegiatan'        => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'bentuk_kegiatan'       => $faker->randomElement($array = array("Seminar", "Webinar", "Sosialisasi")),
                'waktu_kegiatan'        => Time::createFromTimestamp($faker->unixTime()),
                'tempat_kegiatan'       => $faker->address,
                'sasaran'               => $faker->randomElement($array = array('Masyarakat umum', 'Mahasiswa')),
                'target_peserta'        => $faker->numberBetween($min = 10, $max = 250),
                'hasil'                 => $faker->randomElement($array = array("Berhasil", "Sukses")),
                'tanggal_pengajuan'     => Time::createFromTimestamp($faker->unixTime()),
                'id_status'             => $faker->numberBetween($min = 1, $max = 7),
                'jumlah_anggota'        => $faker->randomElement($array = array(1, 2, 3)),
                // 'status_pengajuan' =>  $faker->randomElement($array = array(
                //     'Diajukan oleh Dosen', 'Disetujui oleh BAU',
                //     'Disetujui oleh Reviewer', 'Diajukan oleh Dosen', 'Disetujui oleh Kepala PPPM', 'Disetujui oleh Direktur',
                //     'Kegiatan sedang berlangsung', 'Ditolak oleh BAU', 'Ditolak oleh Reviewer', 'Ditolak oleh Kepala PPPM',
                //     'Kegiatan telah selesai dilaksanakan'
                // )),
            ];

            $builder = $db->table('dosen');
            $query = $builder->get();
            $datadosen = $query->getResultArray();

            $dosen = $faker->randomElement($array = $datadosen);
            $dataketua = [
                'id_pkm'            => $data['ID_pkm'],
                'nip'               => $dosen['NIP_dosen'],
                'nama'              => $dosen['nama_dosen'],
                'peran'             => 'Ketua PKM',
                'bidang_keahlian'   => $faker->randomElement($array = array('IT', 'Metodologi', 'Machine Learning', 'Data Science', 'Statistika', 'Data Mining')),
                'pangkat'           => $dosen['golongan']
            ];
            $this->db->table('tim_pkm')->insert($dataketua);

            for ($j = 0; $j < $data['jumlah_anggota'] - 1; $j++) {
                $dosen = $faker->randomElement($array = $datadosen);
                $dataanggota = [
                    'id_pkm'            => $data['ID_pkm'],
                    'nip'               => $dosen['NIP_dosen'],
                    'nama'              => $dosen['nama_dosen'],
                    'peran'             => 'Anggota PKM',
                    'bidang_keahlian'   => $faker->randomElement($array = array('IT', 'Metodologi', 'Machine Learning', 'Data Science', 'Statistika', 'Data Mining')),
                    'pangkat'           => $dosen['golongan']
                ];
                $this->db->table('tim_pkm')->insert($dataanggota);
            }
            $this->db->table('pengajuan_pkm')->insert($data);
        }

        // 'bidang'        => $faker->randomElement($array = array()),
    }
}
