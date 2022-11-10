<?= $this->extend('dosen/fixed/template') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section class="section">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>Pengabdian Kepada Masyarakat</h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="">
                <div class="card">
                    <h5>&nbsp;</h5>
                    <div class="card-body">
                        <a href="/pkmjenisDosen" class="btn-pilih">Tambah PKM <i class="bi bi-plus-square"></i></a>
                        <!-- Table with stripped rows -->
                        <table class="table table-advance table-hover align-middle datatable">
                            <thead>
                                <tr class="table-primary">
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Jenis PKM</th>
                                    <th scope="col">Tanggal Pengajuan</th>
                                    <th scope="col">Judul PKM</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mandiri</td>
                                    <td>24-06-2022</td>
                                    <td>Lorem Ipsum</td>
                                    <td>Lorem Ipsum</td>
                                    <td>
                                        <a class="btn btn-primary" id="editButton" data-bs-toggle="modal" data-bs-target="#edit"><i class="bi bi-pencil-square"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Dosen</td>
                                    <td>22-04-2022</td>
                                    <td>Lorem Ipsum</td>
                                    <td>Lorem Ipsum</td>
                                    <td>
                                        <a class="btn btn-primary" id="editButton" data-bs-toggle="modal" data-bs-target="#edit"><i class="bi bi-pencil-square"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Kelompok Dosen</td>
                                    <td>24-06-2022</td>
                                    <td>Lorem Ipsum</td>
                                    <td>Lorem Ipsum</td>
                                    <td>
                                        <a class="btn btn-primary" id="editButton" data-bs-toggle="modal" data-bs-target="#edit"><i class="bi bi-pencil-square"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Mandiri</td>
                                    <td>24-06-2022</td>
                                    <td>Lorem Ipsum</td>
                                    <td>Lorem Ipsum</td>
                                    <td>
                                        <a class="btn btn-primary" id="editButton" data-bs-toggle="modal" data-bs-target="#edit"><i class="bi bi-pencil-square"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Terstruktur</td>
                                    <td>24-06-2022</td>
                                    <td>Lorem Ipsum</td>
                                    <td>Lorem Ipsum</td>
                                    <td>
                                        <a class="btn btn-primary" id="editButton" data-bs-toggle="modal" data-bs-target="#edit"><i class="bi bi-pencil-square"></i></a>
                                    </td>
                                </tr>
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