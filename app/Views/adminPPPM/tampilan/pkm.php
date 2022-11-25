<? //= $this->extend('adminPPPM/fixed/template') 
?>
<?= $this->extend('fixed/template') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

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
                        <!-- <div class="d-flex justify-content-center">
                            <div class="search-bar col-lg-8 d-flex justify-content-end">
                                <form class="search-form d-flex align-items-center" method="POST" action="#">
                                    <input type="text" id="myInput" name="query" placeholder="Search" title="Enter search keyword">
                                    <button type="button" title="Search"><i class="bi bi-search"></i></button>
                                </form>
                            </div>
                        </div> -->
                        <!-- End Search Bar -->
                        <p>&nbsp</p>
                        <!-- Table with stripped rows -->
                        <div class="content">
                            <div class="row mb-3 justify-content-md-start">
                                <div class="input-group-prepend col-md-4 col-lg-2">
                                    <div class=" btn btn-primary">Jenis PKM</div>
                                </div>
                                <select class="form-control status-dropdown col-md-8 col-lg-4">
                                    <option value="">Semua</option>
                                    <option value="Mandiri">Mandiri</option>
                                    <option value="Kelompok">Dosen/Kelompok</option>
                                    <option value="Terstruktur">Terstruktur</option>
                                </select>

                                <div class="input-group-prepend col-md-4 col-lg-2">
                                    <div class=" btn btn-primary">Status PKM (masih dummy)</div>
                                </div>

                                <select class="form-control status-dropdown2 col-md-8 col-lg-4">
                                    <option value="">Semua</option>
                                    <option value="diajukan">PKM diajukan</option>
                                    <option value="Laporan PKM">Laporan PKM</option>
                                    <option value="PKM Selesai">PKM Selesai</option>
                                </select>
                            </div>

                            <table id="example" class="table">
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
                        </div>


                        <script>
                            $(document).ready(function() {
                                dataTable = $("#example").DataTable({});

                                $('.status-dropdown').on('change', function(e) {
                                    var status = $(this).val();
                                    $('.status-dropdown').val(status)
                                    console.log(status)
                                    //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
                                    dataTable.column(1).search(status).draw();
                                })

                                $('.status-dropdown2').on('change', function(e) {
                                    var status = $(this).val();
                                    $('.status-dropdown2').val(status)
                                    console.log(status)
                                    //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
                                    dataTable.column(4).search(status).draw();
                                })
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>

        </div>
        </div>

        <!-- <script>
            $(document).ready(function() {
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script> -->
    </section>

</main>
<!-- End #main -->
<?= $this->endSection(); ?>