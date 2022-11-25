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

        body {
            text-align: justify;
            line-height: 24px;
            font-size: 16px;
            margin: 40px;
        }

        .tebal,
        ol li {
            font-weight: 800;
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

        .isi {
            line-height: 24px;
        }
    </style>
</head>

<body>

    <div class="text-center">
        <h3>FORM USULAN KEGIATAN</h3>
        <h3>PENGABDIAN KEPADA MASYARAKAT (PKM) TAHUN <?= date("Y"); ?></h3>
    </div>


    <ol type="A">
        <li>PENGUSUL KEGIATAN PKM</li>
        <p class="tebal">Ketua</p>
        <table class="isi">
            <tr>
                <td>Nama</td>
                <td>: <?= $timpkm[0]["nama"]; ?></td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>: <?= $timpkm[0]["nip"]; ?></td>
            </tr>
            <tr>
                <td>Pangkat/Golongan</td>
                <td>: <?= $timpkm[0]["pangkat"] ?></td>
            </tr>
        </table>
        <p class="tebal">Anggota (boleh lebih dari satu)</p>
        <table class="isi">
            <?php foreach ($timpkm as $key => $anggota) : ?>
                <tr>
                    <td style="width: 45%;">Nama</td>
                    <td>: <?= $anggota["nama"]; ?></td>
                </tr>
                <tr>
                    <td style="width: 45%;">NIP</td>
                    <td>: <?= $anggota["nip"]; ?></td>
                </tr>
                <tr>
                    <td style="width: 45%;">Pangkat/Golongan</td>
                    <td>: <?= $anggota["pangkat"] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>

        <li>TOPIK</li>
        <p>Tuliskan Topik</p>
        <br>

        <li>BENTUK KEGIATAN</li>
        <p>Tuliskan Bentuk Kegiatan</p>
        <br>

        <li>WAKTU, TEMPAT DAN SASARAN</li>
        <table class="isi">
            <tr>
                <td style="width: 45%;">Waktu Pelaksanaan</td>
                <td>: (___________)</td>
            </tr>
            <tr>
                <td style="width: 45%;">Tempat</td>
                <td>: (___________)</td>
            </tr>
            <tr>
                <td style="width: 45%;">Sasaran</td>
                <td>: (___________)</td>
            </tr>
            <tr>
                <td style="width: 45%;">Perkiraan/target jumlah peserta</td>
                <td>: (___________)</td>
            </tr>
        </table>
        <br>

        <li>HASIL/TARGET YANG DIHARAPKAN</li>
        <p>Tuliskan hasil dan target</p>
        <br>

        <li>PEMBIAYAAN/LAINYA YANG DIAJUKAN*)</li>
        <p>Tulis Pembiayaan</p>
        <br>
    </ol>

    <div style="page-break-before: always;">
        <table class="ttd1">
            <tr>
                <td>........................</td>
                <td>........................</td>
                <td>........................</td>
            </tr>
            <tr>
                <td>Disetujui</td>
                <td>Jakarta, ...............</td>
                <td>Diajukan Oleh</td>
            </tr>
            <tr>
                <td>Kepala PPPM</td>
                <td>Ketua Peneliti</td>
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
                <td>Dr. Eng. Arie Wahyu Wijayanto, M.T.</td>
                <td>(Nama Lengkap)</td>
                <td>Nama Dosen Pengaju</td>
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