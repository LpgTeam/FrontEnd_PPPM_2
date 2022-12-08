<? //= $this->extend('dosen/fixed/template') 
?>
<?= $this->extend('fixed/template') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section class="section">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>REIMBURSEMENT</h2>
                <hr>
                <p>Admin PPPM Politeknik Statistika STIS</p>
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
                    <h5>&nbsp;</h5>
                    <div class="card-body">
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


                        <!-- Table with stripped rows -->
                        <table class="table table-advance table-hover align-middle datatable">
                            <thead>
                                <tr class="table-primary">
                                    <th scope="col">Jenis Penelitian/PKM</th>
                                    <th scope="col">Tanggal Pengajuan</th>
                                    <th scope="col">Judul Penelitian/Topik PKM</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!$reimburse == null) {
                                    $i = 1; ?>
                                    <?php foreach ($reimburse as $key => $post) :
                                        if($post['id_penelitian'] != NULL) {
                                           
                                    ?>
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
                                                        <a href="/detailReimburseAdmin/<?= $post['id_reimburse']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                    </td>
                                                </tr>
                                                <?php $i++;    ?>
                                            <?php } else if ($post['id_pkm'] != NULL) {

                                            ?>
                                                <tr>

                                                    <td><?php echo 'PKM ', $post['jenis_pkm'] ?></td>
                                                    <td><?php echo $post['tanggal_pengajuan'] ?></td>
                                                    <td><?php echo $post['judul_pkm'] ?></td>
                                                    <td>
                                                        <?php if ($post['id_status'] == 0) {
                                                            echo 'Reimbursement belum diajukan';
                                                        } else if ($post['id_status'] == 1) {
                                                            echo 'Reimbursement dalam proses';
                                                        } else if ($post['id_status'] == 2) {
                                                            echo 'Reimbursement telah dicairkan';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="/detailReimburse2Admin/<?= $post['id_reimburse']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>




                                                        <!-- echo "<a class='btn btn-primary' href='/penelitianSemiMandiri1'><i class='bi bi-pencil-square'></i></a>"; -->
                                                    </td>
                                                </tr>
                                    <?php $i++;
                                            }
                                        endforeach;
                                    } ?>

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

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