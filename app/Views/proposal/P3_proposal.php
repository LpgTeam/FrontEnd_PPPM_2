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

    <u><b>P3. Surat Pernyataan:</b></u>
    <div class="text-center">
        <h3>SURAT PERNYATAAN</h3>
    </div>

    Yang bertanda tangan di bawah ini

    <p>Nama : <?= $ketuapeneliti['nama_dosen'] ?></p>
    <p>NIDN : <?= $ketuapeneliti['NIP_dosen'] ?></p>
    <p>Jabatan Fungsional : <?= $ketuapeneliti['jabatan_dosen'] ?></p>

    <p>dengan ini menyatakan bahwa proposal penelitian saya yang berjudul:</p>
    <?= $penelitian['judul_penelitian']; ?>
    <p>Diusulkan dengan skema penelitian dosen tahun <?= date("Y"); ?> bersifat original dan belum pernah mendapatkan biaya/dibiayai oleh lembaga atau sumber biaya lainnya. Jika dikemudian hari ditemukan ketidaksesuaian dengan pernyataan ini, saya bersedia dituntut dan diproses sesuai dengan ketentuan yang berlaku dan mengembalikan seluruh biaya yang sudah saya terima.</p>

    <div class="row">
        <div class="col">
            <p>Jakarta,...</p>
            Ketua Peneliti
            <br>
            <br>
            <p><?= $ketuapeneliti['nama_dosen']; ?></p>
            <?= $ketuapeneliti['NIP_dosen']; ?>
        </div>
    </div>



</body>

</html>