<?= $this->extend('dosen/fixed/templatePKM') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section class="section">
        <header class="section-header2">
            <h2>PKM Dosen/Kelompok Dosen</h2>
            <hr>
            <p>Dosen Politeknik Statistika STIS</p>
        </header>
        <div class="row justify-content-md-center" data-aos="fade-up">
            <div class="form row gy-4 justify-content-md-center col-md-8">
                <div class="form-body pt-3 col-md-14">
                    <!-- Bordered Tabs -->
                    <!-- Form -->
                    <form action="<?= base_url('/pkm/save'); ?>" method="post" enctype="multipart/form-data">

                        <input name="jenis_pkm" type="text" class="form-control" id="jenis_pkm" value="<?= $jenis ?>" hidden>


                        <div class="row mb-3">
                            <label label for="topik" class="col-md-4 col-lg-3 col-form-label">Topik PKM</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="topik" type="text" class="form-control" id="topik" required>
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-3 col-form-label">Ketua PKM</label>
                        </div>

                        <div class="row mb-3">
                            <label for="namaLengkap" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="namaLengkap" type="text" class="form-control" id="namaLengkap" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nip" class="col-md-4 col-lg-3 col-form-label">NIP</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="nip" type="text" class="form-control" id="nip" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="pangkat" class="col-md-4 col-lg-3 col-form-label">Pangkat/Golongan</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="pangkat" type="text" class="form-control" id="pangkat" required>
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-3">
                            <label for="bentukKegiatan" class="col-md-4 col-lg-3 col-form-label">Bentuk Kegiatan</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="bentukKegiatan" type="text" class="form-control" id="bentukKegiatan" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="waktu" class="col-md-4 col-lg-3 col-form-label">Waktu Pelaksanaan</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="waktu" type="date" class="form-control" id="waktu" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tempat" class="col-md-4 col-lg-3 col-form-label">Tempat</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="tempat" type="text" class="form-control" id="tempat" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sasaran" class="col-md-4 col-lg-3 col-form-label">Sasaran</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="sasaran" type="text" class="form-control" id="sasaran" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="target" class="col-md-4 col-lg-3 col-form-label">Target jumlah peserta</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="target" type="number" class="form-control" id="target" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="anggota" class="col-md-4 col-lg-3 col-form-label">Jumlah Anggota</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="anggota" type="number" class="form-control" id="anggota" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="hasil" class="col-md-4 col-lg-3 col-form-label">Hasil Yang Diharapkan</label>
                            <div class="col-md-8 col-lg-9">
                                <textarea class="form-control" id="hasil" name="hasil" rows="3" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <table class="table table1 table-advance table-hover align-middle anggota" id="myTableID">
                                <tr class="table-primary">
                                    <th scope="col">Nama Anggota</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Pangkat/Golongan</th>
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

                        <div class="row mb-3">
                            <label class="col-md-4 col-lg-3 col-form-label ">Pembiayaan/Lainnya Yang Diajukan</label>
                        </div>

                        <div class="row mb-3">
                            <table class="table table2 table-advance table-hover align-middle anggota" id="myTableID2">
                                <tr class="table-primary">
                                    <th scope="col">Pembiayaan/Lainnya Yang Diajukan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                <tbody>
                                </tbody>
                            </table>

                            <div class="col-md-4 col-lg-6">
                                <button onclick='add2()' class="btn btn-warning">
                                    Tambah Pengajuan <i class=" bi bi-plus-square"></i>
                                </button>
                            </div>
                        </div>

                        <script>
                            function rm() {
                                $(event.target).closest("tr").remove();
                            }

                            function add() {
                                var rowCount = document.getElementById('myTableID').rows.length;
                                $(".table1").append("<tr><td><input name='namaAnggota" + rowCount + "' class='form-control' type='text' id='namaAnggota" + rowCount + "' required></td><td><input name='nipAnggota" + rowCount + "' class='form-control' type='text' id='nipAnggota" + rowCount + "' required></td><td><input name='pangkatAnggota" + rowCount + "' class='form-control' type='text' id='pangkatAnggota" + rowCount + "' required></td><td><button onclick='rm()' class='btn btn-danger'>Hapus</button></td></tr>");
                                console.log(rowCount);
                            }

                            function rm2() {
                                $(event.target).closest("tr").remove();
                            }

                            function add2() {
                                var rowCount2 = document.getElementById('myTableID2').rows.length;
                                $(".table2").append("<tr><td><input name='pembiayaan" + rowCount2 + "' class='form-control' type='text' id='pembiayaan" + rowCount2 + "' required></td><td><button onclick='rm2()' class='btn btn-danger'>Hapus</button></td></tr>");
                                console.log(rowCount2);
                            }
                        </script>

                        <!-- <div class="row mb-3">
                            <table class="table table-advance table-hover align-middle ">
                                <thead>
                                    <tr class="table-primary">
                                        <th scope="col">Nama Anggota</th>
                                        <th scope="col">Program Studi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Joko Sulistyo</td>
                                        <td>Komputasi Statistik</td>
                                    </tr>
                                    <tr>
                                        <td>Annisa Rahmawati</td>
                                        <td>Komputasi Statistik</td>
                                    </tr>
                                    <tr>
                                        <td>Susanto Jayakertanegara</td>
                                        <td>Komputasi Statistik</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 col-lg-3">
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#add">Tambah Anggota <i class=" bi bi-plus-square"></i></button>
                            </div>
                        </div>

                        <div class="row mb-3"></div>
                        <div class="row mb-3"></div>

                        <div class="row mb-3">
                            <table class="table table-advance table-hover align-middle ">
                                <thead>
                                    <tr class="table-primary">
                                        <th scope="col">Pembiayaan/Lainnya Yang Diajukan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Surat Tugas</td>
                                    </tr>
                                    <tr>
                                        <td>Transportasi Lokal</td>
                                    </tr>
                                    <tr>
                                        <td>Uang Harian</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 col-lg-3">
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#add2">Tambah Pengajuan <i class=" bi bi-plus-square"></i></button>
                            </div>
                        </div>

                        <div class="row mb-3"></div>
                        <div class="row mb-3"></div>-->

                        <hr>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Submit Form</button>
                        </div>
                    </form><!-- Form End -->


                </div>

            </div>
        </div>

        </div>
        </div>
    </section>
