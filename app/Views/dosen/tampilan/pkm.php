<? //= $this->extend('dosen/fixed/template') 
?>
<?= $this->extend('fixed/template') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <section class="section">
        <div class="container" data-aos="fade-up">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert" data-aos="zoom-in-right">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger" role="alert" data-aos="zoom-in-right">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <header class="section-header2">
                <h2>Pengabdian Kepada Masyarakat</h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="">
                <div class="card">
                    <h5>&nbsp;</h5>
                    <div class="card-body">
                        <a href="/pkmjenisDosen" class="btn-pilih">Tambah PKM <i class="bi bi-plus-square"></i></a>
                        <p>&nbsp;</p>
                        <!-- Table with stripped rows -->

                        <div class="content">
                            <div class="row mb-3">

                                <?= $this->include('filter/jenisPKM'); ?>

                                <?= $this->include('filter/prosesPKM'); ?>

                            </div>

                            <div class="table-responsive">
                                <table id="example" class="table">
                                    <thead>
                                        <tr class="table-primary">
                                            <th scope="col">Nomor</th>
                                            <th scope="col">Jenis PKM</th>
                                            <th scope="col">Tanggal Pengajuan</th>
                                            <th scope="col">Judul PKM</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!$pkm == null) {
                                            $i = 1; ?>
                                            <?php foreach ($pkm as $key => $post) :  ?>

                                                <tr>
                                                    <!-- <td><?php //echo $post['id_penelitian'] 
                                                                ?></td> -->
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $post['jenis_pkm'] ?></td>
                                                    <td><?php echo $post['tanggal_pengajuan'] ?></td>
                                                    <td><?php echo $post['topik_kegiatan'] ?></td>
                                                    <td><?php echo $post['status'] ?></td>
                                                    <td>
                                                        <!-- <a class="btn btn-primary" onclick="location.href='/penelitianSemiMandiri1'"><i class="bi bi-pencil-square"></i></a> -->
                                                        <?php
                                                        // if ($post['jenis_pkm'] == 'Mandiri') {
                                                        //     echo "<button type='button' class='btn btn-secondary' disabled><i class='bi bi-pencil-square'></i></button>";
                                                        // } else {
                                                        //     echo "<a class='btn btn-primary' href='/penelitianSemiMandiri1'><i class='bi bi-pencil-square'></i></a>";
                                                        // }
                                                        if ($post['id_status'] == 1 || $post['id_status'] == 2 ||  $post['id_status'] == 5 || $post['id_status'] == 6) { ?>
                                                            <a href="/pkmProses1/<?= $post['ID_pkm']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                            <?php
                                                        } else if ($post['id_status'] == 3) {
                                                            if ($post['jenis_pkm'] == 'Mandiri') { ?>
                                                                <a href="/pkmProses4/<?= $post['ID_pkm']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                            <?php } else { ?>
                                                                <a href="/pkmProses2/<?= $post['ID_pkm']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                            <?php   }
                                                        } else if ($post['id_status'] == 4) {
                                                            if ($post['jenis_pkm'] == 'Mandiri') { ?>
                                                                <a href="/pkmProses1/<?= $post['ID_pkm']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                            <?php } else { ?>
                                                                <a href="/pkmProses3/<?= $post['ID_pkm']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                            <?php }
                                                        } else if ($post['id_status'] == 7) { ?>
                                                            <a href="/pkmProses4/<?= $post['ID_pkm']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                        <?php $i++;
                                            endforeach;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>


                            <script>
                                $(document).ready(function() {
                                    dataTable = $("#example").DataTable({
                                        order: [
                                            [2, 'desc']
                                        ],
                                    });

                                    $('.status-dropdown').on('change', function(e) {
                                        var status = $(this).val();
                                        $('.status-dropdown').val(status)
                                        console.log(status)
                                        //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
                                        dataTable.column(1).search(status).draw();
                                    })

                                    $('.status-dropdown2').on('change', function(e) {
                                        var status = $(this).val();
                                        $('.status-dropdown2').val(status)
                                        console.log(status)
                                        //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
                                        dataTable.column(4).search(status).draw();
                                    })
                                });
                            </script>


                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>

        <script>

        </script>
    </section>

</main>
<!-- End #main -->
<?= $this->endSection(); ?>