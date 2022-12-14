<? //= $this->extend('dosen/fixed/templatePenelitian') 
?>
<?= $this->extend('fixed/templatePenelitian') ?>

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
                                <input name="judul_penelitian" type="text" class="form-control <?= ($validation->hasError('judul_penelitian')) ? 'is-invalid' : '' ?>" id="judul_penelitian" value="<?= old('judul_penelitian'); ?>" required>
                                <div class="invalid-feedback" id="judulValid">
                                    <?= $validation->getError('judul_penelitian'); ?>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-3 col-form-label">Ketua Penelitian</label>
                        </div>

                        <div class="row mb-3">
                            <label for="namaLengkap" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="namaLengkap" type="text" class="form-control" id="cari" value="<?= old('namaLengkap'); ?>" required>
                            </div>
                        </div>

                        <input name="nip" type="hidden" class="form-control" id="nip">

                        <div class="row mb-3">
                            <label for="jabatan" class="col-md-4 col-lg-3 col-form-label">Jabatan Fungsional</label>
                            <div class="col-md-8 col-lg-9 ">
                                <input name="jabatan" type="text" class="form-control" id="jabatan" value="<?= old('jabatan'); ?>" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="progStudi" class="col-md-4 col-lg-3 col-form-label">Program Studi</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="progStudi" type="text" class="form-control" id="progStudi" value="<?= old('progStudi'); ?>" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="hp" class="col-md-4 col-lg-3 col-form-label">Nomor Handphone</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="hp" type="text" class="form-control" id="hp" value="<?= old('hp'); ?>" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="email" type="email" class="form-control" id="email" value="<?= old('email'); ?>" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bidangKeahlian" class="col-md-4 col-lg-3 col-form-label">Bidang Keahlian</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="bidangKeahlian" type="text" class="form-control" id="bidangKeahlian" value="<?= old('bidangKeahlian'); ?>" required>
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
                                    <option selected readonly>Pilih</option>
                                    <option value="Small Area Estimation">Small Area Estimation</option>
                                    <option value="SDG's">SDG's</option>
                                    <option value="Metodologi Survei dan Sensus">Metodologi Survei dan Sensus</option>
                                    <option value="Sistem Indormasi Statistik">Sistem Indormasi Statistik </option>
                                    <option value="Lainnya">Lainnya </option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="anggota" class="col-md-4 col-lg-3 col-form-label">Jumlah Anggota</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="anggota" type="number" class="form-control" id="anggota" value="<?= old('anggota'); ?>" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="biaya" class="col-md-4 col-lg-3 col-form-label">Biaya</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="biaya" type="number" min="1" step="any" class="form-control" id="biaya" value="<?= old('biaya'); ?>" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="upload" class="col-md-4 col-lg-3 col-form-label ">Upload Proposal</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="upload" class="form-control <?= ($validation->hasError('upload')) ? 'is-invalid' : ''; ?>" type="file" id="upload">
                                <div class="invalid-feedback" id="uploadValid">
                                    <?= $validation->getError('upload'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-lg-3 col-form-label ">Surat Pernyataan</label>
                            <div class="col-md-8 col-lg-9">
                                <!-- <button onclick ="" class="btn btn-primary">
                                    Download Surat Pernyataan</i>
                                </button> -->
                                <a href="<?= base_url('penelitian/printpdf') ?>" class="btn btn-primary">
                                    Download Surat Pernyataan
                                </a>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="uploadSurat" class="col-md-4 col-lg-3 col-form-label ">Upload Surat Pernyataan</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="uploadSurat" class="form-control  <?= ($validation->hasError('uploadSurat')) ? 'is-invalid' : ''; ?>" type="file" id="uploadSurat">
                                <div class="invalid-feedback" id="uploadValid2">
                                    <?= $validation->getError('uploadSurat'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <table class="table table1 table-advance table-hover align-middle anggota" id="myTableID">
                                <tr class="table-primary">
                                    <th scope="col">Nama Anggota</th>
                                    <th scope="col">NIP/NIM</th>
                                    <th scope="col">Program Studi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                <tbody>
                                </tbody>
                            </table>

                            <div class="col-md-4 col-lg-6">
                                <!-- <button onclick='add()' class="btn btn-warning">
                                    Tambah Anggota <i class=" bi bi-plus-square"></i>
                                </button> -->
                                <a onclick="add()" class="btn btn-warning" id="btn">
                                    Tambah Anggota <i class=" bi bi-plus-square"></i>
                                </a>
                                <p class="invalid-feedback" id="m" style="display: none ;">Jumlah Anggota sudah full</p>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-lg-3 col-form-label ">Tugas/Peran Tim Peneliti</label>
                        </div>

                        <div class="row mb-3">
                            <table class="table table2 table-advance table-hover align-middle anggota" id="myTableID2">
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
                                <!-- <button onclick='add2()' class="btn btn-warning">
                                    Tambah Anggota <i class=" bi bi-plus-square"></i>
                                </button> -->
                                <a onclick="add2()" class="btn btn-warning" id="btn2">
                                    Tambah Anggota <i class=" bi bi-plus-square"></i>
                                </a>
                                <p class="invalid-feedback" id="m2" style="display: none ;">Jumlah Anggota sudah full</p>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-lg-3 col-form-label ">Luaran dan Target Capaian</label>
                        </div>
                        <input name="jumlahrow" id="jumlahrow" value="" type="hidden">

                        <div class="row mb-3">
                            <table class="table table3 table-advance table-hover align-middle anggota" id="myTableID3">
                                <tr class="table-primary">
                                    <th scope="col">Jenis Luaran</th>
                                    <th scope="col">Target Capaian</th>
                                    <th scope="col">Jurnal/Konferensi Yang Dituju</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                <tbody>
                                </tbody>
                            </table>

                            <div class="col-md-4 col-lg-6">
                                <button onclick='add3()' class="btn btn-warning">
                                    Tambah Luaran <i class=" bi bi-plus-square"></i>
                                </button>
                            </div>
                        </div>

                        <script>
                            function rm() {
                                $(event.target).closest("tr").remove();
                            }

                            // function add() {
                            //     var rowCount = document.getElementById('myTableID').rows.length;
                            //     $(".table1").append("<tr><td><input name='namaAnggota" + rowCount + "' class='form-control' type='text' id='namaAnggota" + rowCount + "' required></td><td><input name='nip" + rowCount + "' class='form-control' type='text' id='nip" + rowCount + "' required></td><td><input name='studiAnggota" + rowCount + "' class='form-control' type='text' id='studiAnggota" + rowCount + "' required></td><td><button onclick='rm()' class='btn btn-danger'>Hapus</button></td></tr>");
                            //     console.log(rowCount);
                            // }
                            function add() {
                                var rowCount = document.getElementById('myTableID').rows.length;
                                var x = document.getElementById('anggota').value;
                                var btn = document.getElementById('btn');
                                var m = document.getElementById('m');
                                // btn.style.display = "block";
                                if (x > rowCount - 1) {
                                    m.style.display = 'none';
                                    $(".table1").append("<tr><td><input name='namaAnggota" + rowCount + "' class='form-control' type='text' id='namaAnggota" + rowCount + "' required></td><td><input name='nip" + rowCount + "' class='form-control' type='text' id='nip" + rowCount + "' required></td><td><input name='studiAnggota" + rowCount + "' class='form-control' type='text' id='studiAnggota" + rowCount + "' required></td><td><button onclick='rm()' class='btn btn-danger'>Hapus</button></td></tr>");
                                    console.log(rowCount);
                                    console.log(x);
                                } else {
                                    m.style.display = "block";
                                    btn.onclick() = null;
                                }
                            }

                            function rm2() {
                                $(event.target).closest("tr").remove();
                            }

                            // function add2() {
                            //     var rowCount2 = document.getElementById('myTableID2').rows.length;
                            //     $(".table2").append("<tr><td><input name='namaAnggota" + rowCount2 + "' class='form-control' type='text' id='namaAnggota" + rowCount2 + "' required></td><td><input name='bidangAnggota" + rowCount2 + "' class='form-control' type='text' id='bidangAnggota" + rowCount2 + "' required></td><td><input name='tugasAnggota" + rowCount2 + "' class='form-control' type='text' id='tugasAnggota" + rowCount2 + "' required></td><td><button onclick='rm2()' class='btn btn-danger'>Hapus</button></td></tr>");
                            //     console.log(rowCount2);
                            // }
                            function add2() {

                                var rowCount2 = document.getElementById('myTableID2').rows.length;
                                var x = document.getElementById('anggota').value;
                                var btn = document.getElementById('btn2');
                                var m = document.getElementById('m2');
                                // btn.style.display = "block";
                                if (x > rowCount2 - 1) {
                                    m.style.display = 'none';
                                    $(".table2").append("<tr><td><input name='namaAnggota" + rowCount2 + "' class='form-control' type='text' id='namaAnggota" + rowCount2 + "' required></td><td><input name='bidangAnggota" + rowCount2 + "' class='form-control' type='text' id='bidangAnggota" + rowCount2 + "' required></td><td><input name='tugasAnggota" + rowCount2 + "' class='form-control' type='text' id='tugasAnggota" + rowCount2 + "' required></td><td><button onclick='rm2()' class='btn btn-danger'>Hapus</button></td></tr>");
                                    console.log(rowCount2);
                                } else {
                                    m.style.display = "block";
                                    btn.onclick() = null;
                                }
                            }

                            function rm3() {
                                $(event.target).closest("tr").remove();
                            }

                            function add3() {
                                var m = document.getElementById('jumlahrow');
                                var rowCount3 = document.getElementById('myTableID3').rows.length;
                                $(".table3").append("<tr><td><input name='jenisLuaran" + rowCount3 + "' class='form-control' type='text' id='jenisLuaran" + rowCount3 + "' required></td><td><input name='targetCapaian" + rowCount3 + "' class='form-control' type='text' id='targetCapaian" + rowCount3 + "' required></td><td><input name='jurnalTujuan" + rowCount3 + "' class='form-control' type='text' id='jurnalTujuan" + rowCount3 + "' required></td><td><button onclick='rm2()' class='btn btn-danger'>Hapus</button></td></tr>");
                                console.log(rowCount3);
                                m.value = rowCount3;
                            }
                        </script>


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