</main>
<!-- End #main -->

<!-- Tambah Anggota -->
<!-- <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addLabel">Tambah</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="namaAnggota" class="col-form-label">Nama Anggota :</label>
                    <input type="text" class="form-control" id="namaAnggota" name="namaAnggota">
                </div>
                <div class="mb-3">
                    <label for="studiAnggota" class="col-form-label">Program Studi :</label>
                    <input type="text" class="form-control" id="studiAnggota" name="studiAnggota">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary" onclick="location.href='/pkmKelompok'">Ya</button>
            </div>
            <div class="w-100">
            </div>
        </div>
    </div>
</div> -->

<!-- Tambah Pembiayaan -->
<!-- <div class="modal fade" id="add2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="add2Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="add2Label">Tambah Pembiayaan/Lainnya Yang Diajukan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="pengajuan" class="col-form-label">Jenis Pengajuan</label>
                    <input type="text" class="form-control" id="pengajuan" name="pengajuan">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary" onclick="location.href='/pkmKelompok'">Ya</button>
            </div>
            <div class="w-100">
            </div>
        </div>
    </div>
</div> -->

<!-- Submit Form -->
<!-- <div class="modal fade" id="submit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="submitLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="submitLabel">Submit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin akan submit formulir?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary" onclick="location.href='/pkmDosen'">Ya</button>
            </div>
        </div>
    </div>
</div> -->
<?= $this->endSection(); ?>