<? //= $this->extend('direktur/fixed/template') 
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
                <h2>REIMBURSEMENT</h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
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
                            <div class="row mb-3">

                                <label class="col-md-4 col-lg-2 col-form-label btn btn-primary">Jenis Penelitian/PKM</label>
                                <div class="col-md-8 col-lg-4">
                                    <select class="status-dropdown form-select">
                                        <option value="">Semua</option>
                                        <option value="Penelitian Semi Mandiri">Penelitian Semi Mandiri</option>
                                        <option value="Penelitian Di Danai Institusi">Penelitian Di Danai Institusi</option>
                                        <option value="Penelitian Institusi">Penelitian Institusi</option>
                                        <option value="Penelitian Kerjasama">Penelitian Kerjasama</option>
                                        <option value="PKM Kelompok">PKM Kelompok/Dosen</option>
                                        <option value="PKMTerstruktur">PKM Terstruktur</option>
                                    </select>
                                </div>


                                <label class="col-md-4 col-lg-2 col-form-label btn btn-primary">Status Reimbursemen</label>

                                <div class="col-md-8 col-lg-4">
                                    <select class="status-dropdown2 form-select">
                                        <option value="">Semua</option>
                                        <option value="Reimbursement belum diajukan">Reimbursement belum diajukan</option>
                                        <option value="Reimbursement dalam proses">Reimbursement dalam proses</option>
                                        <option value="Dana telah dicairkan">Dana telah dicairkan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="example" class="table table-responsive">
                                    <thead>
                                        <tr class="table-primary">
                                            <!-- <th scope="col">Nomor</th> -->
                                            <th scope="col">Jenis Penelitian/PKM</th>
                                            <th scope="col">Tanggal Pengajuan</th>
                                            <th scope="col">Judul Penelitian/Topik PKM</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!$penelitian == null) {
                                            $i = 1; ?>
                                            <?php foreach ($penelitian as $key => $post) :  ?>

                                                <tr>
                                                    <td><?php echo 'Penelitian ', $post['jenis_penelitian'] ?></td>
                                                    <td><?php echo $post['tanggal_pengajuan'] ?></td>
                                                    <td><?php echo $post['judul_penelitian'] ?></td>
                                                    <td>
                                                        <?php if ($post['id_status_reimburse'] == 0) {
                                                            echo 'Reimbursement belum diajukan';
                                                        } else if ($post['id_status_reimburse'] == 1) {
                                                            echo 'Reimbursement dalam proses';
                                                        } else if ($post['id_status_reimburse'] == 2) {
                                                            echo 'Dana telah dicairkan';
                                                        }
                                                    ?>
                                                </td>
                                                                                              
                                                
                                                <td>
                                                <a href="/detailReimburseDosen/<?= $post['id_penelitian']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                    



                                                        <!-- echo "<a class='btn btn-primary' href='/penelitianSemiMandiri1'><i class='bi bi-pencil-square'></i></a>"; -->
                                                        <!-- </td>
                                        <td>
                                            <a href="/detailReimburseDosen" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                        </td> -->
                                                </tr>
                                                <?php
                                                $i++;    ?>
                                        <?php endforeach;
                                        } ?>
                                        <?php
                                        if (!$pkm == null) {
                                            $i = 1; ?>
                                            <?php foreach ($pkm as $key => $post) :  ?>

                                                <tr>
                                                    <!-- <td><?php //echo $post['id_penelitian'] 
                                                                ?></td> -->

                                                    <td><?php echo 'PKM ', $post['jenis_pkm'] ?></td>
                                                    <td><?php echo $post['tanggal_pengajuan'] ?></td>
                                                    <td><?php echo $post['topik_kegiatan'] ?></td>
                                                    <td>
                                                    <?php if ($post['id_status_reimburse'] == 0) {
                                                            echo 'Reimbursement belum diajukan';
                                                        } else if ($post['id_status_reimburse'] == 1) {
                                                            echo 'Reimbursement dalam proses';
                                                        } else if ($post['id_status_reimburse'] == 2) {
                                                            echo 'Dana telah dicairkan';
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <!-- <a class="btn btn-primary" onclick="location.href='/penelitianSemiMandiri1'"><i class="bi bi-pencil-square"></i></a> -->
                                                    <a href="detailReimburse2Dosen/<?= $post['ID_pkm']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                    
                                                </td>
                                            </tr>
                                    <?php $i++;
                                        endforeach;
                                    } ?>
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