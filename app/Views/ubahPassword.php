<?php if (auth()->user()->inGroup('admin')) {
    $this->extend('fixed/templateUserSetting');
} else {
    $this->extend('fixed/template');
} ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section class="section">
        <div class="container" data-aos="fade-up">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success " role="alert" data-aos="zoom-in-right">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger " role="alert" data-aos="zoom-in-right">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>


        </div>
        <header class="section-header2">
            <h2><?= $user['nama_dosen'] ?></h2>
            <hr>
        </header>
        </div>

        <div class="row" data-aos="fade-up">
            <div class="row justify-content-md-center" data-aos="fade-up">
                <div class="form row gy-4 justify-content-md-center col-md-8">
                    <div class="form-body pt-3 col-md-14">

                        <form action="<?= base_url('/user/act_ganti_password'); ?>" method="post" id="formGantiPass" >
                            <div class="text-center mb-4">
                                <h3><?= $title  ?></h3>
                            </div>
                            <div class="input-group mb-2">
                                <input type="password" class="form-control rounded" id="passwordLama" placeholder="Password Lama" name="passwordLama" required>
                                <div class="input-group-append ml-1" style="display: flex; align-items: center;">
                                    <span class="input-group-text" onclick="password_show_hide();">
                                        <i class="bi bi-eye" id="show_eye"></i>
                                        <i class="bi bi-eye-slash d-none" id="hide_eye"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <input type="password" class="form-control rounded" id="passwordBaru" placeholder="Password Baru" name="passwordBaru" onkeyup="validate()" minlength="8" required>
                                <div class="input-group-append ml-1" style="display: flex; align-items: center;">
                                    <span class="input-group-text" onclick="password_show_hide_2();">
                                        <i class="bi bi-eye" id="show_eye_2"></i>
                                        <i class="bi bi-eye-slash d-none" id="hide_eye_2"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <input type="password" class="form-control rounded" id="confPasswordBaru" placeholder="Konfirmasi Password Baru" name="confPasswordBaru" onkeyup="validate()" required>
                                <div class="input-group-append ml-1" style="display: flex; align-items: center;">
                                    <span class="input-group-text" onclick="password_show_hide_3();">
                                        <i class="bi bi-eye" id="show_eye_3"></i>
                                        <i class="bi bi-eye-slash d-none" id="hide_eye_3"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <div class="" id='key'></div>
                            </div>
                            <div class="text-right pt-2 mr-4">
                                <button type="submit" id="submit" class="btn btn-primary rounded">Ganti</button>
                                <!-- <button type="submit" class="btn btn-success">Submit Bukti </button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script>
            function submitForm(form) {
                swal({
                        title: "Apakah Anda Yakin?",
                        text: "",
                        buttons: true,
                    })
                    .then(function(isOkay) {
                        if(isOkay) {
                            form.submit
                            console.log('AAAAA');
                        }
                    });
                return false;
            }

            function validate() {
                var x = document.getElementById("passwordBaru");
                var y = document.getElementById("confPasswordBaru");
                var key = document.getElementById("key");
                var btn = document.getElementById("submit");

                if (x.value == '' && y.value == '') {
                    key.innerHTML = "";
                    key.className = "";

                } else if (x.value == y.value) {
                    console.log("Password OK");
                    key.innerHTML = "Password OK";
                    key.className = "text text-success";
                    btn.disabled = false;
                } else {
                    console.log("Password tidak cocok");
                    key.innerHTML = "Password tidak cocok";
                    key.className = "text text-danger";
                    btn.disabled = true;
                    // return
                }

            }

            function password_show_hide() {
                var x = document.getElementById("passwordLama");
                var show_eye = document.getElementById("show_eye");
                var hide_eye = document.getElementById("hide_eye");
                hide_eye.classList.remove("d-none");
                if (x.type === "password") {
                    x.type = "text";
                    show_eye.style.display = "none";
                    hide_eye.style.display = "block";
                } else {
                    x.type = "password";
                    show_eye.style.display = "block";
                    hide_eye.style.display = "none";
                }
            }

            function password_show_hide_2() {
                var x = document.getElementById("passwordBaru");
                var show_eye = document.getElementById("show_eye_2");
                var hide_eye = document.getElementById("hide_eye_2");
                hide_eye.classList.remove("d-none");
                if (x.type === "password") {
                    x.type = "text";
                    show_eye.style.display = "none";
                    hide_eye.style.display = "block";
                } else {
                    x.type = "password";
                    show_eye.style.display = "block";
                    hide_eye.style.display = "none";
                }
            }

            function password_show_hide_3() {
                var x = document.getElementById("confPasswordBaru");
                var show_eye = document.getElementById("show_eye_3");
                var hide_eye = document.getElementById("hide_eye_3");
                hide_eye.classList.remove("d-none");
                if (x.type === "password") {
                    x.type = "text";
                    show_eye.style.display = "none";
                    hide_eye.style.display = "block";
                } else {
                    x.type = "password";
                    show_eye.style.display = "block";
                    hide_eye.style.display = "none";
                }
            }
        </script>
    </section>

</main>
<!-- End #main -->

<?= $this->endSection(); ?>