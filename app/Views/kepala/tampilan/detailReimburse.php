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
                                Reimbursemen penelitian yang diajukan oleh Dosen
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
                        <h5 class="card-title text-center">Reimbursemen Penelitian</h5>
                        <hr>
                        <ol>
                            <li>Judul Proposal &nbsp;&nbsp;&nbsp;&nbsp;: <?= $reimburse['judul_penelitian']; ?></li>
                            <li>Jenis Penelitian &nbsp;&nbsp; : <?= $reimburse['jenis_penelitian']; ?></li>
                        </ol>
                        <hr>
                        <?= $this->include('bau/tampilan/download_reimburse'); ?>
                    </div>
                </div>
            </div>


    </section>

</main>
<!-- End #main -->
<?= $this->endSection(); ?>