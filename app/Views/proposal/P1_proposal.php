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

    <u><b>P1. Halaman Sampul:</b></u>
    <div class="text-center">
        <h1>USULAN PENELITIAN</h1>

        <h2><?= $penelitian['judul_penelitian'] ?></h2>
        <hr>
        logo stis
        <!-- <img src="<?= base_url('assets/img/STIS.png'); ?>" width="100"> -->

        <hr>


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