<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $penelitian['judul_penelitian']; ?></title>
    <link rel="stylesheet" href="/public/assets/vendor/bootstrap/css/bootstrap.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <style>
        .text-center {
            text-align: center;
        }

        .container,
        .container-fluid,
        .container-xxl,
        .container-xl,
        .container-lg,
        .container-md,
        .container-sm {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            width: 100%;
            padding-right: calc(var(--bs-gutter-x) * 0.5);
            padding-left: calc(var(--bs-gutter-x) * 0.5);
            margin-right: auto;
            margin-left: auto;
        }

        @media (min-width: 576px) {

            .container-sm,
            .container {
                max-width: 540px;
            }
        }

        @media (min-width: 768px) {

            .container-md,
            .container-sm,
            .container {
                max-width: 720px;
            }
        }

        @media (min-width: 992px) {

            .container-lg,
            .container-md,
            .container-sm,
            .container {
                max-width: 960px;
            }
        }

        @media (min-width: 1200px) {

            .container-xl,
            .container-lg,
            .container-md,
            .container-sm,
            .container {
                max-width: 1140px;
            }
        }

        @media (min-width: 1400px) {

            .container-xxl,
            .container-xl,
            .container-lg,
            .container-md,
            .container-sm,
            .container {
                max-width: 1320px;
            }
        }

        .row {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(-1 * var(--bs-gutter-y));
            margin-right: calc(-0.5 * var(--bs-gutter-x));
            margin-left: calc(-0.5 * var(--bs-gutter-x));
        }

        .row>* {
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            padding-right: calc(var(--bs-gutter-x) * 0.5);
            padding-left: calc(var(--bs-gutter-x) * 0.5);
            margin-top: var(--bs-gutter-y);
        }

        .col-5 {
            flex: 0 0 auto;
            width: 41.66666667%;
        }

        .col-6 {
            flex: 0 0 auto;
            width: 50%;
        }

        .col-7 {
            flex: 0 0 auto;
            width: 58.33333333%;
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
            line-height: 32px;
        }

        .ttd1 td:nth-child(2),
        .ttd2 td:nth-child(1),
        .ttd2 td:nth-child(3) {
            color: white;
        }

        .ttd1 tr:nth-child(1),
        .ttd2 tr:nth-child(1),
        .ttd1 tr:nth-child(4),
        .ttd2 tr:nth-child(4),
        .ttd1 tr:nth-child(5),
        .ttd2 tr:nth-child(5) {
            color: white;
        }

        table {
            width: 100%;
        }
    </style>
</head>

<body>

    <u><b>P2. Halaman Pengesahan:</b></u>
    <div class="text-center">
        <h3>HALAMAN PENGESAHAN</h3>
        <H3>PROPOSAL PENELITIAN DOSEN</H3>
    </div>

    <ol>
        <li>
            Judul Penelitian : <?= $penelitian['judul_penelitian'] ?>
        </li>
        <li>
            Bidang : <?= $penelitian['bidang'] ?>
        </li>
        <li>
            Ketua Tim Peneliti
            <ol type="a">
                <li>
                    Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?= $timpeneliti[0]['namaPeneliti']; ?>
                </li>
                <li>
                    Jabatan Fungsional &nbsp;: <?= $ketuapeneliti['jabatan_dosen']; ?>
                </li>
                <li>
                    Program Studi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $ketuapeneliti['program_studi']; ?>
                </li>
                <li>
                    Nomor HP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $ketuapeneliti['no_hp']; ?>
                </li>
                <li>
                    Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $ketuapeneliti['email_dosen']; ?>
                </li>
            </ol>
        <li>
            Jumlah Anggota : ... orang
            <ol type="a">
                <?php foreach ($timpeneliti as $key => $peneliti) : ?>
                    <li>Nama Anggota &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $peneliti['namaPeneliti']; ?></li>
                    Program Studi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $peneliti['programStudi']; ?>
                <?php endforeach ?>
                <!-- <li>Nama Anggota I :
                    Program Studi
                </li>
                <li>
                    Nama Anggota II :
                    Program Studi
                </li> -->
            </ol>
        </li>
    </ol>

    <!-- <div class="container">
        <div class="row align-items-start">
            <div class="col-5">
                <p>Mengetahui</p>
                Kepala PPPM
                <br>
                <br>

                <p>Arie Wahyu</p>
                NIDN

            </div>
            <div class="col-5">
                <p>Jakarta,...</p>
                Ketua Peneliti
                <br>
                <br>
                <p><?= $ketuapeneliti['nama_dosen']; ?></p>
                <?= $ketuapeneliti['NIP_dosen']; ?>
            </div>
            <div class="col-5">
                <p>Menyetujui</p>
                Direktur Politeknik Statistika STIS
                <br>
                <br>
                <p>Erni Tri Astuti</p>
                NIDN
            </div>
        </div>
    </div> -->

    <div style="page-break-before: always;">
        <table class="ttd1">
            <tr>
                <td>........................</td>
                <td>........................</td>
                <td>........................</td>
            </tr>
            <tr>
                <td>Mengetahui</td>
                <td>Jakarta, ...............</td>
                <td>Jakarta, <?= $penelitian['tanggal_pengajuan']; ?></td>
            </tr>
            <tr>
                <td>Kepala PPPM</td>
                <td>Ketua Peneliti</td>
                <td>Ketua Peneliti</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>a</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>a</td>
            </tr>
            <tr>
                <td>Dr. Eng. Arie Wahyu Wijayanto, M.T.</td>
                <td>(Nama Lengkap)</td>
                <td><?= $ketuapeneliti['nama_dosen']; ?></td>
            </tr>
            <tr>
                <td>NIDN : .................</td>
                <td>NIDN : .................</td>
                <td>NIDN : <?= $ketuapeneliti['NIP_dosen']; ?></tdt>
            </tr>
        </table>

        <br>

        <table class="ttd2">
            <tr>
                <td>........................</td>
                <td>........................</td>
                <td>........................</td>
            </tr>
            <tr>
                <td></td>
                <td>Menyetujui</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Direktur Politeknik Statistika STIS</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>a</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>a</td>
            </tr>
            <tr>
                <td></td>
                <td>Dr. Erni Tri Astuti, M.Math.</td>
                <td></td>
            </tr>
            <tr>
                <td>NIDN : .................</td>
                <td>NIDN : .................</td>
                <td>NIDN : .................</td>
            </tr>
        </table>
    </div>

</body>

</html>