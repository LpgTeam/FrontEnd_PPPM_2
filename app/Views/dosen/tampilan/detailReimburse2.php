<? //= $this->extend('direktur/fixed/templatePenelitian') 
?>
<?= $this->extend('fixed/templateReimburse') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>REIMBURSEMEN</h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>
            <!-- ======= Proses Section ======= -->
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 justify-content-md-center">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue service-box1">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Reimbursemen</h3>
                            <p>
                                Reimbursemen penelitian yang diajukan oleh Dosen
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
                        <h5 class="card-title text-center">Proposal Reimbursemen PKM</h5>
                        <hr>
                        <p>Proposal reimburse PKM yang diajukan dosen
                            oleh Direktur Politeknik Statistika STIS
                        </p>
                        <div class="d-flex justify-content-end">
                            <a href="/pkm/download-proposal/<?= $pkm['ID_pkm']; ?>/1" class="btn btn-success">Lihat
                                Formulir Pengajuan </a>
                        </div>
                        <hr>

                        <div class="row mb-3">
                            <label for="upload" class="col-md-4 col-lg-3 col-form-label ">Total Biaya</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="totalBiaya" type="text" class="form-control" id="totalBiaya">
                            </div>
                        </div>
                        <?php 
                            if($pkm['id_status_reimburse'] == 0){
                        ?>
                        <form action="<?= base_url('/reimburseDetail/savePkm/' . $pkm['ID_pkm']); ?>">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#submit">Ajukan Reimburse </button>
                            </div>
                        </form>
                        <?php
                        } if ($pkm['id_status_reimburse'] == 0) {
                        ?>
                            <form action="<?= base_url('/reimburseDetail/savePkm/' . $pkm['ID_pkm']); ?>">
                                <div class="row mb-3">
                                    <label for="totalBiaya" class="col-md-4 col-lg-3 col-form-label">Total Biaya</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="totalBiaya" type="text" class="form-control" id="totalBiaya">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#submit">Ajukan Reimburse </button>
                                </div>
                            </form>
                        <?php
                        } else if ($pkm['id_status_reimburse'] == 1) {
                        ?>
                            <h5 class="card-title text-center">Pengajuan Reimburse Anda Sedang dalam Proses</h5>

                        <?php
                        } else if ($pkm['id_status_reimburse'] == 2) {
                        ?>
                            <h5 class="card-title text-center">Dana Reimburse Anda Sudah Dicairkan</h5>
                            <hr>
                            <p>Untuk informasi lebih lanjut mengenai detail pencairan, silahkan hubungi BAU</p>
                        <?php
                        }
                        ?>
                    </div>
                </div>


    </section>

</main>
<!-- End #main -->
<!-- Submit -->
<!-- <div class="modal fade" id="submit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="submitLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="submitLabel">Submit Pengajuan Reimburse</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin mengajukan reimburse
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary" onclick="location.href='<?= base_url('/reimburseDetail/savePkm/' . $pkm['ID_pkm']); ?>">Ya</button>
            </div>
        </div>
    </div>
</div> -->
<?= $this->endSection(); ?>