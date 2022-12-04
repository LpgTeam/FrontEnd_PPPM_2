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

        // $deskripsi = [
        //     1 => 'Diajukan oleh Dosen', 2 => 'Disetujui oleh BAU', 3 => 'Disetujui oleh Reviewer', 4 => 'Disetujui oleh Kepala PPPM', 5 => 'Disetujui oleh Direktur', 6 => 'Proses', 7 => 'Ditolak oleh BAU',
        //     8 => 'Ditolak oleh Reviewer', 9 => 'Ditolak oleh Kepala PPPM', 10 => 'Kegiatan telah selesai dilaksanakan'
        // ];

        $builder2 = $db->table('detailstatus_penelitian');
        $query2 = $builder2->get();
        $datastatus = $query2->getResultArray();


        $faker = \Faker\Factory::create('id_ID');
        for ($k = 1; $k <= 25; $k++) {
            $data = [
                'id_penelitian' => $k + $datapenelitian[0]['id_penelitian'],
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
                // 'surat_pernyataan' => $faker->randomElement($array = array('default_surat.pdf')),
                'tanda_tangan' => $faker->randomElement($array = array('default_ttd.jpg')),
                'biaya' => $faker->numberBetween($min = 1000000, $max = 30000000),
                'alasan' => $faker->randomElement($array = array('-')),
                // 'bukti_luaran' =>   
                // 'username'      => $faker->userName,
                // 'fullname'      => $faker->name,
                // 'address'       => $faker->address,
                // 'password_hash' => $faker->password,
                // 'created_at'    => Time::createFromTimestamp($faker->unixTime()),
                // 'updated_at'    => Time::now()
            ];
            if ($data['id_status'] == 1) $data['status_pengajuan'] = $datastatus[0]['deskripsi'];
            elseif ($data['id_status'] == 2) $data['status_pengajuan'] = $datastatus[1]['deskripsi'];
            elseif ($data['id_status'] == 3) $data['status_pengajuan'] = $datastatus[2]['deskripsi'];
            elseif ($data['id_status'] == 4) $data['status_pengajuan'] = $datastatus[3]['deskripsi'];
            elseif ($data['id_status'] == 5) $data['status_pengajuan'] = $datastatus[4]['deskripsi'];
            elseif ($data['id_status'] == 6) $data['status_pengajuan'] = $datastatus[5]['deskripsi'];
            elseif ($data['id_status'] == 7) $data['status_pengajuan'] = $datastatus[6]['deskripsi'];
            elseif ($data['id_status'] == 8) $data['status_pengajuan'] = $datastatus[7]['deskripsi'];
            elseif ($data['id_status'] == 9) $data['status_pengajuan'] = $datastatus[8]['deskripsi'];
            elseif ($data['id_status'] == 10) $data['status_pengajuan'] = $datastatus[9]['deskripsi'];


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

            for ($j = 0; $j <= ($data['jumlah_anggota'] - 1); $j++) {
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


            // if (($data['id_status'] == 6) || ($data['id_status'] == 10)) {
            if (($data['jenis_penelitian'] == 'Semi Mandiri') || ($data['jenis_penelitian'] == 'Di Danai Institusi') || ($data['jenis_penelitian'] == 'Institusi')) {
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
                    'status_penelitian' =>  strval($data['id_status']),
                ];
                $this->db->table('laporan_penelitian')->insert($data_laporan_penelitian);
                // }
            }

            // if (($data['id_status'] == 6) || ($data['id_status'] == 10)) {
            //     $file_kontrak = null;
            //     $file_laporan_dana = null;
            //     if ($data['jenis_penelitian'] == 'Semi Mandiri') {
            //         $file_laporan_dana = 'default_laporan_dana.pdf';
            //     } else {
            //         $file_kontrak = 'default_kontrak.pdf';
            //     }

            //     $file_laporan_luaran = null;
            //     if ($data['id_status'] == 10) {
            //         $file_laporan_luaran = 'default_laporan_luaran.pdf';
            //     }

            //     $data_laporan_penelitian = [
            //         'id_penelitian'     =>  $data['id_penelitian'],
            //         'kontrak'           =>  $file_kontrak,
            //         'laporan_luaran'    =>  $file_laporan_luaran,
            //         'laporan_dana'      =>  $file_laporan_dana,
            //         'status_penelitian' =>  $data['id_status'],
            //     ];
            //     $this->db->table('laporan_penelitian')->insert($data_laporan_penelitian);
            // }

            $data_target_penelitian = [
                'id_penelitian'     =>  $data['id_penelitian'],
                'jenis_luaran'      =>  $faker->randomElement($array = array('Artikel pada jurnal nasional terakreditasi', 'Artikel pada prosiding terindeks scopus', 'Buku Cetak Hasil Penelitian ', 'Buku Elektronik Hasil Penelitian ')),
                'target-capaian'    =>  $faker->randomElement($array = array('accepted', 'published')),
                'jurnal_tujuan'     =>  $faker->randomElement($array = array('Media Statistika (Terakreditasi Sinta 2)', 'INDONESIAN JOURNAL OF SCIENCE AND TECHNOLOGY', 'INDONESIAN JOURNAL OF ELECTRICAL ENGINEERING AND COMPUTER SCIENCE', 'GADJAH MADA INTERNATIONAL JOURNAL OF BUSINESS (GAMAIJB)', 'JOURNAL ON MATHEMATICS EDUCATION', 'Indonesian Journal of Science and Technology', 'Journal of Mathematical and Fundamental Sciences', 'Asian Journal of Information Technology', 'Research Journal of Applied Sciences', 'International Journal of Computer Applications in Technology')),
            ];
            $this->db->table('target_penelitian')->insert($data_target_penelitian);


            // $db      = \Config\Database::connect();

            // $db      = \Config\Database::connect();


            $id_status = $data['id_status'];

            if ($id_status <= 6) {
                for ($i = 0; $i < $data['id_status']; $i++) {
                    // $query = $builder->getWhere(['id_detail' => $i]);
                    // $datastatus = $query->getResultArray();

                    $data_status_penelitian = [
                        'id_penelitian'     =>      $data['id_penelitian'],
                        'status'            =>      $datastatus[$i]['deskripsi'],
                        // 'status'            =>      $deskripsi[$i],
                    ];
                    $this->db->table('status_penelitian')->insert($data_status_penelitian);
                }
            } else if ($id_status == 7) {
                // for ($i = 1; $i <= 1; $i++) {
                // $query = $builder->getWhere(['id_detail' => $i]);
                // $datastatus = $query->getResultArray();
                $data_status_penelitian = [
                    'id_penelitian'     =>      $data['id_penelitian'],
                    'status'            =>      $datastatus[0]['deskripsi'],
                    // 'status'            =>      $deskripsi[$i],
                ];
                $this->db->table('status_penelitian')->insert($data_status_penelitian);
                // }

                // $query = $builder->getWhere(['id_detail' => $id_status]);
                // $datastatus = $query->getResultArray();
                $data_status_penelitian = [
                    'id_penelitian'     =>      $data['id_penelitian'],
                    'status'            =>      $datastatus[6]['deskripsi'],
                    // 'status'            =>      $deskripsi[7],
                ];
                $this->db->table('status_penelitian')->insert($data_status_penelitian);
            } elseif ($id_status == 8) {
                for ($i = 0; $i <= 1; $i++) {
                    // $query = $builder->getWhere(['id_detail' => $i]);
                    // $datastatus = $query->getResultArray();
                    $data_status_penelitian = [
                        'id_penelitian'     =>      $data['id_penelitian'],
                        'status'            =>      $datastatus[$i]['deskripsi'],
                        // 'status'            =>      $deskripsi[$i],
                    ];
                    $this->db->table('status_penelitian')->insert($data_status_penelitian);
                }

                // $query = $builder->getWhere(['id_detail' => $id_status]);
                // $datastatus = $query->getResultArray();
                $data_status_penelitian = [
                    'id_penelitian'     =>      $data['id_penelitian'],
                    'status'            =>      $datastatus[7]['deskripsi'],
                    // 'status'            =>      $deskripsi[8],
                ];
                $this->db->table('status_penelitian')->insert($data_status_penelitian);
            } elseif ($id_status == 9) {
                for ($i = 0; $i <= 2; $i++) {
                    // $query = $builder->getWhere(['id_detail' => $i]);
                    // $datastatus = $query->getResultArray();
                    $data_status_penelitian = [
                        'id_penelitian'     =>      $data['id_penelitian'],
                        'status'            =>      $datastatus[$i]['deskripsi'],
                        // 'status'            =>      $deskripsi[$i],
                    ];
                    $this->db->table('status_penelitian')->insert($data_status_penelitian);
                }

                // $query = $builder->getWhere(['id_detail' => $id_status]);
                // $datastatus = $query->getResultArray();
                $data_status_penelitian = [
                    'id_penelitian'     =>      $data['id_penelitian'],
                    'status'            =>      $datastatus[8]['deskripsi'],
                    // 'status'            =>      $deskripsi[9],
                ];
                $this->db->table('status_penelitian')->insert($data_status_penelitian);
            } elseif ($id_status == 10) {
                for ($i = 0; $i <= 5; $i++) {
                    // $query = $builder->getWhere(['id_detail' => $i]);
                    // $datastatus = $query->getResultArray();
                    $data_status_penelitian = [
                        'id_penelitian'     =>      $data['id_penelitian'],
                        'status'            =>      $datastatus[$i]['deskripsi'],
                        // 'status'            =>      $deskripsi[$i],
                    ];
                    $this->db->table('status_penelitian')->insert($data_status_penelitian);
                }

                // $query = $builder->getWhere(['id_detail' => $id_status]);
                // $datastatus = $query->getResultArray();
                $data_status_penelitian = [
                    'id_penelitian'     =>      $data['id_penelitian'],
                    'status'            =>      $datastatus[9]['deskripsi'],
                    // 'status'            =>      $deskripsi[10],
                    // 'status'            =>      $deskripsi[10],
                ];
                $this->db->table('status_penelitian')->insert($data_status_penelitian);
            }
            $this->db->table('penelitian')->insert($data);
        }

        // 'bidang'        => $faker->randomElement($array = array()),
    }
}
