<? //= $this->extend('bau/fixed/template') 
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
                <h2>REIMBURSEMEN</h2>
                <hr>
                <p>Bagian Administrasi Umum Politeknik Statistika STIS</p>
            </header>
        </div>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <div class="row" data-aos="fade-up">
            <div class="">
                <div class="card">
                    <h5>&nbsp;</h5>
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <div class="content">
                            <div class="row mb-3 justify-content-md-start">
                                <div class="input-group-prepend col-md-4 col-lg-2">
                                    <div class=" btn btn-primary">Jenis Penelitian/PKM</div>
                                </div>
                                <select class="form-control status-dropdown col-md-8 col-lg-4">
                                    <option value="">Semua</option>
                                    <option value="Semi Mandiri">Penelitian Semi Mandiri</option>
                                    <option value="Di Danai Institusi">Penelitian Di Danai Institusi</option>
                                    <option value="Institusi">Penelitian Institusi</option>
                                    <option value="Kerjasama">Penlitian Kerjasama</option>
                                    <option value="Kelompok">PKM Kelompok/Dosen</option>
                                    <option value="Terstruktur">PKM Terstruktur</option>
                                </select>

                                <div class="input-group-prepend col-md-4 col-lg-2">
                                    <div class=" btn btn-primary">Status Reimbursemen</div>
                                </div>

                                <select class="form-control status-dropdown2 col-md-8 col-lg-4">
                                    <option value="">Semua</option>
                                    <option value="Reimburse diajukan">Reimbursemen diajukan</option>
                                    <option value="Dana berhasil dicairkan">Reimbursemen berhasil dicairkan</option>
                                </select>
                            </div>

                            <div class="table-responsive">
                                <table id="example" class="table">
                                    <thead>
                                        <tr class="table-primary">
                                            <th scope="col">Nomor</th>
                                            <th scope="col">Jenis Penelitian/PKM</th>
                                            <th scope="col">Tanggal Pengajuan</th>
                                            <th scope="col">Judul Penelitian</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <?php $i = 1; ?>
                                        <?php if(!$reimburse[0]['jenis_penelitian'] == NULL) {
                                            $kegiatan = "pkm";
                                        } if(!$reimburse[1]['jenis_pkm'] == NULL) {
                                            $kegiatan = "penelitian"; 
                                        }?>
                                        <?php foreach ($reimburse as $key => $post) : ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php if($reimburse[1]['jenis_penelitian'] != NULL) {
                                                        echo $post['jenis_penelitian'];
                                                    } if($reimburse[1]['jenis_pkm'] != NULL) {
                                                        echo $post['jenis_pkm']; 
                                                    } ?></td>
                                                <td><?php echo $post['tanggal_pengajuan'] ?></td>
                                                <td><?php if($reimburse[1]['judul_penelitian'] != NULL) {
                                                        echo $post['judul_penelitian'];
                                                    } if($reimburse[1]['judul_pkm'] != NULL) {
                                                        echo $post['judul_pkm'];
                                                    } ?></td>
                                                <td><?php echo $post['status_reimburse'] ?></td>
                                                <td>
                                                    <a href="/persetujuanReimburse/penelitian/<?= $post['id_reimburse']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                    <a href="/persetujuanReimburse/pkm/<?= $post['id_reimburse']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                </td>
                                            </tr>
                                        <?php $i++; ?> 
                                        <?php endforeach ?>   
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
</main>
<!-- End #main -->
<?= $this->endSection(); ?>