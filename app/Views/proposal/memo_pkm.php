<?php
setlocale(LC_TIME, 'INDONESIA');
?>
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
        .ttd3 tr:nth-child(4) {
            color: white;
        }

        table {
            width: 100%;
        }
    </style>
</head>

<body>

    <!-- <u><b><//?= $jenis; ?>3. Surat Pernyataan:</b></u> -->
    <div class="text-center">
        <h3>MEMO</h3>
    </div>


    <p>KEPADA:</p>
    <p>Kabag Administrasi Umum</p>
    <p>Polstat STIS</p>

    <p class="isi">Mohon diberikan bantuan pembiayaan untuk pelaksanaan pengabdian kepada masyarakat a.n. .......[Nama Dosen]..... yang dilakukan di ..[Nama tempat].... pada tanggal ...[Waktu pelaksanaan].. dengan tema ..[Tema kegiatan].. dan peserta dari ...[Asal peserta secara umum]..dengan jumlah biaya sebesar ...[Biaya]...
        Dokumen pendukung terlampir bersama memo ini..</p>


    <table class="ttd3">
        <tr>
            <td>........................</td>
            <td>........................</td>
            <td>........................</td>
        </tr>
        <tr>
            <td>Jakarta, <?= date("d F  Y", strtotime($pkm['tanggal_pengajuan'])); ?></td>
            <td>Jakarta, ...............</td>
            <td>Jakarta, ...............</td>
        </tr>
        <tr>
            <td>Ketua Peneliti</td>
            <td>Ketua Peneliti</td>
            <td>Ketua Peneliti</td>
        </tr>
        <tr>
            <td>
                <img src="https://kuliahdimana.id/public/beasiswa/297fcb98a506bf9e5c9f2904caf54b6e.jpg" width="100">
                <!-- <img src="<//?= base_url("") ?>/assets/img/<//?= $penelitian['tanda_tangan']; ?>" alt="stis" width="120" /> -->
            </td>
            <td></td>
            <td>a</td>
        </tr>
        <tr>
            <td></td>
            <td>(Nama Lengkap)</td>
            <td>(Nama Lengkap)</td>
        </tr>
        <tr>
            <td></td>
            <td>NIDN : .................</td>
            <td>NIDN : .................</td>
        </tr>
    </table>
</body>

</html>