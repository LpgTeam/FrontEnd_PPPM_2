<?= $this->extend('fixed/templatePenelitian') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>Penelitian <?= $penelitian['jenis_penelitian']; ?></h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>

            <!-- ======= Proses Section ======= -->
            <p hidden id="status"><?= $penelitian['id_status']; ?></p>
            <p hidden id="jenis"><?= $penelitian['jenis_penelitian']; ?></p>
            <p hidden id="alasan"><?php if ($penelitian['alasan'] == null) {
                                        echo 'kosong';
                                    } else {
                                        echo $penelitian['alasan'];
                                    } ?></p>
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 d-flex justify-content-center">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <a href="/adminProses1/<?= $penelitian['id_penelitian'] ?>">
                            <div class="service-box blue service-box1">
                                <i class="ri-discuss-line icon"></i>
                                <h3>Proposal</h3>
                                <p>
                                    Proses peninjauan dan persetujuan proposal penelitian
                                    yang diajukan oleh dosen
                                </p>
                            </div>
                        </a>
                    </div>


                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <a href="/adminProses3/<?= $penelitian['id_penelitian'] ?>">
                            <div class="service-box green">
                                <i class="ri-discuss-line icon"></i>
                                <h3>Laporan</h3>
                                <p>
                                    Pelaporan hasil kegiatan penelitian yang dilakukan oleh dosen
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
                            <h5 class="card-title text-center">Proposal</h5>
                            <hr>
                            <ol>
                                <li>Judul Proposal &nbsp;&nbsp;&nbsp;&nbsp;: <?= $penelitian['judul_penelitian']; ?></li>
                                <li>Jenis Penelitian &nbsp;&nbsp; : <?= $penelitian['jenis_penelitian']; ?></li>
                            </ol>
                            <hr>
                            <hr>
                            <?= $this->include('proposal/download_per_proposal'); ?>

                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <?php if ($status != null) { ?>
                                <div class="statAdmin">
                                    <table id="example">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="title" colspan="2">Status Penelitian</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <?php
                                            $i = 1;
                                            foreach ($status as $key => $post) :  ?>

                                                <tr>
                                                    <td style="text-align:center" width="20%" class="icon"><i class="bi bi-check-circle-fill">
                                                        </i>
                                                        <div class="vertical-line"></div>
                                                    </td>
                                                    <td class="stat card">&nbsp; <?php echo $post['status'] ?></td>
                                                </tr>
                                                <?php $i++;    ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <?php if ($i > 2) { ?>
                                    <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#submit"><i class="bi bi-trash"></i></a>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- modal -->
    <div class="modal fade" id="submit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="submitLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="submitLabel">Undo Status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin akan undo status Penelitian?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-primary" onclick="location.href='/removeStatus/<?= $post['id_penelitian']; ?>/<?= $statusTerbaru['id_status']; ?>'">Ya</button>
                </div>
            </div>
        </div>
        <!-- END modal -->
    </div>
</main>
<!-- End #main -->
<?= $this->endSection(); ?>