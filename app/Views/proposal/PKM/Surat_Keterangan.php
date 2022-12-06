<?php
$i = 0;
foreach ($peneliti as $key => $anggota) : ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $pkm['topik_kegiatan']; ?></title>
        <style>
            .text-center {
                text-align: center;
            }

            .logo {
                margin: 8em;
            }

            body h2 {
                font-size: 20px;
                font-weight: 700;
                text-transform: uppercase;
            }

            body h4 {
                line-height: 16px;
                font-weight: lighter;
                font-size: 16px;
            }

            .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                text-align: center;
            }


            body {
                text-align: justify;
                line-height: 32px;
                font-size: 16px;
                margin: 40px;

                counter-increment: pageplus1, page;
                counter-reset: pageplus1 1;
            }

            .ttd1 td,
            .ttd2 td,
            .ttd1 th,
            .ttd2 th {
                text-align: center;
                line-height: 32px1
            }


            .ttd1 td:nth-child(1),
            .ttd1 td:nth-child(2),
            .ttd2 td:nth-child(1),
            .ttd2 td:nth-child(3) {
                color: white;
            }

            .ttd1 tr:nth-child(1),
            .ttd2 tr:nth-child(1),
            .ttd2 tr:nth-child(4),
            .ttd1 tr:nth-child(4),
            .ttd1 tr:nth-child(5) {
                color: white;
            }

            table {
                width: 100%;
            }

            #footer {
                position: fixed;
                left: 20px;
                bottom: 0;
                text-align: center;
            }

            #footer .page:after {
                content: counter(page);
            }

            #footer .pageplus1:after {
                content: counter(pageplus1);
            }
        </style>
    </head>

    <body style="margin-top: 0;">
        <!-- KOP Surat -->
        <div>
            <table>
                <tr>
                    <td width="20%"> <img src="https://kuliahdimana.id/public/beasiswa/297fcb98a506bf9e5c9f2904caf54b6e.jpg" width="100"></td>
                    <td><b> POLITEKNIK STATISTIKA STIS<br>
                            Jl. Otto Iskandardinata No. 64C, Jakarta 13330<br>
                            Telp. (021) 8508812, 8191437, Fax. 8197577<br>
                            Website: www.stis.ac.id, Email: info@stis.ac.id</b></td>
                </tr>
            </table>
            <!-- <span class="logo"> -->
            <hr>
        </div>
        <div class="text-center">
            <u>
                SURAT KETERANGAN
            </u>
            <p style="margin-top : 0; ">Nomor : <?= $no_surat[$i]['no_surat'];
                                                $i++; ?> </p>
        </div>

        <p>Yang bertanda tangan di bawah ini : </p>
        <p class="text-center"><b>KEPALA PUSAT PENELITIAN DAN PENGABDIAN MASYARAKAT
                POLITEKNIK STATISTIKA STIS</b></p>
        <p style="margin-bottom : 0; margin-top:0;">Memberikan keterangan bahwa : </p>
        <table>
            <tr>
                <td width="40%">Nama</td>
                <td>: <?= $anggota['nama'] ?></td>
            </tr>
            <tr>
                <td width="40%">NIP</td>
                <td>: <?= $anggota['nip'] ?></td>
            </tr>
            <tr>
                <td width="40%">Jabatan</td>
                <td>: <?php if ($anggota['jabatan_dosen'] != null) {
                            echo $anggota['jabatan_dosen'];
                        } else {
                            echo 'Mahaisiswa';
                        } ?></td>
            </tr>
            <tr>
                <td width="40%">Telah Melaksanakan </td>
                <td>: <b>Pengabdian Kepada Masyarakat</b></td>
            </tr>

            <tr>
                <td width="40%"></td>
                <td>Narasumber pada kegiatan <b><?= $rincian['narasumber'] ?></b></td>
            </tr>
            <tr>
                <td width="40%"></td>
                <td>Kegiatan ini diselenggarakan oleh <b><?= $rincian['penyelenggara'] ?></b> dalam rangka <b>Kegiatan PKM</b></td>
            </tr>

            <tr>
                <td width="40%">Waktu Pelaksanaan</td>
                <td>: <?= date('d F Y', strtotime($pkm['waktu_kegiatan'])); ?> </td>
            </tr>
        </table>
        <br>
        <div class="text-center">
            <table class="ttd1">
                <tr>
                    <td width="25%"></td>
                    <td width="25%"></td>
                    <td></td>
                </tr>
                <tr>
                    <td width="25%"></td>
                    <td width="25%"></td>
                    <td>Jakarta, <?= date("d F Y", strtotime($no_surat[0]['created_at'])); ?></td>
                </tr>
                <tr>
                    <td width="25%"></td>
                    <td width="25%"></td>
                    <td>Politeknik Statistika STIS</td>
                </tr>
                <tr>
                    <td width="25%"></td>
                    <td width="25%"></td>
                    <td></td>
                </tr>
                <tr>
                    <td width="25%"></td>
                    <td width="25%"></td>
                    <td>
                        <?php if ($settingTTD['id_setting'] == '1') { ?>
                            <img src="https://kuliahdimana.id/public/beasiswa/297fcb98a506bf9e5c9f2904caf54b6e.jpg" width="80">
                            <!-- <img src="<//?= base_url("") ?>/ttd_dosen/manual/ttdKepala.png" alt="stis" width="120" /> -->
                        <?php } elseif ($settingTTD['id_setting'] == '2') { ?>
                            <img width="80" src="data:image/jpeg;base64,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" width="80">
                            <!-- <img src="<//?= base_url("") ?>/ttd_dosen/digital/ttdKepala.png" alt="stis" width="120" /> -->
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td width="25%"></td>
                    <td width="25%"></td>
                    <td>Dr. Eng. Arie Wahyu Wijayanto, M.T.</td>
                </tr>
                <tr>
                    <td width="25%"></td>
                    <td width="25%"></td>
                    <td>NIP. 198512222009021002</tdt>
                </tr>
            </table>

        </div>
        <div id="footer">
            <p class="page"></p>
        </div>
        <!-- </div> -->
    </body>

    </html>
<?php endforeach; ?>