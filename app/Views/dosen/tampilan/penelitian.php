<?= $this->extend('fixed/template')
?>
<? //= $this->extend('reviewer/fixed/template') 
?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"> -->
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
                            <div class="row mb-3">

                                <label class="col-md-4 col-lg-2 col-form-label btn btn-primary">Jenis Penelitian</label>
                                <div class="col-md-8 col-lg-4">
                                    <select class="form-select status-dropdown ">
                                        <option value="">Semua</option>
                                        <option value="1">Mandiri</option>
                                        <option value="2">Semi Mandiri</option>
                                        <option value="3">Di Danai Institusi</option>
                                        <option value="4">Institusi</option>
                                        <option value="5">Kerjasama</option>
                                    </select>
                                </div>

                                <label class="col-md-4 col-lg-2 col-form-label btn btn-primary">Status Penelitian</label>
                                <div class="col-md-8 col-lg-4">
                                    <select class="form-select status-dropdown2">
                                        <option value="">Semua</option>
                                        <option value="Diajukan oleh Dosen">Diajukan oleh Dosen </option>
                                        <option value="Disetujui oleh BAU">Disetujui oleh BAU </option>
                                        <option value="Disetujui oleh Reviewer">Disetujui oleh Reviewer</option>
                                        <option value="Disetujui oleh Kepala PPPM">Disetujui oleh Kepala PPPM</option>
                                        <option value="Disetujui oleh Direktur">Disetujui oleh Direktur</option>
                                        <option value="Kegiatan sedang berlangsung">Kegiatan sedang berlangsung</option>
                                        <option value="Kegiatan telah selesai dilaksanakan">Kegiatan telah selesai dilaksanakan</option>
                                        <option value="Ditolak oleh BAU">Ditolak oleh BAU</option>
                                        <option value="Ditolak oleh Reviewer">Ditolak oleh Reviewer</option>
                                        <option value="Ditolak Kepala PPPM">Ditolak Kepala PPPM</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="example" class="table table-responsive">
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
                                                <!-- <td><?//php echo $post['id_penelitian']
                                                    ?></td> -->
                                                <td><?php echo $i 
                                                            ?></td>

                                                <td>
                                                    <?php if ($post['jenis_penelitian'] == "Mandiri") {
                                                        echo "<p hidden >1</p>", $post['jenis_penelitian'];
                                                    } else if ($post['jenis_penelitian'] == "Semi Mandiri") {
                                                        echo "<p hidden >2</p>", $post['jenis_penelitian'];
                                                    } else if ($post['jenis_penelitian'] == "Di Danai Institusi") {
                                                        echo "<p hidden >3</p>", $post['jenis_penelitian'];
                                                    } else if ($post['jenis_penelitian'] == "Institusi") {
                                                        echo "<p hidden >4</p>", $post['jenis_penelitian'];
                                                    } else if ($post['jenis_penelitian'] == "Kerjasama") {
                                                        echo "<p hidden >5</p>", $post['jenis_penelitian'];
                                                    } ?></p>
                                                </td>
                                                <td><?php echo $post['tanggal_pengajuan'] ?></td>
                                                <td><?php echo $post['judul_penelitian'] ?></td>
                                                <td><?php echo $post['status_pengajuan'] ?></td>
                                                <td>
                                                    <!-- <a class="btn btn-primary" onclick="location.href='/penelitianSemiMandiri1'"><i class="bi bi-pencil-square"></i></a> -->
                                                    <?php
                                                    if ($post['jenis_penelitian'] == 'Mandiri' || $post['jenis_penelitian'] == 'Kerjasama') {
                                                        echo "<button type='button' class='btn btn-secondary' disabled><i class='bi bi-pencil-square'></i></button>";
                                                    } else {
                                                        if ($post['id_status'] == 1 || $post['id_status'] == 2 || $post['id_status'] == 3 || $post['id_status'] == 4 || $post['id_status'] == 7 || $post['id_status'] == 8 || $post['id_status'] == 9) { ?>
                                                            <a href="/penelitianProses1/<?= $post['id_penelitian']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                        <?php
                                                        } else if (($post['id_status'] == 5) && ($post['jenis_penelitian'] == "Semi Mandiri")) { ?>
                                                            <a href="/penelitianProses2/<?= $post['id_penelitian']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                        <?php
                                                        } else if (($post['id_status'] == 5)) { ?>
                                                            <a href="/penelitianProses2Kontrak/<?= $post['id_penelitian']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                        <?php
                                                        } else if ($post['id_status'] == 6) { ?>
                                                            <a href="/penelitianProses3/<?= $post['id_penelitian']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                        <?php
                                                        } else if (($post['id_status'] == 10)) { ?>
                                                            <a href="/penelitianProses4/<?= $post['id_penelitian']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                        <?php
                                                        }
                                                        ?>



                                                        <!-- echo "<a class='btn btn-primary' href='/penelitianSemiMandiri1'><i class='bi bi-pencil-square'></i></a>"; -->
                                                </td>
                                            </tr>
                                        <?php }
                                                    $i++;    ?>
                                <?php endforeach;
                                    } ?>
                                </tbody>
                            </table>
                        </div>




                        <script>
                            $(document).ready(function() {
                                dataTable = $("#example").DataTable({
                                    order: [[2, 'desc']],
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