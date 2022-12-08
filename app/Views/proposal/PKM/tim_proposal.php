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

    <!-- <u><b><//?= $jenis; ?>4. Tugas Tim Peneliti</b></u> -->
    <div class="text-center">
        <h3>TUGAS/PERAN TIM PKM</h3>
    </div>

    <div class="tabel">
        <table>
            <tr>
                <td>NO</td>
                <td>NAMA PENELITI</td>
                <td>BIDANG KEAHLIAN</td>
                <td>TUGAS/PERAN DALAM PKM</td>
            </tr>
            <?php $i = 1;
            foreach ($timpkm as $key => $peneliti) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $peneliti['nama']; ?></td>
                    <td><?= $peneliti['bidang_keahlian']; ?></td>
                    <td><?= $peneliti['peran']; ?></td>
                </tr>

            <?php $i++;
            endforeach ?>
        </table>
    </div>



    <div id="footer_page">
        <p class="page"></p>
    </div>
</body>

</html>