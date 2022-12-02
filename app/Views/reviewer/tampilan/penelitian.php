<? //= $this->extend('reviewer/fixed/template') 
?>
<?= $this->extend('fixed/template') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


    <section class="section">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>Penelitian</h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>
        </div>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success " role="alert" data-aos="zoom-in-right">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
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

                        <!-- <div class="filter d-flex justify-content-end">
                            <label class="judul col-md-2 col-lg-2 col-form-label" for="pilihKegiatan">Filter Bidang <i class="bi bi-funnel"></i></label>
                            <div class="col-md-2 col-lg-2">
                                <select class="form-select" id="pilihKegiatan">
                                    <option selected>Tidak ada</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div> -->

                        <!-- Table with stripped rows -->
                        <div class="content">
                            <div class="row mb-3">

                                <label class="col-md-4 col-lg-2 col-form-label btn btn-primary">Jenis Penelitian</label>
                                <div class="col-md-8 col-lg-4">
                                    <select class="form-select status-dropdown ">
                                        <option value="">Semua</option>
                                        <option value="Mandiri">Mandiri</option>
                                        <option value="Semi Mandiri">Semi Mandiri</option>
                                        <option value="Di Danai Institusi">Di Danai Institusi</option>
                                        <option value="Institusi">Institusi</option>
                                        <option value="Kerjasama">Kerjasama</option>
                                    </select>
                                </div>

                                <label class="col-md-4 col-lg-2 col-form-label btn btn-primary">Status Penelitian</label>
                                <div class="col-md-8 col-lg-4">
                                    <select class="form-select status-dropdown2">
                                        <option value="">Semua</option>
                                        <option value="Diajukan oleh Dosen">Diajukan oleh Dosen </option>
                                        <option value="Disetujui oleh BAU">Disetujui oleh BAU </option>
                                        <option value="Disetujui oleh Reviewer">Disetujui oleh Reviewer</option>
                                        <option value="Disetujui oleh Kepala PPPM">Disetujui oleh Kepala PPPM</option>
                                        <option value="Disetujui oleh Direktur">Disetujui oleh Direktur</option>
                                        <option value="Kegiatan sedang berlangsung">Kegiatan sedang berlangsung</option>
                                        <option value="Kegiatan telah selesai dilaksanakan">Kegiatan telah selesai dilaksanakan</option>
                                    </select>
                                </div>

                            </div>

                            <div class="table-responsive">
                                <table id="example" class="table">
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
                                    <tbody id="myTable">
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
                                                    <!-- <a class="btn btn-primary" onclick="location.href='/persetujuanDirektur'"><i class="bi bi-pencil-square"></i></a> -->
                                                    <a href="/persetujuanReviewer/<?= $post['id_penelitian']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                </td>
                                            </tr>
                                            <?php $i++;    ?>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
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

    </section>
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
</main>
<!-- End #main -->
<?= $this->endSection(); ?>