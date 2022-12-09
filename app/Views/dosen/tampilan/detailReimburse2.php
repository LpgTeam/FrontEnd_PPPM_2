<? //= $this->extend('direktur/fixed/templatePenelitian') 
?>
<?= $this->extend('fixed/templateReimburse') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>Reimbursement PKM <?= $pkm['jenis_pkm'] ?></h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>
            <!-- ======= Proses Section ======= -->
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 justify-content-md-center">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue service-box1">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Reimbursement</h3>
                            <p>
                                Reimbursement PKM yang diajukan oleh Dosen
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
                        <h5 class="card-title text-center">Formulir Reimbursement PKM</h5>
                        <hr>
                        <p>Reimbursement PKM yang diajukan dosen
                            Politeknik Statistika STIS
                        </p>
                        <div class="d-flex justify-content-end ms-1">
                            <a href="/pkm/download-memo-pkm/<?= $pkm['ID_pkm']; ?>" class="btn btn-warning">Download Memo Kepala PPPM </a>
                            <a href="/pkm/download-laporan/<?= $pkm['ID_pkm']; ?>" class="btn btn-success">Download Formulir Pengajuan</a>
                        </div>
                        <hr>
                        <?php 
                            if ($pkm['id_status_reimburse'] == 0) {
                        ?>
                            <form action="<?= base_url('/reimburseDetail/savePkm/' . $pkm['ID_pkm']); ?>">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">Pengajuan Reimbursement</h5>
                                            <hr>
                                            <ul>
                                                <li>Topik Kegiatan &nbsp;&nbsp;&nbsp;&nbsp;: <?= $pkm['topik_kegiatan']; ?></li>
                                                <li>Bentuk Kegiatan &nbsp; : <?= $pkm['bentuk_kegiatan']; ?></li>
                                                <li>Waktu Kegiatan &nbsp;&nbsp;&nbsp;&nbsp;: <?= $pkm['waktu_kegiatan']; ?></li>
                                                <li>Total Biaya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp <?= number_format($dana_pkm[0]['dana_keluar'], 0, ",", "."); ?></li>
                                
                                            </ul>
                                            <hr>
                                            
                                        </div>
                                    </div>
                               
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#submit">Ajukan Reimbursement </button>
                                </div>
                            </form>
                        <?php
                        } else if ($pkm['id_status_reimburse'] == 1) {
                        ?>
                            <h5 class="card-title text-center">Pengajuan Reimbursement Anda Sedang dalam Proses</h5>

                        <?php
                        } else if ($pkm['id_status_reimburse'] == 2) {
                        ?>
                            <h5 class="card-title text-center">Dana Reimbursement Anda Sudah Dicairkan</h5>
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