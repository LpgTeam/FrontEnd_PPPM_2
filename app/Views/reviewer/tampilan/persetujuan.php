<?= $this->extend('reviewer/fixed/templatePenelitian') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>Penelitian <?= $penelitian['jenis_penelitian'] ?></h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>
            <!-- ======= Proses Section ======= -->
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 justify-content-md-center">
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
                            <p><?= $penelitian['judul_penelitian'] ?></p>
                            <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a
                                type specimen book. It has survived not only five centuries, but also the
                                leap into electronic typesetting, remaining essentially unchanged. It was
                                popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum </p>
                            <hr>
                            <?= $this->include('proposal/download_per_proposal'); ?>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Persetujuan Proposal</h5>
                            <hr>
                            <p>Persetujuan proposal penelitian yang diajukan dosen
                                oleh reviewer
                            </p>
                            <div class="d-flex justify-content-end">
                                <div class="text-end">
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#tidak">Tidak</button>
                                </div>
                                <div class="text-end">
                                    <p>&nbsp&nbsp&nbsp</p>
                                </div>
                                <div class="text-end">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#submit">Setuju</button>
                                </div>
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
<!-- Submit -->
<div class="modal fade" id="submit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="submitLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="submitLabel">Setujui Proposal Penlitian</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin menyetujui proposal penelitian ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary" onclick="location.href='/acc-reviewer/<?= $penelitian['id_penelitian']; ?>'">Ya</button>
            </div>
        </div>
    </div>
</div>

<!-- Tidak Setuju -->
<div class="modal fade" id="tidak" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tidakLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tidakLabel">Tidak Setujui Proposal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="alasan" class="col-form-label">Alasan menolak :</label>
                    <textarea class="form-control" id="alasan" name="alasan"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary" onclick="location.href='/rjc-reviewer/<?= $penelitian['id_penelitian']; ?>'">Selesai</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>