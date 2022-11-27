<?php
$i = 1;
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
        </style>
    </head>

    <body>
        <!-- KOP Surat -->
        <div>
            <!-- <span class="logo"> -->
            <img src="https://kuliahdimana.id/public/beasiswa/297fcb98a506bf9e5c9f2904caf54b6e.jpg" width="80">
            <!-- <img src="assets/img/STIS.png" alt="dfsd" /> -->
            <!-- <img src="<? //= base_url("assets/img/STIS.png"); 
                            ?>" alt="stis" /> -->
            <!-- </span> -->
            <b>
                POLITEKNIK STATISTIKA STIS<br>
                Jl. Otto Iskandardinata No. 64C, Jakarta 13330<br>
                Telp. (021) 8508812, 8191437, Fax. 8197577<br>
                Website: www.stis.ac.id, Email: info@stis.ac.id
            </b>
            <hr>

        </div>
        <div class="text-center">
            <u>
                <h4>USULAN PENELITIAN</h4>
            </u>
            <p>Nomor : PKM/<?= $pkm['ID_pkm'] . '/' . $i;
                            $i++; ?> </p>
        </div>

        <p>Yang bertanda tangan di bawah ini : </p>
        <p class="text-center"><b>KEPALA PUSAT PENELITIAN DAN PENGABDIAN MASYARAKAT
                POLITEKNIK STATISTIKA STIS</b></p>

        <p>Memberikan keterangan bahwa : </p>

        <table>
            <tr>
                <td>Nama</td>
                <td>: <?= $anggota['nama'] ?></td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>: <?= $anggota['nip'] ?></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
            </tr>
        </table>



        <p>
            <span>Telah Melaksanakan : </span><span>Pengabdian Kepada Masyarakat
                Narasumber pada kegiatan …………………………………. Kegiatan ini diselenggarakan oleh ...................... dalam rangka ......................
            </span>
        </p>
        <p>
            Waktu Pelaksanaan : <?= $pkm['waktu_kegiatan']; ?>
        </p>
        <div class="text-center">
            Jakarta, ....................... <br>
            Politeknik Statistika STIS<br>
            Kepala Pusat Penelitian dan Pengabdian Masyarakat
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <p><u>Dr. Eng. Arie Wahyu Wijayanto, M.T.</u></p>
            <u>NIP. 198512222009021002</u>

        </div>
        <!-- </div> -->
    </body>

    </html>
<?php endforeach ?>