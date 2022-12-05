<? //= $this->extend('direktur/fixed/templatePenelitian') 
?>
<?= $this->extend('fixed/templateReimburse') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>REIMBURSEMEN</h2>
                <hr>
                <p>Kepala PPPM Politeknik Statistika STIS</p>
            </header>
            <!-- ======= Proses Section ======= -->
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 justify-content-md-center">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue service-box1">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Reimbursemen</h3>
                            <p>
                                Reimbursement penelitian yang diajukan oleh Dosen
                                Politeknik Statistika STIS
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
                        <p>Proposal reimbursement PKM yang diajukan Dosen
                            Politeknik Statistika STIS
                        </p>
                        <div class="d-flex justify-content-end">
                            <div class="text-end" style="margin-right: 10px">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#proposal">Proposal</button>
                            </div>
                        </div>
                    </div>
                </div>


    </section>

</main>
<!-- End #main -->
<?= $this->endSection(); ?>