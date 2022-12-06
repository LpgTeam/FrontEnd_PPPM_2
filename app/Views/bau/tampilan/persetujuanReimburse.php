<?php //= $this->extend('bau/fixed/templateReimburse') 
?>
<?= $this->extend('fixed/templateReimburse') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>reimbursementPenelitian <?= $reimburse['jenis_penelitian'] ?></h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>

            <!-- ======= Proses Section ======= -->
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 justify-content-md-center">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue service-box1">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Reimbursemen</h3>
                            <p>
                                Proses pencairan dana reimbursementyang diajukan dosen
                                oleh Bagian Administrasi Umum Politeknik Statistika STIS
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <!-- End Proses -->

            <div class="row" data-aos="fade-up">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Proposal reimbursementPenelitian</h5>
                        <hr>
                        <ol>
                            <li>Judul Proposal &nbsp;&nbsp;&nbsp;&nbsp;: <?= $reimburse['judul_penelitian']; ?></li>
                            <li>Jenis Penelitian &nbsp;&nbsp; : <?= $reimburse['jenis_penelitian']; ?></li>
                        </ol>
                        <hr>

                        <!-- <div class="d-flex justify-content-end">
                            <div class="text-end" style="margin-right: 10px">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#loa">LOA</button>
                            </div>
                            <div class="text-end" style="margin-right: 10px">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#naskah">Naskah Artikel</button>
                            </div>
                            <div class="text-end" style="margin-right: 10px">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#invoice">Invoice</button>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-3">
                            <div class="text-end" style="margin-right: 10px">
                                <a href="/penelitian/download-proposal-akhir/<?= $reimburse['id_penelitian']; ?>/2" class="btn btn-primary">Download Proposal </a>
                            </div>
                        </div> -->
                        <?= $this->include('bau/tampilan/download_reimburse'); ?>

                        <!-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#proposal">Proposal</button> -->
                    </div>
                </div>
                <?php

                if ($reimburse['id_status'] == 1) {

                ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Pencairan Dana Reimburse</h5>
                            <hr>
                            <p>Pencairan dana reimburse yang diajukan dosen
                                oleh Bagian Administrasi Umum Politeknik Statistika STIS
                            </p>

                            <div class="row mb-3">
                                <label for="biayaDiajukan" class="col-md-4 col-lg-3 col-form-label">Biaya yang diajukan :
                                </label>
                                <div class="col-md-8 col-lg-9">
                                    <?php echo 'Rp ',  number_format($dana_penelitian, 0, ",", "."); ?>
                                </div>
                            </div>
                            <form action="<?= base_url('/acc-reimburseBAU/' . $reimburse['id_reimburse']); ?>" method="post">
                                <div class="row mb-3">
                                    <label for="biayaDicairkan" class="col-md-4 col-lg-3 col-form-label">Biaya yang
                                        dicairkan :</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="biayaDicairkan" type="number" class="form-control" id="biayaDicairkan">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#submit">Cairkan Dana</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php
                } else if ($reimburse['id_status'] == 2) {
                    ?>
                        <div class="main-timeline">
                            <div class="timeline">
                                <a href="#" class="timeline-content">
                                    <div class="timeline-year">Reimburse</div>
                                    <div class="timeline-icon"><i class="bi bi-bookmark-check"></i></div>
                                    <h3 class="title">Dana Reimburse Sudah Dicairkan</h3>
                                </a>
                            </div>
                        <?php
                    }
                        ?>
                        </div>
                    </div>
    </section>

</main>
<!-- End #main -->
<!-- Submit -->


<?= $this->endSection(); ?>