
<?= $this->extend('fixed/templatePenelitian') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>Penelitian Semi Mandiri</h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>
            <!-- ======= Proses Section ======= -->
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 d-flex justify-content-center">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue service-box1">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Proposal</h3>
                            <p>
                                Proses peninjauan dan persetujuan proposal penelitian
                                yang diajukan oleh dosen
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-box orange">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Pendanaan</h3>
                            <p>
                                Pendanaan untuk kegiatan publikasi dari penelitian yang
                                dilakukan oleh dosen
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-box green">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Laporan</h3>
                            <p>
                                Pelaporan hasil kegiatan penelitain yang dilakukan oleh dosen
                            </p>
                        </div>
                    </div>


                </div>
            </div>
            <br>
            <br>
            <!-- End Proses -->

            <div class="row" data-aos="fade-up">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Proposal</h5>
                            <hr>
                            <p>(Judul Proposal) Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a
                                type specimen book. It has survived not only five centuries, but also the
                                leap into electronic typesetting, remaining essentially unchanged. It was
                                popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum </p>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-secondary">Lihat Proposal </button>
                                <button class="btn btn-primary">Download Proposal </button>
                            </div>
                            <hr>
                            <?= $this->include('proposal/download_per_proposal'); ?>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <!-- Section: Timeline
                            <ul class="timeline-with-icons">
                                <li class="timeline-item mb-5">
                                    <span class="timeline-icon">
                                        <i class="fas fa-rocket text-primary fa-sm fa-fw"></i>
                                    </span>

                                    <h5 class="fw-bold">Proposal</h5>
                                    <p class="text-muted">
                                        Proposal sedang direview oleh reviewer
                                    </p>
                                </li>

                                <li class="timeline-item mb-5">

                                    <span class="timeline-icon">
                                        <i class="fas fa-hand-holding-usd text-primary fa-sm fa-fw"></i>
                                    </span>
                                    <h5 class="fw-bold">Proposal</h5>
                                    <p class="text-muted">
                                        Proposal telah disetujui oleh reviewer
                                    </p>
                                </li>

                                <li class="timeline-item mb-5">

                                    <span class="timeline-icon">
                                        <i class="fas fa-users text-primary fa-sm fa-fw"></i>
                                    </span>
                                    <h5 class="fw-bold">Proposal</h5>
                                    <p class="text-muted">
                                        Proposal sedang ditinjau oleh reviewer
                                    </p>
                                </li>

                                <li class="timeline-item mb-5">

                                    <span class="timeline-icon">
                                        <i class="fas fa-money-bill-wave text-primary fa-sm fa-fw"></i>
                                    </span>
                                    <h5 class="fw-bold">Proposal</h5>
                                    <p class="text-muted">
                                        Proposal disetujui oleh Kepala PPPM
                                    </p>
                                </li>

                                <li class="timeline-item mb-5">

                                    <span class="timeline-icon">
                                        <i class="fas fa-money-bill-wave text-primary fa-sm fa-fw"></i>
                                    </span>
                                    <h5 class="fw-bold">Proposal</h5>
                                    <p class="text-muted">
                                        Proposal ditandatangani oleh Direktur Polstat STIS
                                    </p>
                                </li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
    </section>

</main>
<!-- End #main -->
<?= $this->endSection(); ?>