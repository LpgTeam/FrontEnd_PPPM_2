<? //= $this->extend('bau/fixed/templateReimburse') 
?>
<?= $this->extend('fixed/templateReimburse') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>Reimbursemen</h2>
                <hr>
                <p>Bagian Administrasi Umum Politeknik Statistika STIS</p>
            </header>
            <!-- ======= Proses Section ======= -->
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 justify-content-md-center">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue service-box1">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Reimbursemen</h3>
                            <p>
                                Proses pencairan dana reimbursemen yang diajukan dosen
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
                            <h5 class="card-title text-center">Proposal Reimbursemen PKM</h5>
                            <hr>
                            <p>Proposal Reimbursemen PKM yang diajukan dosen
                                oleh Direktur Politeknik Statistika STIS
                            </p>
                            <div class="d-flex justify-content-end">
                                <div class="text-end" style="margin-right: 10px">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#proposal">Proposal</button>
                                </div>
                            </div>
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
                            <div class="d-flex justify-content-end">
                                <div class="text-end">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#submit">Cairkan Dana</button>
                                </div>
                            </div>
                        </div>
                        <?php
                        } else if($reimburse['id_status'] == 2){
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
<div class="modal fade" id="submit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="submitLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="submitLabel">Pencairan Dana Reimburse</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin akan mencairkan dana reimburse proposal ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-danger" onclick="location.href='/acc-reimbursePKMBAU/<?= $reimburse['id_reimburse']; ?>'">Ya</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>