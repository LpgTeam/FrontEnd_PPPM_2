<?= $this->extend('fixed/template')
?>
<? //= $this->extend('reviewer/fixed/template') 
?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <section class="section">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>Penelitian</h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>
        </div>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert" data-aos="zoom-in">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <div class="row" data-aos="fade-up">
            <div class="">
                <div class="card">
                    <div class="card-body">
                        <a href="/penelitianjenisDosen" class="btn-pilih">Tambah Penelitian <i class="bi bi-plus-square"></i></a>
                        <p>&nbsp;</p>
                        <!-- Table with stripped rows -->
                        <div class="content">
                            <div class="row mb-3 justify-content-md-start">
                                <div class="input-group-prepend col-md-4 col-lg-2">
                                    <div class=" btn btn-primary">Jenis Penelitian</div>
                                </div>
                                <select class="form-control status-dropdown col-md-8 col-lg-4">
                                    <option value="">Semua</option>
                                    <option value="Mandiri">Mandiri</option>
                                    <option value="Semi Mandiri">Semi Mandiri</option>
                                    <option value="Di Danai Institusi">Di Danai Institusi</option>
                                    <option value="Institusi">Institusi</option>
                                    <option value="Kerjasama">Kerjasama</option>
                                </select>

                                <div class="input-group-prepend col-md-4 col-lg-2">
                                    <div class=" btn btn-primary">Status Penelitian</div>
                                </div>

                                <select class="form-control status-dropdown2 col-md-8 col-lg-4">
                                    <option value="">Semua</option>
                                    <option value="Proposal diajukan">Proposal diajukan</option>
                                    <option value="Proposal disetujui oleh Reviewer">Proposal disetujui oleh Reviewer</option>
                                    <option value="Proposal disetujui oleh Kepala PPPM">Proposal disetujui oleh Kepala PPPM</option>
                                    <option value="Proposal disetujui oleh Direktur">Proposal disetujui oleh Direktur</option>
                                    <option value="Pendanaan">Pendanaan</option>
                                    <option value="Kontrak">Kontrak</option>
                                    <option value="Laporan">Laporan</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                            </div>

                            <table id="example" class="table">
                                <thead>
                                    <tr class="table-primary">
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Jenis Penelitian</th>
                                        <th scope="col">Tanggal Pengajuan</th>
                                        <th scope="col">Judul Penelitian</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!$penelitian == null) {
                                        $i = 1; ?>
                                        <?php foreach ($penelitian as $key => $post) :  ?>

                                            <tr>
                                                <!-- <td><?php //echo $post['id_penelitian'] 
                                                            ?></td> -->
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $post['jenis_penelitian'] ?></td>
                                                <td><?php echo $post['tanggal_pengajuan'] ?></td>
                                                <td><?php echo $post['judul_penelitian'] ?></td>
                                                <td><?php echo $post['status_pengajuan'] ?></td>
                                                <td>
                                                    <!-- <a class="btn btn-primary" onclick="location.href='/penelitianSemiMandiri1'"><i class="bi bi-pencil-square"></i></a> -->
                                                    <?php
                                                    if ($post['jenis_penelitian'] == 'Mandiri' || $post['jenis_penelitian'] == 'Kerjasama') {
                                                        echo "<button type='button' class='btn btn-secondary' disabled><i class='bi bi-pencil-square'></i></button>";
                                                    } else {
                                                        if ($post['id_status'] == 1) { ?>
                                                            <a href="/penelitianProses1/<?= $post['id_penelitian']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                        <?php
                                                        } else if (($post['id_status'] == 2) && ($post['jenis_penelitian'] == "Semi Mandiri")) { ?>
                                                            <a href="/penelitianProses2/<?= $post['id_penelitian']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                        <?php
                                                        } else if (($post['id_status'] == 2)) { ?>
                                                            <a href="/penelitianProses2Kontrak/<?= $post['id_penelitian']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                        <?php
                                                        } else if ($post['id_status'] == 3) { ?>
                                                            <a href="/penelitianProses3/<?= $post['id_penelitian']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                        <?php
                                                        } else if ($post['id_status'] == 4) { ?>
                                                            <a href="/penelitianProses4/<?= $post['id_penelitian']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                    <?php
                                                        }
                                                    }
                                                    ?>



                                                    <!-- echo "<a class='btn btn-primary' href='/penelitianSemiMandiri1'><i class='bi bi-pencil-square'></i></a>"; -->
                                                </td>
                                            </tr>
                                            <?php $i++;    ?>
                                    <?php endforeach;
                                    } ?>
                                </tbody>
                            </table>
                        </div>


                        <script>
                            $(document).ready(function() {
                                dataTable = $("#example").DataTable({});

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