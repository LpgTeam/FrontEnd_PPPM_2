<? //= $this->extend('direktur/fixed/templatePenelitian') 
?>
<?= $this->extend('fixed/templateReimburse') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>Reimbursement PKM <?= $reimburse['jenis_pkm'] ?></h2>
                <hr>
                <p>Direktur Politeknik Statistika STIS</p>
            </header>
            <!-- ======= Proses Section ======= -->
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 justify-content-md-center">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue service-box1">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Reimbursement</h3>
                            <p>
                                Reimbursement PKM yang diajukan oleh Dosen
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
                        <h5 class="card-title text-center">Proposal Reimbursement PKM</h5>
                        <hr>
                        <ol>
                            <li>Topik Kegiatan &nbsp;&nbsp;&nbsp;&nbsp;: <?= $reimburse['judul_pkm']; ?></li>
                            <li>Jenis PKM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $reimburse['jenis_pkm']; ?></li>
                            <li>Biaya Dicairkan &nbsp;&nbsp;&nbsp;: Rp <?= number_format($reimburse['biaya_dicairkan'], 0, ",", "."); ?></li>
                        </ol>
                        <div class="d-flex justify-content-end ms-1">
                            <a href="/pkm/download-memo-pkm/<?= $reimburse['id_pkm']; ?>" class="btn btn-warning">Download Memo Kepala PPPM </a>
                            <a href="/pkm/download-laporan/<?= $reimburse['id_pkm']; ?>" class="btn btn-success">Download Formulir Pengajuan</a>
                        </div>
                    </div>
                </div>


    </section>

</main>
<!-- End #main -->
<?= $this->endSection(); ?>