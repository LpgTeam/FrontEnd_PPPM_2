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

        .tabel table,
        .tabel tr,
        .tabel td {
            border: 1px solid;
            border-collapse: collapse;
        }

        .tabel tr,
        .tabel td {
            padding: 10px
        }

        h3 {
            padding-bottom: 10px;
        }

        u {
            padding-bottom: 10px;
        }

        body {
            margin: 40px;
        }
    </style>
</head>

<body>

    <u><b>P5. Luaran dan Target Capaian</b></u>
    <div class="text-center">
        <h3>LUARAN DAN TARGET CAPAIAN</h3>
    </div>
    <div class="tabel">
        <table>
            <tr>
                <td>NO</td>
                <td>JENIS LUARAN</td>
                <td>TARGET CAPAIAN</td>
                <td>JURNAL/KONFERENS YANG DITUJU*)</td>
            </tr>
            <?php $i = 1;
            foreach ($luaran as $key => $luar) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $luar['jenis_luaran']; ?></td>
                    <td><?= $luar['target_capaian']; ?></td>
                    <td><?= $luar['jurnal_tujuan']; ?></td>
                </tr>

            <?php $i++;
            endforeach ?>
        </table>
    </div>

    <p>*) tentative</p>


</body>

</html>