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

    <div class="text-center">
        <h2>FORM USULAN KEGIATAN</h2>
        <h2>PENGABDIAN KEPADA MASYARAKAT (PKM) TAHUN <?= date("Y"); ?></h2>
    </div>

    <ol type="A">
        <li>PENGUSUL KEGIATAN PKM</li>
        <p>Ketua</p>
        <table>
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
        <p>Anggota</p>
        <table>
            <?php foreach ($timpkm as $key => $anggota) : ?>
                <tr>
                    <td>Nama</td>
                    <td>: <?= $anggota["nama"]; ?></td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td>: <?= $anggota["nip"]; ?></td>
                </tr>
                <tr>
                    <td>Pangkat/Golongan</td>
                    <td>: <?= $anggota["pangkat"] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>


        <li>TOPIK</li>
        <li>BENTUK KEGIATAN</li>
        <li>WAKTU, TEMPAT DAN SASARAN</li>
        <table>
            <tr>
                <td>Waktu Pelaksanaan</td>
                <td>:</td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td>:</td>
            </tr>
            <tr>
                <td>Sasaran</td>
                <td>:</td>
            </tr>
            <tr>
                <td>Perkiraan/target jumlah peserta</td>
                <td>:</td>
            </tr>
        </table>
        <li>HASIL/TARGET YANG DIHARAPKAN</li>
        <li>PEMBIAYAAN/LAINYA YANG DIAJUKAN*)</li>
        onprogress
    </ol>

    <div style="page-break-before: always;">
        <table class="ttd1">
            <tr>
                <td>........................</td>
                <td>........................</td>
                <td>........................</td>
            </tr>
            <tr>
                <td>Mengetahui</td>
                <td>Jakarta, ...............</td>
                <td>Jakarta, <?= $pkm['tanggal_pengajuan']; ?></td>
            </tr>
            <tr>
                <td>Kepala PPPM</td>
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
                <td>Dr. Eng. Arie Wahyu Wijayanto, M.T.</td>
                <td>(Nama Lengkap)</td>
                <td></td>
            </tr>
            <tr>
                <td>NIDN : .................</td>
                <td>NIDN : .................</td>
                <td>NIDN : </tdt>
            </tr>
        </table>
    </div>
</body>

</html>