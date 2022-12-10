<? //= $this->extend('dosen/fixed/templatePenelitian') 
?>
<?= $this->extend('fixed/templatePenelitian') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section id="services" class="services">
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger" role="alert" data-aos="zoom-in">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>Penelitian <?= $penelitian['jenis_penelitian']; ?></h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>
            <p hidden id="status"><?= $penelitian['id_status']; ?></p>
            <p hidden id="jenis"><?= $penelitian['jenis_penelitian']; ?></p>
            <p hidden id="alasan"><?php if ($penelitian['alasan'] == null) {
                                        echo 'kosong';
                                    } else {
                                        echo $penelitian['alasan'];
                                    } ?></p>
            <!-- ======= Proses Section ======= -->
            <div class="container" data-aos="fade-up">
                <div class="row gy-4">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <a href="<?= base_url('penelitianProses1') . "/" . $penelitian["id_penelitian"]; ?>">
                            <div class="service-box blue ">
                                <i class="ri-discuss-line icon"></i>
                                <h3>Proposal</h3>
                                <p>
                                    Proses peninjauan dan persetujuan proposal penelitian
                                    yang diajukan oleh dosen
                                </p>
                            </div>
                        </a>
                    </div>

                    <?php
                    if ($penelitian['jenis_penelitian'] == 'Semi Mandiri') {
                    ?>
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <?php if ($penelitian['id_status'] > 4 && !($penelitian['id_status'] >= 7 && $penelitian['id_status'] <= 9)) { ?>
                                <a href="<?= base_url('penelitianProses2') . "/" . $penelitian["id_penelitian"]; ?>">
                                    <div class="service-box orange">
                                    <?php } else { ?>
                                        <div class="service-box secondary">
                                        <?php } ?>

                                        <i class="ri-discuss-line icon"></i>
                                        <h3>Pendanaan</h3>
                                        <p>
                                            Pendanaan untuk kegiatan publikasi dari penelitian yang
                                            dilakukan oleh dosen
                                        </p>
                                        </div>
                                        <?php if ($penelitian['id_status'] > 4 && !($penelitian['id_status'] >= 7 && $penelitian['id_status'] <= 9)) { ?>
                                </a>
                            <?php } ?>
                        </div>
                    <?php  }
                    if ($penelitian['jenis_penelitian'] == 'Didanai Institusi' || $penelitian['jenis_penelitian'] == 'Institusi') {
                    ?>
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <?php if ($penelitian['id_status'] > 4 && !($penelitian['id_status'] >= 7 && $penelitian['id_status'] <= 9)) { ?>
                                <a href="<?= base_url('penelitianProses2Kontrak') . "/" . $penelitian["id_penelitian"]; ?>">
                                    <div class="service-box orange">
                                    <?php } else { ?>
                                        <div class="service-box secondary   "> <?php } ?>
                                        <i class="ri-discuss-line icon"></i>
                                        <h3>Kontrak</h3>
                                        <p>
                                            Persetujuan kontrak antara pihak Peneliti dengan pihak Politeknik Statistika STIS
                                        </p>
                                        </div>
                                        <?php if ($penelitian['id_status'] > 4 && !($penelitian['id_status'] >= 7 && $penelitian['id_status'] <= 9)) { ?>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <?php if ($penelitian['id_status'] == 6 || $penelitian['id_status'] == 10) { ?>
                            <a href="<?= base_url('penelitianProses3') . "/" . $penelitian["id_penelitian"]; ?>">
                                <div class="service-box green service-box3">
                                <?php } else { ?>
                                    <div class="service-box secondary"> <?php } ?>
                                    <i class="ri-discuss-line icon"></i>
                                    <h3>Laporan</h3>
                                    <p>
                                        Pelaporan hasil kegiatan penelitian yang dilakukan oleh dosen
                                    </p>
                                    </div>
                                    <?php if ($penelitian['id_status'] == 6 || $penelitian['id_status'] == 10) { ?>
                            </a>
                        <?php } ?>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <?php if ($penelitian['id_status'] == 10) { ?>
                            <a href="<?= base_url('penelitianProses4') . "/" . $penelitian["id_penelitian"]; ?>">
                                <div class="service-box purple">
                                <?php } else { ?>
                                    <div class="service-box secondary   "> <?php } ?>
                                    <i class="ri-discuss-line icon"></i>
                                    <h3>Selesai</h3>
                                    <p>
                                        Proses penelitian selesai dilaksanakan oleh dosen
                                    </p>
                                    </div>
                            </a>
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
                            <h5 class="card-title text-center">Laporan</h5>
                            <hr>
                            <p>Upload laporan penelitian dan pengisian tabel
                                luaran serta capaian yang telah dilakukan oleh dosen
                            </p>
                            <hr>
                            <?php
                            // var_dump($laporan);
                            if ($laporan['laporan_luaran'] == null) {
                            ?>
                                <form action="<?= base_url('/penelitianDetail/saveLaporan/' . $penelitian['id_penelitian']); ?>" onsubmit="return submitForm(this)" method="post" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <table class="table table1 table-advance table-hover align-middle anggota" id="myTableID">
                                            <tr class="table-primary">
                                                <th scope="col">Jenis Luaran</th>
                                                <th scope="col">Capaian</th>
                                                <th scope="col">Jurnal/Konferensi</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                            <tbody>
                                            </tbody>
                                        </table>

                                        <div class="col-md-4 col-lg-6">
                                            <button onclick='add()' class="btn btn-warning">
                                                Tambah Bukti Luaran <i class=" bi bi-plus-square"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <input name="jumlahrow" id="jumlahrow" value="" type="hidden">

                                    <script>
                                        function rm() {
                                            $(event.target).closest("tr").remove();
                                        }

                                        function add() {
                                            var m = document.getElementById('jumlahrow');
                                            var rowCount = document.getElementById('myTableID').rows.length;
                                            $(".table1").append("<tr><td><input name='jenisLuaran" + rowCount + "' class='form-control' type='text' id='jenisLuaran" + rowCount + "' required></td><td><input name='targetCapaian" + rowCount + "' class='form-control' type='text' id='targetCapaian" + rowCount + "' required></td><td><input name='jurnalTujuan" + rowCount + "' class='form-control' type='text' id='jurnalTujuan" + rowCount + "' required></td><td><button onclick='rm()' class='btn btn-danger'>Hapus</button></td></tr>");
                                            console.log(rowCount);
                                            m.value = rowCount;
                                        }
                                    </script>

                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <a href="/penelitian/printBuktiLuaran" class="btn btn-primary">Download Template Bukti Luaran</a>
                                    </div>
                                    <hr>

                                    <div class="row mb-4">
                                        <label for="laporan" class="col-md-3 col-lg-4 col-form-label ">Upload Bukti Luaran</label>
                                        <div class="col-md-3 col-lg-8">
                                            <input class="form-control <?= ($validation->hasError('uploadLaporan')) ? 'is-invalid' : ''; ?>" type="file" id="uploadLaporan" name="uploadLaporan">
                                            <div class="invalid-feedback" id="uploadValid">
                                                <?= $validation->getError('uploadLaporan'); ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mb-4">
                                        <label for="totalDana" class="col-md-4 col-lg-3 col-form-label">Total dana</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="totalDana" type="text" class="form-control" id="totalDana">
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <input type="submit" class="btn btn-success" name="btn" value="Submit" id="submitBtn" />
                                    </div>


                                </form>

                            <?php
                            } else {
                            ?>
                                <!-- <h5 class="card-title text-center">Upload Bukti Luaran</h5>
                                <hr> -->
                                <h6 class="card-title text-center">Anda Sudah Upload Bukti Luaran</h6>
                            <?php
                            }
                            ?>



                            <script>
                                function submitForm(form) {
                                    swal({
                                            title: "Apakah Anda Yakin?",
                                            text: "Dokumen ini akan di upload",
                                            buttons: true,
                                        })
                                        .then(function(isOkay) {
                                            if (isOkay) {
                                                form.submit();
                                            }
                                        });
                                    return false;
                                }
                            </script>


                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <!-- Section: Timeline -->
                            <ul class="timeline-with-icons" id="list">
                            </ul>
                            <ul class="timeline-with-icons" id="keterangan">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</main>
<!-- End #main -->
<?= $this->endSection(); ?>