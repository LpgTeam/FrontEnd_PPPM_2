<?php

namespace App\Libraries;

use App\Controllers\BaseController;

class SendEmail extends BaseController
{
    // public function send_email_persetujuan($AccOrRjcBy, $roleSebelum, $roleSesudah)
    public function send_email_pemberitahuan($jenis, $ppm, $timppm)
    {
        //ppm = penelitian pengabdian masyrakat
        //set ke siapa aja emailnya dikirim
        $LpgTeam = [
            1 => '222011295@stis.ac.id', 2 => '222011361@stis.ac.id', 3 => '222011453@stis.ac.id', 4 => '222011494@stis.ac.id',
            5 => '222011537@stis.ac.id', 6 => '222011596@stis.ac.id', 7 => 'aljaffarsyah10@gmail.com', 8 => 'lpgteam6@gmail.com'
        ];
        // $LpgTeam = [1 => 'aljaffarsyah10@gmail.com', 2 => 'aljaffarsyah10@gmail.com', 3 => 'aljaffarsyah10@gmail.com', 4 => 'aljaffarsyah10@gmail.com', 5 => 'aljaffarsyah10@gmail.com', 6 => 'aljaffarsyah10@gmail.com'];
        // $LpgTeam = [1 => 'aljaffarsyah10@gmail.com'];
        $email = \Config\Services::email();
        for ($i = 1; $i <= 8; $i++) {
            $email->setFrom('lpgteam6@gmail.com');

            $email->setTo($LpgTeam[$i]);

            if ($jenis == "penelitian") {
                $email->setSubject('Update Penelitian ' . $ppm['judul_penelitian'] . ' ' . $ppm['status_pengajuan']);
                $email->setMessage(
                    '<p>Kepada</p> <p>' . $LpgTeam[$i] . '</p> <p>di tempat</p><br><br>
                        <p>Penelitian dengan judul ' . $ppm['judul_penelitian'] . ' yang diajukan oleh ' .
                        $timppm[0]['namaPeneliti'] . ' pada tanggal ' . date("d F Y", strtotime($ppm['tanggal_pengajuan']))
                        . ' telah ' . strtolower($ppm['status_pengajuan']) . '</p>'
                        . '<p>Bagi pihak yang bersangkutan diharapkan memeriksa website <a href="https://pengajuan.stis.ac.id">pengajuan.stis.ac.id</a>
                     untuk informasi lebih lanjut</p>'
                );
            } elseif ($jenis == "pkm") {
                $email->setSubject('Update Pengabdian Kepada Masyarakat ' . $ppm['topik_kegiatan'] . ' ' . strtolower($ppm['status']));
                $email->setMessage(
                    '<p>Kepada</p> <p>' . $LpgTeam[$i] . '</p> <p>di tempat</p><br><br>
                        <p>Pengabdian Kepada Masyarakat dengan topik ' . $ppm['topik_kegiatan'] . ' yang diajukan oleh ' .
                        $timppm[0]['nama'] . ' pada tanggal ' . date("d F Y", strtotime($ppm['tanggal_pengajuan']))
                        . ' telah ' . strtolower($ppm['status']) . '</p>'
                        . '<p>Bagi pihak yang bersangkutan diharapkan memeriksa website <a href="https://pengajuan.stis.ac.id">pengajuan.stis.ac.id</a>
                     untuk informasi lebih lanjut</p>'
                );
            };
            $email->send();
            if ($email->send()) {
                echo 'Email successfully sent';
            } else {
                $data = $email->printDebugger(['headers']);
                print_r($data);
            }
        }
    }
}
