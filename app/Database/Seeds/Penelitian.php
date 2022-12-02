<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Penelitian extends Seeder
{
    public function run()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('penelitian');
        $builder->selectMax('id_penelitian');
        $query = $builder->get();
        $datapenelitian = $query->getResultArray();

        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 20; $i++) {
            $data = [
                'id_penelitian' => $i + $datapenelitian[0]['id_penelitian'],
                'jenis_penelitian' => $faker->randomElement($array = array('Mandiri', 'Semi Mandiri', 'Di Danai Institusi', 'Institusi', 'Kerjasama')),
                'judul_penelitian' => $faker->realText($maxNbChars = 20, $indexSize = 2),
                'bidang'        => $faker->randomElement($array = array("Small Area Estimation", "SDG's", "Metodologi Survei dan Sensus", "Sistem Indormasi Statistik", "Lainnya")),
                'tanggal_pengajuan' => Time::createFromTimestamp($faker->unixTime()),
                'jumlah_anggota' => $faker->randomElement($array = array(1, 2, 3)),
                'id_status' => $faker->numberBetween($min = 1, $max = 10),
                // 'status_pengajuan' =>  $faker->randomElement($array = array(
                //     'Diajukan oleh Dosen', 'Disetujui oleh BAU',
                //     'Disetujui oleh Reviewer', 'Diajukan oleh Dosen', 'Disetujui oleh Kepala PPPM', 'Disetujui oleh Direktur',
                //     'Kegiatan sedang berlangsung', 'Ditolak oleh BAU', 'Ditolak oleh Reviewer', 'Ditolak oleh Kepala PPPM',
                //     'Kegiatan telah selesai dilaksanakan'
                // )),
                'file_proposal' => $faker->randomElement($array = array('default_penelitian.pdf')),
                'surat_pernyataan' => $faker->randomElement($array = array('default_surat.pdf')),
                'biaya' => $faker->numberBetween($min = 1000000, $max = 30000000),
                // 'bukti_luaran' =>   
                // 'username'      => $faker->userName,
                // 'fullname'      => $faker->name,
                // 'address'       => $faker->address,
                // 'password_hash' => $faker->password,
                // 'created_at'    => Time::createFromTimestamp($faker->unixTime()),
                // 'updated_at'    => Time::now()
            ];

            // }
            $builder = $db->table('dosen');
            $query = $builder->get();
            $datadosen = $query->getResultArray();

            // $builder = $db->table('penelitian');
            // $query = $builder->getWhere(['judul_penelitian' => $data['judul_penelitian']]);
            // $datapenelitian = $query->getResultArray();


            // for ($i = 0; $i < 10; $i++) {
            $dosen = $faker->randomElement($array = $datadosen);
            $dataketua = [
                'id_penelitian' => $data['id_penelitian'],
                'NIP' => $dosen['NIP_dosen'],
                'namaPeneliti' => $dosen['nama_dosen'],
                'programStudi' => $dosen['program_studi'],
                'peran' => 'Ketua Penelitian',
                'bidang_keahlian' => $faker->randomElement($array = array('IT', 'Metodologi', 'Machine Learning', 'Data Science', 'Statistika', 'Data Mining')),
            ];
            $this->db->table('tim_peneliti')->insert($dataketua);

            for ($j = 0; $j < $data['jumlah_anggota'] - 1; $j++) {
                $dosen = $faker->randomElement($array = $datadosen);
                $dataanggota = [
                    'id_penelitian' => $data['id_penelitian'],
                    'NIP' => $dosen['NIP_dosen'],
                    'namaPeneliti' => $dosen['nama_dosen'],
                    'programStudi' => $dosen['program_studi'],
                    'peran' => 'Anggota',
                    'bidang_keahlian' => $faker->randomElement($array = array('IT', 'Metodologi', 'Machine Learning', 'Data Science', 'Statistika', 'Data Mining')),
                ];
                $this->db->table('tim_peneliti')->insert($dataanggota);
            }

            if (($data['id_status'] == 6) || ($data['id_status'] == 10)) {
                $file_kontrak = null;
                $file_laporan_dana = null;
                if ($data['jenis_penelitian'] == 'Semi Mandiri') {
                    $file_laporan_dana = 'default_laporan_dana.pdf';
                } else {
                    $file_kontrak = 'default_kontrak.pdf';
                }

                $file_laporan_luaran = null;
                if ($data['id_status'] == 10) {
                    $file_laporan_luaran = 'default_laporan_luaran.pdf';
                }

                $data_laporan_penelitian = [
                    'id_penelitian'     =>  $data['id_penelitian'],
                    'kontrak'           =>  $file_kontrak,
                    'laporan_luaran'    =>  $file_laporan_luaran,
                    'laporan_dana'      =>  $file_laporan_dana,
                    'status_penelitian' =>  $data['id_status'],
                ];
                $this->db->table('laporan_penelitian')->insert($data_laporan_penelitian);

                $data_target_penelitian = [
                    'id_penelitian'     =>  $data['id_penelitian'],
                    'jenis_luaran'      =>  $faker->randomElement($array = array('Artikel pada jurnal nasional terakreditasi', 'Artikel pada prosiding terindeks scopus', 'Buku Cetak Hasil Penelitian ', 'Buku Elektronik Hasil Penelitian ')),
                    'target_capaian'    =>  $faker->randomElement($array = array('accepted', 'published')),
                    'jurnal_tujuan'     =>  $faker->randomElement($array = array('Media Statistika (Terakreditasi Sinta 2)', 'INDONESIAN JOURNAL OF SCIENCE AND TECHNOLOGY','INDONESIAN JOURNAL OF ELECTRICAL ENGINEERING AND COMPUTER SCIENCE','GADJAH MADA INTERNATIONAL JOURNAL OF BUSINESS (GAMAIJB)','JOURNAL ON MATHEMATICS EDUCATION','Indonesian Journal of Science and Technology','Journal of Mathematical and Fundamental Sciences','Asian Journal of Information Technology','Research Journal of Applied Sciences','International Journal of Computer Applications in Technology')),
                ];
                $this->db->table('target_penelitian')->insert($data_target_penelitian);
            }

            $this->db->table('penelitian')->insert($data);
        }

        // 'bidang'        => $faker->randomElement($array = array()),
    }
}
