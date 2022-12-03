<? //= $this->extend('dosen/fixed/templatePenelitian') 
?>
<?= $this->extend('fixed/templatePenelitian') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>Penelitian (----)</h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>
            <!-- ======= Proses Section ======= -->
            <div class="container" data-aos="fade-up">
                <div class="row gy-4">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue">
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
                            <h3>Kontrak</h3>
                            <p>
                                Persetujuan kontrak antara pihak Peneliti dengan pihak Politeknik Statistika STIS
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-box green service-box3">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Laporan</h3>
                            <p>
                                Pelaporan hasil kegiatan penelitian yang dilakukan oleh dosen
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-box purple">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Selesai</h3>
                            <p>
                                Proses penelitian selesai dilaksanakan oleh dosen
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
                            <h5 class="card-title text-center">Pelaporan</h5>
                            <hr>
                            <p>Pelaporan penelitan dan pengisian capaian dari penelitian yang dilakukan </p>
                            <hr>
                            <div class="row mb-3">
                                <table class="table table-advance table-hover align-middle ">
                                    <thead>
                                        <tr class="table-primary">
                                            <th scope="col">Capaian</th>
                                            <th scope="col">Jurnal/Konferensi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Lorem</td>
                                            <td>Ipsum</td>
                                        </tr>
                                        <tr>
                                            <td>Lorem</td>
                                            <td>Ipsum</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4 col-lg-3">
                                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#add">Tambah <i class=" bi bi-plus-square"></i></button>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary">Download Laporan </button>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
    </section>

</main>
<!-- End #main -->

<!-- Tambah Anggota -->
<div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addLabel">Tambah</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="namaAnggota" class="col-form-label">Capaian :</label>
                    <input type="text" class="form-control" id="namaAnggota" name="namaAnggota">
                </div>
                <div class="mb-3">
                    <label for="studiAnggota" class="col-form-label">Jurnal/Konferensi :</label>
                    <input type="text" class="form-control" id="studiAnggota" name="studiAnggota">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary" onclick="location.href='/penelitianProses4'">Ya</button>
            </div>
            <div class="w-100">
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>