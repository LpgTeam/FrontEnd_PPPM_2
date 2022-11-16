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

        table,
        tr,
        td {
            border: 1px solid;
            border-collapse: collapse;
        }
    </style>
</head>

<body>

    <u><b>P4. Tugas Tim Peneliti</b></u>
    <div class="text-center">
        <h3>TUGAS/PERAN TIM PENELITI</h3>
    </div>

    <table>
        <tr>
            <td>NO</td>
            <td>NAMA PENELITI</td>
            <td>BIDANG KEAHLIAN</td>
            <td>TUGAS/PERAN DALAM PENELITIAN</td>
        </tr>
        <?php $i = 1;
        foreach ($timpeneliti as $key => $peneliti) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $peneliti['namaPeneliti']; ?></td>
                <td><?= $peneliti['bidang_keahlian']; ?></td>
                <td><?= $peneliti['peran']; ?></td>
            </tr>

        <?php $i++;
        endforeach ?>
    </table>



</body>

</html>