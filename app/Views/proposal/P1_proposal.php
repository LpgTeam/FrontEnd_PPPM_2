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
    </style>
</head>

<body>

    <u><b>P1. Halaman Sampul:</b></u>
    <div class="text-center">
        <h1>USULAN PENELITIAN</h1>

        <h2><?= $penelitian['judul_penelitian'] ?></h2>

        <div class="logo">
            <img src="https://kuliahdimana.id/public/beasiswa/297fcb98a506bf9e5c9f2904caf54b6e.jpg" width="250">
            <!-- <img src="assets/img/STIS.png" alt="dfsd" /> -->
            <!-- <img src="<?= base_url("assets/img/STIS.png"); ?>" alt="stis" /> -->
        </div>


        <h4>Oleh:</h4>
        <?php foreach ($timpeneliti as $key => $peneliti) : ?>
            <h4><?= $peneliti['namaPeneliti']; ?></h4>
        <?php endforeach ?>


        <h1>PUSAT PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT</h1>
        <h2>POLITEKNIK STATISTIKA STIS</h2>
        <h2>JAKARTA <?= date("Y"); ?></h2>
    </div>
</body>

</html>