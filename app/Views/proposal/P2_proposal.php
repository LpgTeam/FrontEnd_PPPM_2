<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $penelitian['judul_penelitian']; ?></title>
    <style>
        .text-center {
            text-align: center;
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


    <div class="row">
        <div class="col-">
            <p>Mengetahui</p>
            Kepala PPPM
            <br>
            <br>

            <p>Arie Wahyu</p>
            NIDN

        </div>
        <hr>
        <div class="col">
            <p>Jakarta,...</p>
            Ketua Peneliti
            <br>
            <br>
            <p><?= $ketuapeneliti['nama_dosen']; ?></p>
            <?= $ketuapeneliti['NIP_dosen']; ?>
        </div>
        <hr>
        <div class="col">
            <p>Menyetujui</p>
            Direktur Politeknik Statistika STIS
            <br>
            <br>
            <p>Erni Tri Astuti</p>
            NIDN

        </div>
    </div>


</body>

</html>