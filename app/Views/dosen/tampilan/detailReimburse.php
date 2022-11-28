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
                                Reimbursemen penlitian yang diajukan oleh dosen
                                oleh Direktur Politeknik Statistika STIS
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
                        <h5 class="card-title text-center">Proposal Reimbursemen Penelitian</h5>
                        <hr>
                        <p>Proposal reimburse penelitian yang diajukan dosen
                            oleh Direktur Politeknik Statistika STIS
                        </p>
                        <div class="d-flex justify-content-end">
                            <a href="" class="btn btn-success">Lihat Proposal</a>
                        </div>
                        <hr>
                        <form action="">
                            <div class="row mb-3">
                                <label for="upload" class="col-md-4 col-lg-3 col-form-label ">Letter of Acceptance (LOA)</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="loa" class="form-control " type="file" id="loa">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="upload" class="col-md-4 col-lg-3 col-form-label ">Naskah Artikel</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="naskah" class="form-control " type="file" id="naskah">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="upload" class="col-md-4 col-lg-3 col-form-label ">Bukti Pembayaran (invoice)</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="invoice" class="form-control " type="file" id="invoice">

                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#submit">Ajukan Reimburse </a>
                            </div>
                        </form>

                    </div>
                </div>


    </section>

</main>
<!-- End #main -->
<!-- Submit -->
<div class="modal fade" id="submit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="submitLabel" aria-hidden="true">
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
                <button type="button" class="btn btn-primary" onclick="location.href='/reimburseDosen'">Ya</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>