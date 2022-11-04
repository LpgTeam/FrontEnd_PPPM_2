<?= $this->extend('dosen/fixed/templatePenelitian') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section class="section">
        <header class="section-header2">
            <h2>Penelitian <?= $jenis ?></h2>
            <hr>
            <p>Dosen Politeknik Statistika STIS</p>
        </header>
        <div class="row justify-content-md-center" data-aos="fade-up">
            <div class="form row gy-4 justify-content-md-center col-md-8">
                <div class="form-body pt-3 col-md-14">
                    <!-- Bordered Tabs -->
                    <!-- Form -->
                    <form action="<?= base_url('/penelitian/save'); ?>" method="post" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Anda Harus Menyetujui Surat Pernyataan terlebih dahulu!'); return false; }" enctype="multipart/form-data">
                        <input name="jenis_penelitian" type="text" class="form-control" id="jenis_penelitian" value="<?= $jenis ?>" hidden>

                        <div class="row mb-3">
                            <label for="judul_penelitian" class="col-md-4 col-lg-3 col-form-label">Judul Penelitian</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="judul_penelitian" type="text" class="form-control" id="judul_penelitian" required>
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-3 col-form-label">Ketua Penelitian</label>
                        </div>

                        <div class="row mb-3">
                            <label for="namaLengkap" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="namaLengkap" type="text" class="form-control" id="namaLengkap" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="jabatan" class="col-md-4 col-lg-3 col-form-label">Jabatan Fungsional</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="jabatan" type="text" class="form-control" id="jabatan" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="progStudi" class="col-md-4 col-lg-3 col-form-label">Program Studi</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="progStudi" type="text" class="form-control" id="progStudi" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="hp" class="col-md-4 col-lg-3 col-form-label">Nomor Handphone</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="hp" type="text" class="form-control" id="hp" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="email" type="email" class="form-control" id="email" required>
                            </div>
                        </div>

                        <hr>

                        <!-- <div class="row mb-3">
                            <label for="bidang" class="col-md-4 col-lg-3 col-form-label">Bidang</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="bidang" type="text" class="form-control" id="bidang" required>
                            </div>
                        </div> -->

                        <div class="row mb-3">
                            <label class="col-md-4 col-lg-3 col-form-label" for="bidang">Bidang</label>
                            <div class="col-md-8 col-lg-9">
                                <select class="form-select" id="bidang" name="bidang">
                                    <option selected disabled>Pilih</option>
                                    <option value="1">Small Area Estimation</option>
                                    <option value="2">SDG's</option>
                                    <option value="3">Metodologi Survei dan Sensus</option>
                                    <option value="4">Sistem Indormasi Statistik </option>
                                    <option value="5">Lainnya </option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="anggota" class="col-md-4 col-lg-3 col-form-label">Jumlah Anggota</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="anggota" type="number" class="form-control" id="anggota" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="upload" class="col-md-4 col-lg-3 col-form-label ">Upload Bukti Luaran</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="upload" class="form-control" type="file" id="upload" required>
                            </div>
                        </div>

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
                        </div> -->

                        <div class="row mb-3">
                            <table class="table table1 table-advance table-hover align-middle anggota">
                                <tr class="table-primary">
                                    <th scope="col">Nama Anggota</th>
                                    <th scope="col">Program Studi</th>
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
                            <label class="col-md-4 col-lg-3 col-form-label ">Tugas/Peran Tim Peneliti</label>
                        </div>

                        <div class="row mb-3">
                            <table class="table table2 table-advance table-hover align-middle anggota">
                                <tr class="table-primary">
                                    <th scope="col">Nama Anggota</th>
                                    <th scope="col">Bidang Keahlian</th>
                                    <th scope="col">Tugas/Peran</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                <tbody>
                                </tbody>
                            </table>

                            <div class="col-md-4 col-lg-6">
                                <button onclick='add2()' class="btn btn-warning">
                                    Tambah Anggota <i class=" bi bi-plus-square"></i>
                                </button>
                            </div>
                        </div>

                        <script>
                            function rm() {
                                $(event.target).closest("tr").remove();
                            }

                            function add() {
                                $(".table1").append("<tr><td><input name='namaAnggota' class='form-control' type='text' id='namaAnggota' required></td><td><input name='studiAnggota' class='form-control' type='text' id='studiAnggota' required></td><td><button onclick='rm()' class='btn btn-danger'>Hapus</button></td></tr>");
                            }

                            function rm2() {
                                $(event.target).closest("tr").remove();
                            }

                            function add2() {
                                $(".table2").append("<tr><td><input name='namaAnggota2' class='form-control' type='text' id='namaAnggota2' required></td><td><input name='bidangAnggota' class='form-control' type='text' id='bidangAnggota' required></td><td><input name='tugasAnggota' class='form-control' type='text' id='tugasAnggota' required></td><td><button onclick='rm2()' class='btn btn-danger'>Hapus</button></td></tr>");
                            }
                        </script>

                        <div class="row justify-content-md-center" data-aos="fade-up">
                            <div class="surat row gy-4 justify-content-md-center col-md-9">
                                <h2>Surat Pernyataan</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and scrambled it to make a type
                                    specimen book. It has survived not only five centuries, but also the leap into
                                    electronic typesetting, remaining essentially unchanged. It was popularised in
                                    the 1960s with the release of Letraset sheets containing Lorem Ipsum </p>
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <input id="agree" class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                        <label>&nbspSetuju</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3"></div>
                        <div class="row mb-3"></div>

                        <hr>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#submit">Submit Form</button>
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
                <button type="button" class="btn btn-primary" onclick="location.href='/penelitianInstitusi'">Ya</button>
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
                <button type="button" class="btn btn-primary" onclick="location.href='/penelitianDosen'">Ya</button>
            </div>
        </div>
    </div>
</div> -->
<?= $this->endSection(); ?>