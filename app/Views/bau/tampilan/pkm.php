<? //= $this->extend('kepala/fixed/template') 
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
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert" data-aos="zoom-in">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>

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
                        <!-- Table with stripped rows -->
                        <div class="content">
                            <div class="row mb-3">

                                <label class="col-md-4 col-lg-2 col-form-label btn btn-primary">Jenis PKM</label>

                                <div class="col-md-8 col-lg-4">
                                    <select class="form-select status-dropdown">
                                        <option value="">Semua</option>
                                        <option value="Mandiri">Mandiri</option>
                                        <option value="Kelompok">Dosen/Kelompok</option>
                                        <option value="Terstruktur">Terstruktur</option>
                                    </select>
                                </div>


                                <label class="col-md-4 col-lg-2 col-form-label btn btn-primary">Status PKM</label>

                                <div class="col-md-8 col-lg-4">
                                    <select class="form-select status-dropdown2 ">
                                        <option value="">Semua</option>
                                        <option value="Diajukan oleh Dosen">Diajukan oleh Dosen</option>
                                        <option value="Disetujui oleh BAU">Disetujui oleh BAU</option>
                                        <option value="Disetujui Oleh Kepala PPPM">Disetujui Oleh Kepala PPPM</option>
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
                                            <th scope="col">Jenis PKM</th>
                                            <th scope="col">Tanggal Pengajuan</th>
                                            <th scope="col">Judul PKM</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!$pkm == null) {
                                            $i = 1; ?>
                                            <?php foreach ($pkm as $key => $post) :  ?>

                                                <tr>
                                                    <!-- <td><?php //echo $post['id_penelitian'] 
                                                                ?></td> -->
                                                    <td><?php echo $post['ID_pkm'] ?></td>
                                                    <td><?php echo $post['jenis_pkm'] ?></td>
                                                    <td><?php echo $post['tanggal_pengajuan'] ?></td>
                                                    <td><?php echo $post['topik_kegiatan'] ?></td>
                                                    <td><?php echo $post['status'] ?></td>
                                                    <td>
                                                        <a href="/pkmPersetujuanBAU/<?= $post['ID_pkm']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>

                                                    </td>
                                                </tr>
                                        <?php $i++;
                                            endforeach;
                                        } ?>
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