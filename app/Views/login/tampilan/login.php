<?= $this->extend('login/fixed/template') ?>

<?= $this->section('content'); ?>


<!-- ======= Login Section ======= -->
<section id="kotak" class="kotak">
    <div class="container" data-aos="fade-down">
        <?php if (session('error') !== null) : ?>
            <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
        <?php elseif (session('errors') !== null) : ?>
            <div class="alert alert-danger" role="alert">
                <?php if (is_array(session('errors'))) : ?>
                    <?php foreach (session('errors') as $error) : ?>
                        <?= $error ?>
                        <br>
                    <?php endforeach ?>
                <?php else : ?>
                    <?= session('errors') ?>
                <?php endif ?>
            </div>
        <?php endif ?>
        <?php if (session('message') !== null) : ?>
            <div class="alert alert-success" role="alert"><?= session('message') ?></div>
        <?php endif ?>

        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-danger" role="alert" data-aos="zoom-in">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>

        <div class="section-header">
            <img src="assets/img/STIS.png" alt="" width="250" class="stis">
            <p>PENGELOLAAN PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT</p>
            <p class="fw-normal">PPPM POLITEKNIK STATISTIKA STIS</p>
        </div>



        <div class="row gy-4 justify-content-md-center" data-aos="fade-left">
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="box">
                    <h3 style="color: #ffa200">Dosen</h3>
                    <img src="assets/img/yellow.png" class="img-fluid" alt="" />
                    <!-- <a href="/indexDosen" class="btn-login">LOGIN</a> -->
                    <!-- Pop up SIPADU -->
                    <a href="" class="btn-login" data-bs-toggle="modal" data-bs-target="#loginDosen">LOGIN</a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                <div class="box">
                    <h3 style="color: #00c0ff">Administrator</h3>
                    <img src="assets/img/blue.png" class="img-fluid" alt="" />
                    <!-- <a href="/indexAdmin" class="btn-login">LOGIN</a> -->
                    <a href="" class="btn-login" data-bs-toggle="modal" data-bs-target="#loginAdmin">LOGIN</a>
                </div>
            </div>
        </div>
    </div>
    <i class="mobile-nav-toggle "></i>
</section>
<!-- End Login Section -->
</main>
<!-- End #main -->

<!-- Ubah dana awal -->
<div class="modal fade" id="loginDosen" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-center" id="ubahLabel">Login dengan akun sipadu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('/login'); ?>" method="post">
                <div class="modal-body">
                    <!-- <div class="mb-3 row justify-content-md-center">
                    <img src="assets/img/STIS.png" alt="" width="20" />
                </div> -->
                    <div class="container sipadu" data-aos="fade-down">
                        <div class="section-header">
                            <img src="assets/img/SIPADU.png" alt="" width="200">
                        </div>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="username" class="col-form-label">Username :</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div> -->
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email :</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="col-form-label">Password :</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <?php if (setting('Auth.sessionConfig')['allowRemembering']) : ?>
                    <div class="form-check m-2">
                        <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked<?php endif ?>>
                        <label class="form-check-label"><?= lang('Auth.rememberMe') ?></label>
                    </div>
                <?php endif; ?>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success rounded-3 text-white">Masuk</button>
                </div>

                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-success" onclick="location.href='/indexDosen'">Ya</button>
                </div> -->
            </form>
            <div class="w-100">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="loginAdmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-center" id="ubahLabel">Login dengan akun sipadu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('/loginAdmin'); ?>" method="post">
                <div class="modal-body">
                    <!-- <div class="mb-3 row justify-content-md-center">
                    <img src="assets/img/STIS.png" alt="" width="20" />
                </div> -->
                    <div class="container" data-aos="fade-down">
                        <div class="section-header">
                            <img src="assets/img/SIPADU.png" alt="" width="200">
                        </div>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="username" class="col-form-label">Username :</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div> -->
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email :</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="col-form-label">Password :</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <?php if (setting('Auth.sessionConfig')['allowRemembering']) : ?>
                    <div class="form-check m-2">
                        <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked<?php endif ?>>
                        <label class="form-check-label"><?= lang('Auth.rememberMe') ?></label>
                    </div>
                <?php endif; ?>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success rounded-3 text-white">Masuk</button>
                </div>

                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-success" onclick="location.href='/indexDosen'">Ya</button>
                </div> -->
            </form>
            <div class="w-100">
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>