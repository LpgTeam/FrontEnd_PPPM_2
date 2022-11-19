<?= $this->extend('dosen/fixed/templatePenelitian') ?>

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
            <div class="container" data-aos="fade-up">
                <div class="row gy-4">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Proposal</h3>
                            <p>
                                Proses peninjauan dan persetujuan proposal penelitian
                                yang diajukan oleh dosen
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-box orange">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Pendanaan</h3>
                            <p>
                                Pendanaan untuk kegiatan publikasi dari penelitian yang
                                dilakukan oleh dosen
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-box green service-box3">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Laporan</h3>
                            <p>
                                Pelaporan hasil kegiatan penelitain yang dilakukan oleh dosen
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-box purple">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Selesai</h3>
                            <p>
                                Proses penelitian selesai dilaksanakan oleh dosen
                            </p>
                        </div>
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
                            <h5 class="card-title text-center">Laporan</h5>
                            <hr>
                            <p>Upload laporan penelitian dan pengisian tabel
                                luaran dan capaian yang telah dilakukan oleh
                                Dosen Politeknik Statistika STIS
                            </p>
                            <hr>
                            <form action="<?= base_url('/penelitianDetail/saveLaporan/' . $penelitian['id_penelitian']); ?>" method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <table class="table table1 table-advance table-hover align-middle anggota" id="myTableID">
                                        <tr class="table-primary">
                                            <th scope="col">Jenis Luaran</th>
                                            <th scope="col">Capaian</th>
                                            <th scope="col">Jurnal/Konferensi</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                        <tbody>
                                        </tbody>
                                    </table>

                                    <div class="col-md-4 col-lg-6">
                                        <button onclick='add()' class="btn btn-warning">
                                            Tambah Anggota <i class=" bi bi-plus-square"></i>
                                        </button>
                                    </div>
                                </div>
                                <input name="jumlahrow" id="jumlahrow" value="" type="hidden">

                                <script>
                                    function rm() {
                                        $(event.target).closest("tr").remove();
                                    }

                                    function add() {
                                        var m = document.getElementById('jumlahrow');
                                        var rowCount = document.getElementById('myTableID').rows.length;
                                        $(".table1").append("<tr><td><input name='jenisLuaran" + rowCount + "' class='form-control' type='text' id='jenisLuaran" + rowCount + "' required></td><td><input name='targetCapaian" + rowCount + "' class='form-control' type='text' id='targetCapaian" + rowCount + "' required></td><td><input name='jurnalTujuan" + rowCount + "' class='form-control' type='text' id='jurnalTujuan" + rowCount + "' required></td><td><button onclick='rm()' class='btn btn-danger'>Hapus</button></td></tr>");
                                        console.log(rowCount);
                                        m.value = rowCount;
                                    }
                                </script>

                                <div class="row mb-4">
                                    <label for="laporan" class="col-md-3 col-lg-4 col-form-label ">Laporan</label>
                                    <div class="col-md-3 col-lg-8">
                                        <input class="form-control" type="file" id="laporan" name="laporan" required>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
    </section>

</main>
<!-- End #main -->
<?= $this->endSection(); ?>