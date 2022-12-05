<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PkmKepalaPPPM extends Seeder
{
    public function run()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pengajuan_pkm');
        $builder->selectMax('ID_pkm');
        $query = $builder->get();
        $datapkm = $query->getResultArray();

        $builder2 = $db->table('detailstatus_pkm');
        $query2 = $builder2->get();
        $datastatus = $query2->getResultArray();

        $builder3 = $db->table('dosen');
        $query3 = $builder3->get();
        $datadosen = $query3->getResultArray();

        $builder4 = $db->table('dosen');
        $query = $builder4->getWhere(['NIP_dosen' => nipKepalaPPPM]);
        $datadosen_ketuapkm = $query->getResultArray();

        //fill tabel pkm
        $faker = \Faker\Factory::create('id_ID');
        for ($k = 1; $k <= 100; $k++) {
            $data = [
                'ID_pkm'                => $k + $datapkm[0]['ID_pkm'],
                'jenis_pkm'             => $faker->randomElement($array = array("Mandiri", "Kelompok", "Terstruktur")),
                'topik_kegiatan'        => $faker->realText($maxNbChars = 50, $indexSize = 2),
                'bentuk_kegiatan'       => $faker->randomElement($array = array("Seminar", "Webinar", "Sosialisasi")),
                'waktu_kegiatan'        => Time::createFromTimestamp($faker->unixTime()),
                'tempat_kegiatan'       => $faker->address,
                'sasaran'               => $faker->randomElement($array = array('Masyarakat umum', 'Mahasiswa')),
                'target_peserta'        => $faker->numberBetween($min = 10, $max = 250),
                'hasil'                 => $faker->randomElement($array = array("Berhasil", "Sukses")),
                'tanggal_pengajuan'     => Time::createFromTimestamp($faker->unixTime()),
                'id_status'             => $faker->numberBetween($min = 1, $max = 7),
                'jumlah_anggota'        => $faker->randomElement($array = array(1, 2, 3)),
                'alasan' => $faker->randomElement($array = array('-','','tidak ada alasan')),
                'id_status_reimburse'   => $faker->numberBetween($min = 0, $max = 2),
            ];

            if ($data['id_status'] == 1) $data['status'] = $datastatus[0]['Deskripsi'];
            elseif ($data['id_status'] == 2) $data['status'] = $datastatus[1]['Deskripsi'];
            elseif ($data['id_status'] == 3) $data['status'] = $datastatus[2]['Deskripsi'];
            elseif ($data['id_status'] == 4) $data['status'] = $datastatus[3]['Deskripsi'];
            elseif ($data['id_status'] == 5) $data['status'] = $datastatus[4]['Deskripsi'];
            elseif ($data['id_status'] == 6) $data['status'] = $datastatus[5]['Deskripsi'];
            elseif ($data['id_status'] == 7) $data['status'] = $datastatus[6]['Deskripsi'];


            //fill tabel timpkm
            //ketua
            // $dosen = $faker->randomElement($array = $datadosen);
            $dosen = $datadosen_ketuapkm[0];
            $dataketua = [
                'id_pkm'            => $data['ID_pkm'],
                'nip'               => $dosen['NIP_dosen'],
                'nama'              => $dosen['nama_dosen'],
                'peran'             => 'Ketua PKM',
                'bidang_keahlian'   => $faker->randomElement($array = array('IT', 'Metodologi', 'Machine Learning', 'Data Science', 'Statistika', 'Data Mining')),
                'pangkat'           => $dosen['golongan']
            ];
            $this->db->table('tim_pkm')->insert($dataketua);

            //anggota
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

            //fill tabel pkm
            $file_surat_pernyataan = null;
            $file_bukti_kegiatan = null;

            // if ($data['jenis_pkm'] == 'Semi Mandiri') {
            $file_surat_pernyataan = 'default_surat_pernyataan.pdf';
            // } else {
            $file_bukti_kegiatan = 'default_bukti_kegiatan.pdf';
            // }

            $data_pkm = [
                'id_pkm'            =>  $data['ID_pkm'],
                'surat_pernyataan'  =>  $file_surat_pernyataan,
                'bukti_kegiatan'    =>  $file_bukti_kegiatan,
            ];
            $this->db->table('pkm')->insert($data_pkm);


            // fill table status pkm
            $id_status = $data['id_status'];
            if ($id_status <= 4) {
                for ($i = 0; $i < $data['id_status']; $i++) {
                    $data_status_pkm = [
                        'id_pkm'     =>      $data['ID_pkm'],
                        'status'     =>      $datastatus[$i]['Deskripsi'],
                    ];
                    $this->db->table('status_pkm')->insert($data_status_pkm);
                }
            } else if ($id_status == 5) {
                $data_status_pkm = [
                    'ID_pkm'     =>      $data['ID_pkm'],
                    'status'     =>      $datastatus[0]['Deskripsi'],
                ];
                $this->db->table('status_pkm')->insert($data_status_pkm);
                $data_status_pkm = [
                    'id_pkm'     =>      $data['ID_pkm'],
                    'status'     =>      $datastatus[4]['Deskripsi'],
                ];
                $this->db->table('status_pkm')->insert($data_status_pkm);
            } elseif ($id_status == 6) {
                for ($i = 0; $i <= 1; $i++) {
                    $data_status_pkm = [
                        'id_pkm'     =>      $data['ID_pkm'],
                        'status'     =>      $datastatus[$i]['Deskripsi'],
                    ];
                    $this->db->table('status_pkm')->insert($data_status_pkm);
                }
                $data_status_pkm = [
                    'id_pkm'     =>      $data['ID_pkm'],
                    'status'     =>      $datastatus[5]['Deskripsi'],
                ];
                $this->db->table('status_pkm')->insert($data_status_pkm);
            } elseif ($id_status == 7) {
                for ($i = 0; $i <= 2; $i++) {
                    $data_status_pkm = [
                        'id_pkm'     =>      $data['ID_pkm'],
                        'status'     =>      $datastatus[$i]['Deskripsi'],
                    ];
                    $this->db->table('status_pkm')->insert($data_status_pkm);
                }

                $data_status_pkm = [
                    'id_pkm'     =>      $data['ID_pkm'],
                    'status'     =>      $datastatus[6]['Deskripsi'],
                ];
                $this->db->table('status_pkm')->insert($data_status_pkm);
            }

            $this->db->table('pengajuan_pkm')->insert($data);
        }
    }
}
