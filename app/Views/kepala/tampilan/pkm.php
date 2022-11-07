<?= $this->extend('kepala/fixed/template') ?>

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
                        <div class="d-flex justify-content-center">
                            <div class="search-bar col-lg-8 d-flex justify-content-end">
                                <form class="search-form d-flex align-items-center" method="POST" action="#">
                                    <input type="text" id="myInput" name="query" placeholder="Search" title="Enter search keyword">
                                    <button type="button" title="Search"><i class="bi bi-search"></i></button>
                                </form>
                            </div><!-- End Search Bar -->
                        </div>
                        <p>&nbsp</p>
                        <!-- Table with stripped rows -->
                        <table class="table table-advance table-hover align-middle ">
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
                            <tbody id="myTable">
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
            $(document).ready(function() {
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
    </section>

</main>
<!-- End #main -->
<?= $this->endSection(); ?>