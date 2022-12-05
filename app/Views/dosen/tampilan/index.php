<? //= $this->extend('dosen/fixed/template') 
?>
<?= $this->extend('/fixed/template') ?>

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
                        <!-- <img src="assets/img/yellow.png" alt="Profile" class="rounded-circle" /> -->
                        <?php if ($loginUser['foto_dosen'] == null) {
                        ?><img src="assets/img/yellow.png" alt="Profile">
                        <?php } else {
                        ?>
                            <img src="/foto_profil/<?= $loginUser['foto_dosen']; ?>" alt="Profile">
                        <?php } ?>
                        <h2><?= $loginUser['nama_dosen']; ?></h2>
                        <h3><?= $loginUser['jabatan_dosen']; ?></h3>
                        <div class="social-links mt-2">
                            <?php ?>
                            <p>
                                <i class="bi bi-envelope-fill">&nbsp <?= $loginUser['email_dosen']; ?></i>
                            </p>
                            <p class="twitter">
                                <i class="bi bi-phone">&nbsp <?= $loginUser['no_hp']; ?></i>
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
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profil</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Detail Profil</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nama Lengkap</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?= $loginUser["nama_dosen"]; ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">
                                        Minat Penelitian
                                    </div>
                                    <div class="col-lg-9 col-md-8"><?= $loginUser['minat_penelitian']; ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">
                                        Jabatan Fungsional
                                    </div>
                                    <div class="col-lg-9 col-md-8">
                                        <?= $loginUser['jabatan_dosen']; ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">
                                        NIP
                                    </div>
                                    <div class="col-lg-9 col-md-8">
                                        <?= $loginUser['NIP_dosen']; ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Program Studi</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?= $loginUser['program_studi']; ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nomor Handphone</div>
                                    <div class="col-lg-9 col-md-8"><?= $loginUser['no_hp']; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8"><?= $loginUser['email_dosen']; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Google Scholar</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?= $loginUser['google_scholar']; ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Link Sinta</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?= $loginUser['link_sinta']; ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Link Orcid</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?= $loginUser['link_orcid']; ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Link WOS</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?= $loginUser['link_wos']; ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Link Scopus</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?= $loginUser['link_scopus']; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="<?= base_url('/dosen/editProfil'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
                                        <div class="col-md-8 col-lg-9">
                                            <?php if ($loginUser['foto_dosen'] == null) {
                                            ?>
                                                <img src="assets/img/yellow.png" alt="Profile" class="foto-prev">
                                            <?php } else {
                                                // var_dump($l);
                                            ?>
                                                <img src="foto_profil/<?= $loginUser['foto_dosen'] ?>" alt="Profile" class="foto-prev">
                                            <?php }
                                            ?>
                                            <div class="pt-2">
                                                <label for="fotoProfil" class="btn btn-primary btn-sm fotoProfil"><i class="bi bi-upload"></i></label>
                                                <input type="file" class="inputFotoProfil" title="Upload new profile image" name="fotoProfil" id="fotoProfil" onchange="prevFoto()">
                                                <!-- <a onclick="deleteFoto()" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>  -->
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        function prevFoto() {

                                            const foto = document.querySelector('#fotoProfil');
                                            const fotoLabel = document.querySelector('.fotoProfil');
                                            const fotoPrev = document.querySelector('.foto-prev');

                                            fotoLabel.textContent = foto.files[0].name;
                                            fotoLabel.style.color = "white";

                                            const fileFoto = new FileReader();
                                            fileFoto.readAsDataURL(foto.files[0]);
                                            // console.log(fileFoto.readAsDataURL(foto.files[0]));

                                            fileFoto.onload = function(e) {
                                                fotoPrev.src = e.target.result;
                                            }
                                            // console.log(fotoPrev.src);
                                        }

                                        // function deleteFoto() {
                                        //     // var myImage = new Image();
                                        //     // myImage.src = 'assets/img/yellow.png';
                                        //     const fotoPrev = document.querySelector('.foto-prev');
                                        //     const fotoLabel = document.querySelector('.fotoProfil');
                                        //     const input = document.getElementById('fotoProfil');

                                        //     fotoPrev.src = 'assets/img/yellow.png';
                                        //     input.value = <?= base_url("/assets/img/yellow.png") ?>;

                                        //     const fileFoto = new FileReader();
                                        //     fileFoto.readAsDataURL(input.files[0])


                                        //     console.log(input.value);
                                        //     // console.log(input.value);

                                        // }
                                    </script>

                                    <div class="row mb-3">
                                        <label for="namaLengkap" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="namaLengkap" type="text" class="form-control" id="namaLengkap" value="<?= $loginUser['nama_dosen']; ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="minat" class="col-md-4 col-lg-3 col-form-label">Minat Penelitian</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="minat" type="text" class="form-control" id="minat" value="<?= $loginUser['minat_penelitian']; ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="jabatan" class="col-md-4 col-lg-3 col-form-label">Jabatan Fungsional</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="jabatan" type="text" class="form-control" id="jabatan" value="<?= $loginUser['jabatan_dosen']; ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="nip" class="col-md-4 col-lg-3 col-form-label">NIP</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="nip" type="text" class="form-control" id="nip" value="<?= $loginUser['NIP_dosen']; ?>" readonly style="background: #E8E8E8;">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="progStudi" class="col-md-4 col-lg-3 col-form-label">Program Studi</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="progStudi" type="text" class="form-control" id="progStudi" value="<?= $loginUser['program_studi']; ?>" readonly style="background: #E8E8E8;">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="hp" class="col-md-4 col-lg-3 col-form-label">Nomor Handphone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="hp" type="text" class="form-control" value="<?= $loginUser['no_hp']; ?>" id="hp">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="email" value="<?= $loginUser['email_dosen']; ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="scholar" class="col-md-4 col-lg-3 col-form-label">Google Scholar</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="scholar" type="text" class="form-control" id="scholar" value="<?= $loginUser['google_scholar']; ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="sinta" class="col-md-4 col-lg-3 col-form-label">Link Sinta</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="sinta" type="text" class="form-control" id="sinta" value="<?= $loginUser['link_sinta']; ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="orcid" class="col-md-4 col-lg-3 col-form-label">Link Orcid</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="orcid" type="text" class="form-control" id="orcid" value="<?= $loginUser['link_sinta']; ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="wos" class="col-md-4 col-lg-3 col-form-label">Link WOS</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="wos" type="text" class="form-control" id="wos" value="<?= $loginUser['link_wos']; ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="scopus" class="col-md-4 col-lg-3 col-form-label">Link Scopus</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="scopus" type="text" class="form-control" id="scopus" value="<?= $loginUser['link_scopus']; ?>">
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