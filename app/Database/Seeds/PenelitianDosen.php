<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PenelitianDosen extends Seeder
{
    public function run()
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('penelitian');
        $builder->selectMax('id_penelitian');
        $query = $builder->get();
        $datapenelitian = $query->getResultArray();

        $builder2 = $db->table('detailstatus_penelitian');
        $query2 = $builder2->get();
        $datastatus = $query2->getResultArray();

        $builder3 = $db->table('dosen');
        $query = $builder3->get();
        $datadosen = $query->getResultArray();

        $builder4 = $db->table('dosen');
        $query = $builder4->getWhere(['NIP_dosen' => nipDosen]);
        $datadosen_ketuapenelitian = $query->getResultArray();

        //fill tabel penelitian
        $faker = \Faker\Factory::create('id_ID');
        for ($k = 1; $k <= 25; $k++) {
            $data = [
                'id_penelitian' => $k + $datapenelitian[0]['id_penelitian'],
                'jenis_penelitian' => $faker->randomElement($array = array('Mandiri', 'Semi Mandiri', 'Didanai Institusi', 'Institusi', 'Kerjasama')),
                // 'jenis_penelitian' => $faker->randomElement($array = array('Semi Mandiri')),
                'judul_penelitian' => $faker->realText($maxNbChars = 20, $indexSize = 2),
                'bidang'        => $faker->randomElement($array = array("Small Area Estimation", "SDG's", "Metodologi Survei dan Sensus", "Sistem Indormasi Statistik", "Lainnya")),
                'tanggal_pengajuan' => Time::createFromTimestamp($faker->unixTime()),
                'jumlah_anggota' => $faker->randomElement($array = array(1, 2, 3)),
                'id_status' => $faker->numberBetween($min = 1, $max = 10),
                'file_proposal' => $faker->randomElement($array = array('default_penelitian.pdf')),
                'tanda_tangan' => $faker->randomElement($array = array('default_ttd.jpg')),
                'biaya' => ($faker->numberBetween($min = 300, $max = 1000)) . '000',
                'alasan' => $faker->randomElement($array = array('-')),
                'id_status_reimburse' => $faker->numberBetween($min = 0, $max = 2),
            ];

            //fill desc by id status (table penelitian)
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


            // fill table tim peneliti
            // fill kepala penelitian
            // $dosen = $faker->randomElement($array = $datadosen);
            $dosen = $datadosen_ketuapenelitian;

            $dataketua = [
                'id_penelitian' => $data['id_penelitian'],
                'NIP' => $dosen[0]['NIP_dosen'],
                'namaPeneliti' => $dosen[0]['nama_dosen'],
                'programStudi' => $dosen[0]['program_studi'],
                'peran' => 'Ketua Penelitian',
                'bidang_keahlian' => $faker->randomElement($array = array('IT', 'Metodologi', 'Machine Learning', 'Data Science', 'Statistika', 'Data Mining')),
            ];
            $this->db->table('tim_peneliti')->insert($dataketua);

            // fill anggota penelitian
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

            // fill table laporan penelitian
            if (($data['jenis_penelitian'] == 'Semi Mandiri') || ($data['jenis_penelitian'] == 'Didanai Institusi') || ($data['jenis_penelitian'] == 'Institusi')) {
                $file_kontrak = null;
                // $file_publikasi = null;
                $file_laporan_dana = null;

                if ($data['id_status'] == 6) {
                    if ($data['jenis_penelitian'] == 'Semi Mandiri') {
                        $file_laporan_dana = 'default_laporan_dana.pdf';
                    } else {
                        $file_kontrak = 'default_kontrak.pdf';
                    }
                }

                $file_laporan_luaran = null;
                if ($data['id_status'] == 10) {
                    $file_laporan_luaran = 'default_laporan_luaran.pdf';
                    // $file_publikasi = 'default_publikasi.pdf';
                }

                $data_laporan_penelitian = [
                    'id_penelitian'     =>  $data['id_penelitian'],
                    'kontrak'           =>  $file_kontrak,
                    'laporan_luaran'    =>  $file_laporan_luaran,
                    'laporan_dana'              =>  $file_laporan_dana,
                    // 'form_usulan_publikasi'     =>  $file_publikasi,
                    'status_penelitian'         =>  strval($data['id_status']),
                ];
                $this->db->table('laporan_penelitian')->insert($data_laporan_penelitian);
            }

            // fill table target penelitian
            $data_target_penelitian = [
                'id_penelitian'     =>  $data['id_penelitian'],
                'jenis_luaran'      =>  $faker->randomElement($array = array('Artikel pada jurnal nasional terakreditasi', 'Artikel pada prosiding terindeks scopus', 'Buku Cetak Hasil Penelitian ', 'Buku Elektronik Hasil Penelitian ')),
                'target_capaian'    =>  $faker->randomElement($array = array('accepted', 'published')),
                'jurnal_tujuan'     =>  $faker->randomElement($array = array('Media Statistika (Terakreditasi Sinta 2)', 'INDONESIAN JOURNAL OF SCIENCE AND TECHNOLOGY', 'INDONESIAN JOURNAL OF ELECTRICAL ENGINEERING AND COMPUTER SCIENCE', 'GADJAH MADA INTERNATIONAL JOURNAL OF BUSINESS (GAMAIJB)', 'JOURNAL ON MATHEMATICS EDUCATION', 'Indonesian Journal of Science and Technology', 'Journal of Mathematical and Fundamental Sciences', 'Asian Journal of Information Technology', 'Research Journal of Applied Sciences', 'International Journal of Computer Applications in Technology')),
                'index_jurnal_tujuan'     =>  'Sinta ' . $faker->randomElement($array = array('1', '2', '3', '4', '5', '6')),
            ];
            $this->db->table('target_penelitian')->insert($data_target_penelitian);


            // fill table dana penelitian
            if (($data['jenis_penelitian'] == 'Semi Mandiri') && (($data['id_status'] == 6) || ($data['id_status'] == 10))) {
                $datadana = [
                    'id_penelitian' => $data['id_penelitian'],
                    'tanggal' => Time::createFromTimestamp($faker->unixTime()),
                    'dana_keluar' => ($faker->numberBetween($min = 300, $max = 1000)) . '000',
                ];
                $this->db->table('dana_penelitian')->insert($datadana);
            }

            // fill table permohonan reimburse
            if (($data['jenis_penelitian'] == 'Semi Mandiri') || ($data['jenis_penelitian'] == 'Didanai Institusi') || ($data['jenis_penelitian'] == 'Institusi')) {
                if ($data['id_status'] == 10) {
                    if (($data['id_status_reimburse'] == 1) || ($data['id_status_reimburse'] == 2)) {

                        $datareimburse = [
                            'id_penelitian' => $data['id_penelitian'],
                            'jenis_penelitian' => $data['jenis_penelitian'],
                            'judul_penelitian' => $data['judul_penelitian'],
                            'tanggal_pengajuan' => Time::createFromTimestamp($faker->unixTime()),
                            'laporan'    =>  "Laporan Penelitian - ".$data['judul_penelitian'],
                            'loa'    =>  "default_loa.pdf",
                            'naskah_artikel'    =>  "default_naskah_artikel.pdf",
                            'bukti_pembayaran'    =>  "default_bukti_pembayaran.pdf",
                            'usulan_publikasi'    =>  "default_usulan_publikas.pdf",
                            'id_status' => $data['id_status_reimburse'],
                            'biaya_diajukan' => ($faker->numberBetween($min = 300, $max = 1000)) . '000',
                            'total_biaya' => ($faker->numberBetween($min = 400, $max = 1000)) . '000',
                        ];
                        if ($data['id_status_reimburse'] == 0) $datareimburse['status_reimburse'] = "Reimbursement belum diajukan";
                        elseif ($data['id_status_reimburse'] == 1) $datareimburse['status_reimburse'] = "Reimbursement dalam proses";
                        elseif ($data['id_status_reimburse'] == 2) $datareimburse['status_reimburse'] = "Dana telah dicairkan";
                        $this->db->table('permohonan_reimburse')->insert($datareimburse);
                    }
                }
            }

            // fill table status penelitian
            $id_status = $data['id_status'];
            if ($id_status <= 6) {
                for ($i = 0; $i < $data['id_status']; $i++) {
                    $data_status_penelitian = [
                        'id_penelitian'     =>      $data['id_penelitian'],
                        'status'            =>      $datastatus[$i]['deskripsi'],
                    ];
                    $this->db->table('status_penelitian')->insert($data_status_penelitian);
                }
            } else if ($id_status == 7) {
                $data_status_penelitian = [
                    'id_penelitian'     =>      $data['id_penelitian'],
                    'status'            =>      $datastatus[0]['deskripsi'],
                ];
                $this->db->table('status_penelitian')->insert($data_status_penelitian);
                $data_status_penelitian = [
                    'id_penelitian'     =>      $data['id_penelitian'],
                    'status'            =>      $datastatus[6]['deskripsi'],
                ];
                $this->db->table('status_penelitian')->insert($data_status_penelitian);
            } elseif ($id_status == 8) {
                for ($i = 0; $i <= 1; $i++) {
                    $data_status_penelitian = [
                        'id_penelitian'     =>      $data['id_penelitian'],
                        'status'            =>      $datastatus[$i]['deskripsi'],
                    ];
                    $this->db->table('status_penelitian')->insert($data_status_penelitian);
                }
                $data_status_penelitian = [
                    'id_penelitian'     =>      $data['id_penelitian'],
                    'status'            =>      $datastatus[7]['deskripsi'],
                ];
                $this->db->table('status_penelitian')->insert($data_status_penelitian);
            } elseif ($id_status == 9) {
                for ($i = 0; $i <= 2; $i++) {
                    $data_status_penelitian = [
                        'id_penelitian'     =>      $data['id_penelitian'],
                        'status'            =>      $datastatus[$i]['deskripsi'],
                    ];
                    $this->db->table('status_penelitian')->insert($data_status_penelitian);
                }

                $data_status_penelitian = [
                    'id_penelitian'     =>      $data['id_penelitian'],
                    'status'            =>      $datastatus[8]['deskripsi'],
                ];
                $this->db->table('status_penelitian')->insert($data_status_penelitian);
            } elseif ($id_status == 10) {
                for ($i = 0; $i <= 5; $i++) {
                    $data_status_penelitian = [
                        'id_penelitian'     =>      $data['id_penelitian'],
                        'status'            =>      $datastatus[$i]['deskripsi'],
                    ];
                    $this->db->table('status_penelitian')->insert($data_status_penelitian);
                }
                $data_status_penelitian = [
                    'id_penelitian'     =>      $data['id_penelitian'],
                    'status'            =>      $datastatus[9]['deskripsi'],
                ];
                $this->db->table('status_penelitian')->insert($data_status_penelitian);
            }
            $this->db->table('penelitian')->insert($data);
        }
    }
}
