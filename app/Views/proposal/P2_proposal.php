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
            2. Bidang : <?= $penelitian['bidang'] ?>
        </li>
        <li>
            3. Ketua Tim Peneliti
            <ol type="a">
                <li>
                    Nama Lengkap
                </li>
                <li>
                    Jabatan Fungsional
                </li>
                <li>
                    Program Studi
                </li>
                <li>
                    Nomor HP
                </li>
                <li>
                    Email
                </li>
            </ol>
        <li>
            Jumlah Anggota : .... orang
            <ol type="a">
                <li>Nama Anggota I :
                    Program Studi
                </li>
                <li>
                    Nama Anggota II :
                    Program Studi
                </li>
            </ol>
        </li>
    </ol>


    Mengetahui


</body>

</html>