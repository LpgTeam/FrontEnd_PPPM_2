<?= $this->extend('dosen/fixed/template') ?>

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
                        Dosen Politeknik Statistika STIS
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
                <p>Dosen Politeknik Statistika STIS</p>
            </header>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="assets/img/yellow.png" alt="Profile" class="rounded-circle" />
                        <h2>Joko Sasono S.S.T., M.T.</h2>
                        <h3>Lektor</h3>
                        <div class="social-links mt-2">
                            <p>
                                <i class="bi bi-envelope-fill">&nbsp JokoSason@stis.ac.id</i>
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
                                    Profil Dosen
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Detail Profil</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nama Lengkap</div>
                                    <div class="col-lg-9 col-md-8">
                                        Joko Sasono S.S.T., M.T.
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">
                                        Minat Penelitian
                                    </div>
                                    <div class="col-lg-9 col-md-8">Matematika dan Data Mining
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
                                    <div class="col-lg-3 col-md-4 label">
                                        NIP
                                    </div>
                                    <div class="col-lg-9 col-md-8">
                                        197218367829453287
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
                                    <div class="col-lg-9 col-md-8">JokoSason@stis.ac.id</div>
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
                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form>
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="assets/img/yellow.png" alt="Profile">
                                            <div class="pt-2">
                                                <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="namaLengkap" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="namaLengkap" type="text" class="form-control" id="namaLengkap">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="minat" class="col-md-4 col-lg-3 col-form-label">Minat Penelitian</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="minat" type="text" class="form-control" id="minat">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="jabatan" class="col-md-4 col-lg-3 col-form-label">Jabartan Fungsional</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="jabatan" type="text" class="form-control" id="jabatan" readonly style="background: #E8E8E8;">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="nip" class="col-md-4 col-lg-3 col-form-label">NIP</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="nip" type="text" class="form-control" id="nip" readonly style="background: #E8E8E8;">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="progStudi" class="col-md-4 col-lg-3 col-form-label">Program Studi</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="progStudi" type="text" class="form-control" id="progStudi" readonly style="background: #E8E8E8;">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="hp" class="col-md-4 col-lg-3 col-form-label">Nomot Handphone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="hp" type="text" class="form-control" id="hp">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="email">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="scholar" class="col-md-4 col-lg-3 col-form-label">Google Scholar</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="scholar" type="text" class="form-control" id="scholar">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="sinta" class="col-md-4 col-lg-3 col-form-label">Link Sinta</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="sinta" type="text" class="form-control" id="sinta">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="orcid" class="col-md-4 col-lg-3 col-form-label">Link Orcid</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="orcid" type="text" class="form-control" id="orcid">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="wos" class="col-md-4 col-lg-3 col-form-label">Link WOS</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="wos" type="text" class="form-control" id="wos">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="scopus" class="col-md-4 col-lg-3 col-form-label">Link Scopus</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="scopus" type="text" class="form-control" id="scopus">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

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