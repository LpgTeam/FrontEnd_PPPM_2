<?= $this->extend('kepala/fixed/template') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 hero-img " data-aos="zoom-out" data-aos-delay="200">
                    <img src="assets/img/STIS.png" class="img-fluid" alt="" />
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="text-center">
                    <h1 data-aos="fade-up">
                        PPPM POLITEKNIK STATISTIKA STIS
                    </h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">
                        Website Pengelolaan Penelitian dan Pengabdian Kepada Masyarakat
                        Kepala PPPM Politeknik Statistika STIS
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <section class="section profile">
        <div class="row" data-aos="fade-up">
            <header class="section-header2">
                <h2>Profil</h2>
                <hr>
                <p>Kepala PPPM Politeknik Statistika STIS</p>
            </header>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="assets/img/yellow.png" alt="Profile" class="rounded-circle" />
                        <h2>Dr. Eng. Arie Wahyu Wijayanto, M.T.</h2>
                        <h3>Lektor</h3>
                        <div class="social-links mt-2">
                            <p>
                                <i class="bi bi-envelope-fill">&nbsp ariewahyu@stis.ac.id</i>
                            </p>
                            <p class="twitter">
                                <i class="bi bi-phone">&nbsp 0832-1232-2414</i>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">
                                    Profil Kepala PPPM
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Detail Profil</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nama Lengkap</div>
                                    <div class="col-lg-9 col-md-8">
                                        Dr. Eng. Arie Wahyu Wijayanto, S.S.T., M.T.
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">
                                        Minat Penelitian
                                    </div>
                                    <div class="col-lg-9 col-md-8">
                                        <ul>
                                            <li>Big Data</li>
                                            <li>Deep Learning</li>
                                            <li>Data Mining</li>
                                            <li>Remote Sensing</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">
                                        Jabatan Fungsional
                                    </div>
                                    <div class="col-lg-9 col-md-8">
                                        Lorem ipsum dolor sit amet. Aut odio blanditiis
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Program Studi</div>
                                    <div class="col-lg-9 col-md-8">
                                        D-IV Komputasi Statistik
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nomor Handphone</div>
                                    <div class="col-lg-9 col-md-8">0832-1232-2414</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">ariewahyu@stis.ac.id</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Google Scholar</div>
                                    <div class="col-lg-9 col-md-8">
                                        Lorem ipsum dolor sit amet. Aut odio blanditiis
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Link Sinta</div>
                                    <div class="col-lg-9 col-md-8">
                                        Lorem ipsum dolor sit amet. Aut odio blanditiis
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Link Orcid</div>
                                    <div class="col-lg-9 col-md-8">
                                        Lorem ipsum dolor sit amet. Aut odio blanditiis
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Link WOS</div>
                                    <div class="col-lg-9 col-md-8">
                                        Lorem ipsum dolor sit amet. Aut odio blanditiis
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Link Scopus</div>
                                    <div class="col-lg-9 col-md-8">
                                        Lorem ipsum dolor sit amet. Aut odio blanditiis
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Bordered Tabs -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
<?= $this->endSection(); ?>