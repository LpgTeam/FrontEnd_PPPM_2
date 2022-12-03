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

    <u><b>
        <?= $jenis; ?>1. Halaman Sampul:</b></u>
    <div class="text-center">
        <h2>USULAN PENELITIAN</h2>

        <h2><?= $penelitian['judul_penelitian'] ?></h2>

        <div class="logo">
            <img src="https://kuliahdimana.id/public/beasiswa/297fcb98a506bf9e5c9f2904caf54b6e.jpg" width="250">
            <!-- <img src="assets/img/STIS.png" alt="dfsd" /> -->
            <!-- <img src="<?= base_url("") ?>/assets/img/STIS.png" alt="stis" width="250" /> -->
        </div>


        <h4>Oleh:</h4>
        <?php foreach ($timpeneliti as $key => $peneliti) : ?>
            <h4><?= $peneliti['namaPeneliti']; ?></h4>
        <?php endforeach ?>


        <div class="footer">
            <h2>PUSAT PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT</h2>
            <h2>POLITEKNIK STATISTIKA STIS</h2>
            <h2>JAKARTA <?= date("Y"); ?></h2>
        </div>

    </div>
</body>

</html>