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
                    Nama Lengkap : <?= $timpeneliti[0]['namaPeneliti']; ?>
                </li>
                <li>
                    Jabatan Fungsional : <?= $ketuapeneliti['jabatan_dosen']; ?>
                </li>
                <li>
                    Program Studi : <?= $ketuapeneliti['program_studi']; ?>
                </li>
                <li>
                    Nomor HP : <?= $ketuapeneliti['no_hp']; ?>
                </li>
                <li>
                    Email : <?= $ketuapeneliti['email_dosen']; ?>
                </li>
            </ol>
        <li>
            Jumlah Anggota : ... orang
            <ol type="a">
                <?php foreach ($timpeneliti as $key => $peneliti) : ?>
                    <li>Nama Anggota : <?= $peneliti['namaPeneliti']; ?></li>
                    Program Studi : <?= $peneliti['programStudi']; ?>
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

    <div class="container">
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
    </div>

</body>

</html>