<?= $this->extend('dosen/fixed/template') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section class="section">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>Penelitian</h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>
        </div>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert" data-aos="zoom-in">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <div class="row" data-aos="fade-up">
            <div class="">
                <div class="card">
                    <h5>&nbsp;</h5>
                    <div class="card-body">
                        <a href="/penelitianjenisDosen" class="btn-pilih">Tambah Penelitian <i class="bi bi-plus-square"></i></a>
                        <!-- Table with stripped rows -->
                        <table class="table table-advance table-hover align-middle datatable">
                            <thead>
                                <tr class="table-primary">
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Jenis Penelitian</th>
                                    <th scope="col">Tanggal Pengajuan</th>
                                    <th scope="col">Judul Penelitian</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($penelitian as $key => $post) :  ?>

                                    <tr>
                                        <!-- <td><?php //echo $post['id_penelitian'] 
                                                    ?></td> -->
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $post['jenis_penelitian'] ?></td>
                                        <td><?php echo $post['tanggal_pengajuan'] ?></td>
                                        <td><?php echo $post['judul_penelitian'] ?></td>
                                        <td><?php echo $post['status_pengajuan'] ?></td>
                                        <td>
                                            <!-- <a class="btn btn-primary" onclick="location.href='/penelitianSemiMandiri1'"><i class="bi bi-pencil-square"></i></a> -->
                                            <?php
                                            if ($post['jenis_penelitian'] == 'Mandiri' || $post['jenis_penelitian'] == 'Kerjasama') {
                                                echo "<button type='button' class='btn btn-secondary' disabled><i class='bi bi-pencil-square'></i></button>";
                                            } else {
                                                echo "<a class='btn btn-primary' href='/penelitianSemiMandiri1'><i class='bi bi-pencil-square'></i></a>";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php $i++;    ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>
            </div>
        </div>

        </div>
        </div>

        <script>

        </script>
    </section>

</main>
<!-- End #main -->
<?= $this->endSection(); ?>