<? //= $this->extend('direktur/fixed/template') 
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
            <header class="section-header2">
                <h2>REIMBURSEMENT</h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>
        </div>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <div class="row" data-aos="fade-up">
            <div class="">
                <div class="card">
                    <h5>&nbsp;</h5>
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <div class="content">
                            <div class="row mb-3">

                                <label class="col-md-4 col-lg-2 col-form-label btn btn-primary">Jenis Penelitian/PKM</label>
                                <div class="col-md-8 col-lg-4">
                                    <select class="form-select status-dropdown ">
                                        <option value="">Semua</option>
                                        <option value="2">Penelitian Semi Mandiri</option>
                                        <option value="3">Penelitian Didanai Institusi</option>
                                        <option value="4">Penelitian Institusi</option>
                                        <option value="5">Penelitian Kerjasama</option>
                                        <option value="Kelompok">PKM Kelompok/Dosen</option>
                                        <option value="Terstruktur">PKM Terstruktur</option>
                                    </select>
                                </div>


                                <label class="col-md-4 col-lg-2 col-form-label btn btn-primary">Status Reimbursement</label>

                                <div class="col-md-8 col-lg-4">
                                    <select class="status-dropdown2 form-select">
                                        <option value="">Semua</option>
                                        <option value="Reimbursement belum diajukan">Reimbursement belum diajukan</option>
                                        <option value="Reimbursement dalam proses">Reimbursement dalam proses</option>
                                        <option value="Reimbursement telah dicairkan">Reimbursement telah dicairkan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="example" class="table table-responsive">
                                    <thead>
                                        <tr class="table-primary">
                                            <!-- <th scope="col">Nomor</th> -->
                                            <th scope="col">Jenis Penelitian/PKM</th>
                                            <th scope="col">Tanggal Pengajuan</th>
                                            <th scope="col">Judul Penelitian/Topik PKM</th>
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
                                                    <td>
                                                        <?php if ($post['jenis_penelitian'] == "Mandiri") {
                                                            echo "<p hidden >1</p>", $post['jenis_penelitian'];
                                                        } else if ($post['jenis_penelitian'] == "Semi Mandiri") {
                                                            echo "<p hidden >2</p>", $post['jenis_penelitian'];
                                                        } else if ($post['jenis_penelitian'] == "Didanai Institusi") {
                                                            echo "<p hidden >3</p>", $post['jenis_penelitian'];
                                                        } else if ($post['jenis_penelitian'] == "Institusi") {
                                                            echo "<p hidden >4</p>", $post['jenis_penelitian'];
                                                        } else if ($post['jenis_penelitian'] == "Kerjasama") {
                                                            echo "<p hidden >5</p>", $post['jenis_penelitian'];
                                                        } ?></p>
                                                    </td>
                                                    <td><?php echo $post['tanggal_pengajuan'] ?></td>
                                                    <td><?php echo $post['judul_penelitian'] ?></td>
                                                    <td>
                                                        <?php if ($post['id_status_reimburse'] == 0) {
                                                            echo 'Reimbursement belum diajukan';
                                                        } else if ($post['id_status_reimburse'] == 1) {
                                                            echo 'Reimbursement dalam proses';
                                                        } else if ($post['id_status_reimburse'] == 2) {
                                                            echo 'Reimbursement telah dicairkan';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="/detailReimburseDosen/<?= $post['id_penelitian']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $i++;    ?>
                                        <?php endforeach;
                                        } ?>
                                        <?php
                                        if (!$pkm == null) {
                                            $i = 1; ?>
                                            <?php foreach ($pkm as $key => $post) :  ?>

                                                <tr>
                                                    <!-- <td><?php //echo $post['id_penelitian'] 
                                                                ?></td> -->

                                                    <td><?php echo 'PKM ', $post['jenis_pkm'] ?></td>
                                                    <td><?php echo $post['tanggal_pengajuan'] ?></td>
                                                    <td><?php echo $post['topik_kegiatan'] ?></td>
                                                    <td>
                                                        <?php if ($post['id_status_reimburse'] == 0) {
                                                            echo 'Reimbursement belum diajukan';
                                                        } else if ($post['id_status_reimburse'] == 1) {
                                                            echo 'Reimbursement dalam proses';
                                                        } else if ($post['id_status_reimburse'] == 2) {
                                                            echo 'Reimbursemen telah dicairkan';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <!-- <a class="btn btn-primary" onclick="location.href='/penelitianSemiMandiri1'"><i class="bi bi-pencil-square"></i></a> -->
                                                        <a href="detailReimburse2Dosen/<?= $post['ID_pkm']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
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
                                    dataTable = $("#example").DataTable({});

                                    $('.status-dropdown').on('change', function(e) {
                                        var status = $(this).val();
                                        $('.status-dropdown').val(status)
                                        console.log(status)
                                        //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
                                        dataTable.column(0).search(status).draw();
                                    })

                                    $('.status-dropdown2').on('change', function(e) {
                                        var status = $(this).val();
                                        $('.status-dropdown2').val(status)
                                        console.log(status)
                                        //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
                                        dataTable.column(3).search(status).draw();
                                    })
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>

    </section>
    <!-- <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script> -->
</main>
<!-- End #main -->
<?= $this->endSection(); ?>