<?= $this->extend('fixed/templatePKM') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section class="section">
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger" role="alert" data-aos="zoom-in">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
        <header class="section-header2">
            <h2>PKM <?= $jenis ?></h2>
            <hr>
            <p>Dosen Politeknik Statistika STIS</p>
        </header>
        <div class="row justify-content-md-center" data-aos="fade-up">
            <div class="form row gy-4 justify-content-md-center col-md-8">
                <div class="form-body pt-3 col-md-14">
                    <!-- Bordered Tabs -->
                    <!-- Form -->
                    <form action="<?= base_url('/pkm/save'); ?>" method="post" onsubmit="if(document.getElementById('agree').checked){ return submitForm(this); } else { return alertForm(this); return false; }" enctype="multipart/form-data">

                        <input name="jenis_pkm" type="text" class="form-control" id="jenis_pkm" value="<?= $jenis ?>" hidden>

                        <div class="row mb-3">
                            <label label for="topik" class="col-md-4 col-lg-3 col-form-label">Topik PKM</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="topik" type="text" class="form-control" id="topik" value="<?= old("topik") ?>" required>
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-3 col-form-label">Ketua PKM</label>
                        </div>

                        <div class="row mb-3">
                            <label for="namaLengkap" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="namaLengkap" type="text" class="form-control" id="namaLengkap" value="<?= $user['nama_dosen']; ?>" readonly style="background: #E8E8E8;">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nip" class="col-md-4 col-lg-3 col-form-label">NIP</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="nip" type="text" class="form-control" id="nip" value="<?= $user['NIP_dosen']; ?>" readonly style="background: #E8E8E8;">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="pangkat" class="col-md-4 col-lg-3 col-form-label">Pangkat/Golongan</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="pangkat" type="text" class="form-control" id="pangkat" value="<?= old("pangkat") ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="bidang" class="col-md-4 col-lg-3 col-form-label">Bidang Keahlian</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="bidang" type="text" class="form-control" id="bidang" value="<?= old("bidang") ?>" required>
                            </div>
                        </div>

                        <hr>
                        <div class="row mb-3">
                            <label for="bentukKegiatan" class="col-md-4 col-lg-3 col-form-label">Bentuk Kegiatan</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="bentukKegiatan" type="text" class="form-control" id="bentukKegiatan" value="<?= old("bentukKegiatan") ?>" required>
                            </div>
                        </div>
                        <!-- <div class="row mb-3">
                            <label class="  col-md-4 col-lg-3 col-form-label" for="pilihKegiatan">Bentuk Kegiatan</label>
                            <div class="col-md-8 col-lg-9">
                                <select class="form-select" id="pilihKegiatan" name="pilihKegiatan" required>
                                    <option selected disabled>Pilih</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div> -->

                        <div class="row mb-3">
                            <label for="waktu" class="col-md-4 col-lg-3 col-form-label">Waktu Pelaksanaan</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="waktu" type="date" class="form-control" id="waktu" value="<?= old("waktu") ?>" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tempat" class="col-md-4 col-lg-3 col-form-label">Tempat</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="tempat" type="text" class="form-control" id="tempat" value="<?= old("tempat") ?>" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sasaran" class="col-md-4 col-lg-3 col-form-label">Sasaran</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="sasaran" type="text" class="form-control" id="sasaran" value="<?= old("sasaran") ?>" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="target" class="col-md-4 col-lg-3 col-form-label">Target jumlah peserta</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="target" type="number" class="form-control" id="target" value="<?= old("target") ?>" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="anggota" class="col-md-4 col-lg-3 col-form-label">Jumlah Anggota</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="anggota" type="number" class="form-control" id="anggota" value="<?= old("anggota") ?>" required>
                            </div>
                        </div>
                        <?php if (($jenis == "Kelompok" || $jenis == "Terstruktur")) : ?>
                            <div class="row mb-3">
                                <label for="hasil" class="col-md-4 col-lg-3 col-form-label">Hasil Yang Diharapkan</label>
                                <div class="col-md-8 col-lg-9">
                                    <textarea class="form-control" id="hasil" name="hasil" rows="3" value="<?= old("hasil") ?>" required></textarea>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (!($jenis == "Kelompok" || $jenis == "Terstruktur")) : ?>
                            <hr>
                            <div class="row mb-3">
                                <label for="narasumber" class="col-md-4 col-lg-3 col-form-label">Narasumber</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="narasumber" type="text" class="form-control" id="narasumber" value="<?= old("narasumber") ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="penyelenggara" class="col-md-4 col-lg-3 col-form-label">Penyelenggara</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="penyelenggara" type="text" class="form-control" id="penyelenggara" value="<?= old("penyelenggara") ?>" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <label for="uploadBukti" class="col-md-4 col-lg-3 col-form-label ">Upload Bukti Kegiatan</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="uploadBukti" class="form-control <?= ($validation->hasError('uploadBukti')) ? 'is-invalid' : ''; ?>" type="file" id="uploadBukti">
                                    <div class="invalid-feedback" id="uploadValid">
                                        <?= $validation->getError('uploadBukti'); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label ">Surat Pernyataan</label>
                                <div class="col-md-8 col-lg-9">
                                    <a href="<?= base_url('pkm/printSurat') ?>" class="btn btn-primary">
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
                            </div> -->
                        <?php endif; ?>

                        <div class="row mb-3">
                            <div class="table-responsive">
                                <table class="table table1 table-advance table-hover align-middle anggota" id="myTableID">
                                    <tr class="table-primary">
                                        <th scope="col">Nama Anggota</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col">Pangkat/Golongan</th>
                                        <th scope="col">Bidang Keahlian</th>
                                        <th scope="col">Tugas/Peran</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-4 col-lg-6">
                                <a onclick="add()" class="btn btn-warning" id="btn">
                                    Tambah Anggota <i class=" bi bi-plus-square"></i>
                                </a>
                                <p class="invalid-feedback" id="m" style="display: none ;">Jumlah Anggota sudah full</p>

                            </div>
                        </div>
                        <?php if (($jenis == "Kelompok" || $jenis == "Terstruktur")) : ?>
                            <input name="jumlahrow" id="jumlahrow" value="" type="hidden">
                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label ">Pembiayaan/Lainnya Yang Diajukan</label>
                            </div>
                            <div class="row mb-3">
                                <div class="table-responsive">
                                    <table class="table table2 table-advance table-hover align-middle anggota" id="myTableID2">
                                        <tr class="table-primary">
                                            <th scope="col">Pembiayaan/Lainnya Yang Diajukan</th>
                                            <th scope="col">Jumlah Biaya</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-4 col-lg-6">
                                    <a onclick="add2()" class="btn btn-warning" id="btn">
                                        Tambah Pengajuan <i class=" bi bi-plus-square"></i>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                        <? //php if (!($jenis == "Kelompok" || $jenis == "Terstruktur")) : 
                        ?>
                        <hr>
                        <div class="row justify-content-md-center" data-aos="fade-up">
                            <div class="surat row gy-4 justify-content-md-center col-md-9">
                                <h2>Surat Pernyataan</h2>
                                <p>Dengan ini kami menyatakan bahwa hasil penelitian kami bersifat original dan bebas
                                    dari unsur plagiarisme. Jika dikemudian hari ditemukan ketidaksesuaian dengan
                                    pernyataan ini, saya bersedia dituntut dan diproses sesuai dengan ketentuan yang
                                    berlaku dan mengembalikan seluruh biaya yang sudah saya terima. </p>
                                <hr>
                                <p>Dengan anda meyetujui, maka tanda tangan yang anda upload akan otomatis tergenerate
                                    ke file surat pernyataan pada proposal</p>
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <input id="agree" name="agree" class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                        <label for="agree">&nbspSetuju</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <? //php endif; 
                        ?>
                        <script>
                            function rm() {
                                $(event.target).closest("tr").remove();
                            }

                            function add() {
                                var btn = document.getElementById('btn');
                                var x = document.getElementById('anggota').value;
                                var m = document.getElementById('m');
                                var rowCount = document.getElementById('myTableID').rows.length;
                                if (x > rowCount - 1) {
                                    m.style.display = 'none';
                                    $(".table1").append("<tr><td><input name='namaAnggota" + rowCount + "' class='form-control' type='text' id='namaAnggota" + rowCount + "' required></td><td><input name='nipAnggota" + rowCount + "' class='form-control' type='text' id='nipAnggota" + rowCount + "' required></td><td><input name='pangkatAnggota" + rowCount + "' class='form-control' type='text' id='pangkatAnggota" + rowCount + "' required></td><td><input name='bidangAnggota" + rowCount + "' class='form-control' type='text' id='bidangAnggota" + rowCount + "' required></td><td><input name='peranAnggota" + rowCount + "' class='form-control' type='text' id='peranAnggota" + rowCount + "' required></td><td><button onclick='rm()' class='btn btn-danger'>Hapus</button></td></tr>");
                                    console.log(rowCount);
                                } else {
                                    m.style.display = "block";
                                    btn.onclick() = null;
                                }
                            }

                            function rm2() {
                                $(event.target).closest("tr").remove();
                            }

                            function add2() {
                                var m = document.getElementById('jumlahrow');
                                var rowCount2 = document.getElementById('myTableID2').rows.length;
                                $(".table2").append("<tr><td><input name='pembiayaan" + rowCount2 + "' class='form-control' type='text' id='pembiayaan" + rowCount2 + "' required></td><td><input name='jumlahBiaya" + rowCount2 + "' class='form-control' type='text' id='jumlahBiaya" + rowCount2 + "' required></td><td><button onclick='rm2()' class='btn btn-danger'>Hapus</button></td></tr>");
                                console.log(rowCount2);
                                m.value = rowCount2;
                            }
                        </script>
                        <!-- 
                        <div class="row mb-3">
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
                        </div> -->

                        <div class="row mb-3"></div>
                        <div class="row mb-3"></div>

                        <hr>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Submit Form</button>
                        </div>
                    </form><!-- Form End -->
                    <script>
                        function submitForm(form) {
                            swal({
                                    title: "Apakah Anda Yakin?",
                                    text: "",
                                    buttons: true,
                                })
                                .then(function(isOkay) {
                                    if (isOkay) {
                                        form.submit();
                                    }
                                });
                            return false;
                        }

                        function alertForm(form) {
                            swal({
                                title: "Gagal Submit",
                                icon: "error",
                                text: "Anda harus menyetujui persyaratan terlebih dahulu!",
                            })
                            return false;
                        }
                    </script>

                </div>

            </div>
        </div>

        </div>
        </div>
    </section>

    <?php if (($jenis == "Mandiri")) : ?>
        <button type="button" class="btn btn-warning dropup position-fixed bottom-0 start-0 rounded-circle m-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="bi bi-question-square-fill"></i><span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-success p-2"><span class="visually-hidden">unread messages</span></span>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">PKM Mandiri</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <b>Deskripsi</b>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <ul>
                                            <li>
                                                Kegiatan PKM yang merupakan inisiatif dosen dan tidak dibiayai oleh institusi (tanpa menggunakan fasilitas dana dari institusi)
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>

    <?php if (($jenis == "Kelompok")) : ?>
        <button type="button" class="btn btn-warning dropup position-fixed bottom-0 start-0 rounded-circle m-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="bi bi-question-square-fill"></i><span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-success p-2"><span class="visually-hidden">unread messages</span></span>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">PKM Perorangan/Kelompok</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <b>Deskripsi</b>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <ul>
                                            <li>
                                                Kegiatan PKM yang kegiatannya merupakan inisiatif dari dosen dengan fasilitas
                                                dan/atau pembiayaan dari institusi.
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                        <b>Bentuk Kegiatan</b>
                                    </button>
                                </h2>
                                <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Bentuk kegiatan menyesuaikan dengan kondisi dan kreativitas dosen dalam bentuk literasi statistik
                                            berupa pendampingan, pelatihan, penyelesaian <i>official statistics, sampling, data science,</i> komputasi statistik,
                                            atau bentuk lainnya.
                                        </p>
                                        <p>Dapat dilaksanakan dengan:</p>
                                        <ul>
                                            <li>
                                                Di luar kota dan menginap
                                            </li>
                                            <li>
                                                Di dalam Kota Jakarta, Depok, Bekasi, Bogor, Tangerang yang tidak menginap
                                            </li>
                                            <li>
                                                Secara daring
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                        <b>Persyaratan</b>
                                    </button>
                                </h2>
                                <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <ul>
                                            <li>
                                                Fungsional dosen atau calon fungsional dosen
                                            </li>
                                            <li>
                                                Dapat perorangan atau tim
                                            </li>
                                            <li>
                                                Pengusul adalah fungsional dosen sebagai ketua tim, dengan dosen dan/atau calon fungsional dosen sebagai anggota
                                            </li>
                                            <li>
                                                Paling banyak satu kali satu tahun
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading5">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                        <b>Pendanaan</b>
                                    </button>
                                </h2>
                                <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <p>Komponen kegiatan PKM yang dibiayai meliputi: </p>
                                        <ul>
                                            <li>
                                                Komponen biaya perjalanan untuk 3 hari (luar kota) dan 1 hari (dalam kota)
                                            </li>
                                            <li>
                                                Biaya lainnya yang dapat dipertanggungjawabkan
                                            </li>
                                            <li>
                                                Politeknik Statistika STIS tidak memberikan honor sebagai narasumber bagi dosen yang melaksanakan PKM
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>

    <?php if (($jenis == "Terstruktur")) : ?>
        <button type="button" class="btn btn-warning dropup position-fixed bottom-0 start-0 rounded-circle m-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="bi bi-question-square-fill"></i><span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-success p-2"><span class="visually-hidden">unread messages</span></span>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">PKM Terstruktur</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <b>Deskripsi</b>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <ul>
                                            <li>
                                                Kegiatan PKM yang kegiatannya dirancang oleh pengelola atau institusi. Kegiatan dapat
                                                berkolaborasi dengan mahasiswa, instansi induk, atau instansi lain.
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                        <b>Bentuk Kegiatan</b>
                                    </button>
                                </h2>
                                <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Beberapa contoh kegiatan di sini antara lain;
                                        </p>
                                        <ul>
                                            <li>
                                                Pemberdayaan Desa Tertinggal (PDT) yang merupakan kolaborasi dengan kegiatan mahasiswa
                                            </li>
                                            <li>
                                                Penyelenggaraan Webinar Statistika terstruktur sebagai bentuk pengabdian kepada masyarakat
                                            </li>
                                            <li>
                                                Keikutsertaan dalam Program Desa Cinta Statistik (DESA CANTIK) dari BPS
                                            </li>
                                            <li>
                                                Pemasyarakatan Statistik lainnya yang dikelola oleh institusi
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>



                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading5">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                        <b>Pendanaan</b>
                                    </button>
                                </h2>
                                <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <ul>
                                            <li>
                                                Pembiayaan ditanggung oleh institusi sesuai dengan ketentuan yang berlaku. Komponen
                                                yang dibiayai mencakup transportasi, penginapan, uang harian, dan komponen lain yang
                                                dapat dipertanggungjawabkan
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>
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
                <button type="button" class="btn btn-primary" onclick="location.href='/pkmTerstruktur'">Ya</button>
            </div>
            <div class="w-100">
            </div>
        </div>
    </div>
</div>
                        -->
<!-- Tambah Pembiayaan 
<div class="modal fade" id="add2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="add2Label" aria-hidden="true">
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
                <button type="button" class="btn btn-primary" onclick="location.href='/pkmTerstruktur'">Ya</button>
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