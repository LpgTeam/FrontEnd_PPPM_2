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

            body {
                text-align: justify;
                line-height: 16px;
                margin: 40px;
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
        </style>
    </head>

    <body style="margin-top: 0;">
        <!-- KOP Surat -->
        <div >
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
        <table >
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
                <td>: <?= date('d F Y',strtotime($pkm['waktu_kegiatan'])); ?> </td>
            </tr>
        </table>
        <br>
        <div class="text-center" >
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
                        <img src="https://kuliahdimana.id/public/beasiswa/297fcb98a506bf9e5c9f2904caf54b6e.jpg" width="100">
                        <!-- <img src="<//?= base_url("") ?>/assets/img/<//?= $penelitian['tanda_tangan'];?>" alt="stis" width="120" /> -->
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
        <!-- </div> -->
    </body>

    </html>
<?php endforeach; ?>