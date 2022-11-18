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

        body p {
            text-align: justify;
            line-height: 32px;
            font-size: 16px;

        }

        body {
            margin: 40px;
        }

        .isi {
            margin-top: 0;
            margin-bottom: 0;

        }

        tr,
        td {
            line-height: 32px;
        }

        .ttd3 td,
        .ttd3 th {
            text-align: center;
            line-height: 32px;
        }

        .ttd3 td:nth-child(2),
        .ttd3 td:nth-child(3) {
            color: white;
        }

        .ttd3 tr:nth-child(1),
        .ttd3 tr:nth-child(4),
        .ttd3 tr:nth-child(5) {
            color: white;
        }

        table {
            width: 100%;
        }
    </style>
</head>

<body>

    <u><b>P3. Surat Pernyataan:</b></u>
    <div class="text-center">
        <h3>SURAT PERNYATAAN</h3>
    </div>

    Yang bertanda tangan di bawah ini

    <table>
        <tr>
            <td>Nama</td>
            <td>: <?= $ketuapeneliti['nama_dosen'] ?></td>
        </tr>
        <tr>
            <td>NIDN</td>
            <td>: <?= $ketuapeneliti['NIP_dosen'] ?></td>
        </tr>
        <tr>
            <td>Jabatan Fungsional</td>
            <td>: <?= $ketuapeneliti['jabatan_dosen'] ?></td>
        </tr>
    </table>

    <p class="isi">Dengan ini menyatakan bahwa proposal penelitian saya yang berjudul: <?= $penelitian['judul_penelitian']; ?>
        yang diusulkan dengan skema penelitian dosen tahun <?= date("Y"); ?> bersifat original dan belum pernah mendapatkan
        biaya/dibiayai oleh lembaga atau sumber biaya lainnya. Jika dikemudian hari ditemukan ketidaksesuaian dengan pernyataan ini,
        saya bersedia dituntut dan diproses sesuai dengan ketentuan yang berlaku dan mengembalikan seluruh biaya yang sudah saya terima.</p>


    <table class="ttd3">
        <tr>
            <td>........................</td>
            <td>........................</td>
            <td>........................</td>
        </tr>
        <tr>
            <td>Jakarta, ...............</td>
            <td>Jakarta, ...............</td>
            <td>Jakarta, ...............</td>
        </tr>
        <tr>
            <td>Ketua Peneliti</td>
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
            <td><?= $ketuapeneliti['nama_dosen']; ?></td>
            <td>(Nama Lengkap)</td>
            <td>(Nama Lengkap)</td>
        </tr>
        <tr>
            <td>NIDN : <?= $ketuapeneliti['NIP_dosen']; ?></tdt>
            <td>NIDN : .................</td>
            <td>NIDN : .................</td>
        </tr>
    </table>
</body>

</html>