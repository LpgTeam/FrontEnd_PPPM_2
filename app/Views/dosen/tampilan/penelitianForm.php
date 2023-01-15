<? //= $this->extend('dosen/fixed/templatePenelitian') 
?>
<?= $this->extend('fixed/templatePenelitian') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section class="section">
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger" role="alert" data-aos="zoom-in">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
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
                    <form action="<?= base_url('/penelitian/save'); ?>" method="post" onsubmit="if(document.getElementById('agree').checked){ return submitForm(this); } else { return alertForm(this); return false; }" enctype="multipart/form-data">
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
                                <input name="namaLengkap" type="text" class="form-control" id="cari" value="<?= $user['nama_dosen'] ?>" readonly style="background: #E8E8E8;">
                            </div>
                        </div>

                        <input name="nip" type="hidden" class="form-control" id="nip">

                        <div class="row mb-3">
                            <label for="jabatan" class="col-md-4 col-lg-3 col-form-label">Jabatan Fungsional</label>
                            <div class="col-md-8 col-lg-9 ">
                                <input name="jabatan" type="text" class="form-control" id="jabatan" value="<?= $user['jabatan_dosen'] ?>" readonly style="background: #E8E8E8;">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="progStudi" class="col-md-4 col-lg-3 col-form-label">Program Studi</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="progStudi" type="text" class="form-control" id="progStudi" value="<?= $user['program_studi'] ?>" readonly style="background: #E8E8E8;">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="hp" class="col-md-4 col-lg-3 col-form-label">Nomor Handphone</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="hp" type="text" class="form-control" id="hp" value="<?= $user['no_hp'] ?>" readonly style="background: #E8E8E8;">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="email" type="email" class="form-control" id="email" value="<?= $user['email_dosen'] ?>" readonly style="background: #E8E8E8;">
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
                                    <option value="Sistem Informasi Statistik">Sistem Informasi Statistik </option>
                                    <option value="Sains Data">Sains Data</option>
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
                        <?php if (!($jenis == "Mandiri" || $jenis == "Kerjasama")) : ?>
                            <div class="row mb-3">
                                <label for="biaya" class="col-md-4 col-lg-3 col-form-label">Biaya</label>

                                <div class="col-md-8 col-lg-9">
                                    <input name="biaya" type="number" min="1" step="any" class="form-control" id="biaya" value="<?= old('biaya'); ?>" required placeholder="Masukkan 0 jika tidak ada biaya yang dikeluarkan">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label ">Template Proposal</label>
                                <div class="col-md-8 col-lg-9">
                                    <a href="<?= base_url('penelitian/printProposal') ?>" class="btn btn-primary">
                                        Download Template Proposal
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="upload" class="col-md-4 col-lg-3 col-form-label ">Upload Proposal (.pdf)</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="upload" class="form-control <?= ($validation->hasError('upload')) ? 'is-invalid' : ''; ?>" type="file" id="upload" required>
                                    <div class="invalid-feedback" id="uploadValid">
                                        <?= $validation->getError('upload'); ?>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="row mb-3">
                                <label for="uploadSign" class="col-md-4 col-lg-3 col-form-label ">Upload Tanda Tangan Anda (Ketua Tim)</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="uploadSign" class="form-control  <?= ($validation->hasError('uploadSign')) ? 'is-invalid' : ''; ?>" type="file" id="uploadSign" required placeholder="Tanda tangan dalam format gambar (JPEG/JPG/PNG)">
                                    <div class="invalid-feedback" id="uploadValid2">
                                        <?= $validation->getError('uploadSign'); ?>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <label>Tanda tangan dalam format gambar (JPEG/JPG/PNG)</label>
                            </div> -->
                        <?php endif; ?>

                        <?php if ($jenis == "Mandiri" || $jenis == "Kerjasama") : ?>
                            <div class="row mb-3">
                                <label for="templateLuaran" class="col-md-4 col-lg-3 col-form-label ">Contoh Bukti Luaran Publikasi</label>
                                <div class="col-md-8 col-lg-9">
                                    <a href="/penelitian/printBuktiLuaran" class="btn btn-primary">Download Contoh Bukti Luaran Publikasi</a>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="uploadBukti" class="col-md-4 col-lg-3 col-form-label ">Upload Bukti Luaran (.pdf)</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="uploadBukti" class="form-control <?= ($validation->hasError('uploadBukti')) ? 'is-invalid' : ''; ?>" type="file" id="uploadBukti" aria-describedby="uploadValid ">
                                    <div class="invalid-feedback" id="uploadValid">
                                        <?= $validation->getError('uploadBukti'); ?>
                                    </div>
                                </div>

                            </div>
                        <?php endif; ?>

                        <div class="row mb-3">
                            <div class="table-responsive">
                                <table class="table table1 table-advance table-hover align-middle anggota" id="myTableID">
                                    <tr class="table-primary">
                                        <th scope="col">Nama Anggota</th>
                                        <th scope="col">NIP/NIM</th>
                                        <th scope="col">Program Studi</th>
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

                        <!-- <div class="row mb-3">
                            <label class="col-md-4 col-lg-3 col-form-label ">Tugas/Peran Tim Peneliti</label>
                        </div> -->

                        <!-- <div class="row mb-3"> -->
                        <!-- <table class="table table2 table-advance table-hover align-middle anggota" id="myTableID2">
                                <tr class="table-primary">
                                    <th scope="col">Nama Anggota</th>
                                    <th scope="col">Bidang Keahlian</th>
                                    <th scope="col">Tugas/Peran</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                <tbody>
                                </tbody>
                            </table> -->

                        <!-- <div class="col-md-4 col-lg-6"> -->
                        <!-- <button onclick='add2()' class="btn btn-warning">
                                    Tambah Anggota <i class=" bi bi-plus-square"></i>
                                </button> -->
                        <!-- <a onclick="add2()" class="btn btn-warning" id="btn2">
                                    Tambah Anggota <i class=" bi bi-plus-square"></i>
                                </a>
                                <p class="invalid-feedback" id="m2" style="display: none ;">Jumlah Anggota sudah full</p>

                            </div> -->
                        <!-- </div> -->

                        <div class="row mb-3">
                            <label class="col-md-4 col-lg-3 col-form-label ">Luaran dan Target Capaian</label>
                        </div>
                        <input name="jumlahrow" id="jumlahrow" value="" type="hidden">

                        <div class="row mb-3">
                            <div class="table-responsive">
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
                            </div>

                            <div class="col-md-4 col-lg-6">
                                <a onclick='add3()' class="btn btn-warning">
                                    Tambah Luaran <i class=" bi bi-plus-square"></i>
                                </a>
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
                                    $(".table1").append("<tr><td><input name='namaAnggota" + rowCount +
                                        "' class='form-control' type='text' id='namaAnggota" + rowCount +
                                        "' required></td><td><input name='nip" + rowCount + "' class='form-control' type='text' id='nip" + rowCount +
                                        "' required></td><td><input name='studiAnggota" + rowCount +
                                        "' class='form-control' type='text' id='studiAnggota" + rowCount +
                                        "' required></td><td><input name='bidangAnggota" + rowCount +
                                        "' class='form-control' type='text' id='bidangAnggota" + rowCount +
                                        "' required></td><td><input name='tugasAnggota" + rowCount +
                                        "' class='form-control' type='text' id='tugasAnggota" + rowCount +
                                        "' required></td><td><button onclick='rm()' class='btn btn-danger'>Hapus</button></td></tr>");
                                    console.log(rowCount);
                                    console.log(x);
                                } else {
                                    m.style.display = "block";
                                    btn.onclick() = null;
                                }
                            }

                            // function rm2() {
                            //     $(event.target).closest("tr").remove();
                            // }

                            // function add2() {
                            //     var rowCount2 = document.getElementById('myTableID2').rows.length;
                            //     $(".table2").append("<tr><td><input name='namaAnggota" + rowCount2 + "' class='form-control' type='text' id='namaAnggota" + rowCount2 + "' required></td><td><input name='bidangAnggota" + rowCount2 + "' class='form-control' type='text' id='bidangAnggota" + rowCount2 + "' required></td><td><input name='tugasAnggota" + rowCount2 + "' class='form-control' type='text' id='tugasAnggota" + rowCount2 + "' required></td><td><button onclick='rm2()' class='btn btn-danger'>Hapus</button></td></tr>");
                            //     console.log(rowCount2);
                            // }
                            // function add2() {

                            //     var rowCount2 = document.getElementById('myTableID2').rows.length;
                            //     var x = document.getElementById('anggota').value;
                            //     var btn = document.getElementById('btn2');
                            //     var m = document.getElementById('m2');
                            //     // btn.style.display = "block";
                            //     if (x > rowCount2 - 1) {
                            //         m.style.display = 'none';
                            //         $(".table2").append("<tr><td><input name='namaAnggota" + rowCount2 + "' class='form-control' type='text' id='namaAnggota" + rowCount2 + "' required></td><td><input name='bidangAnggota" + rowCount2 + "' class='form-control' type='text' id='bidangAnggota" + rowCount2 + "' required></td><td><input name='tugasAnggota" + rowCount2 + "' class='form-control' type='text' id='tugasAnggota" + rowCount2 + "' required></td><td><button onclick='rm2()' class='btn btn-danger'>Hapus</button></td></tr>");
                            //         console.log(rowCount2);
                            //     } else {
                            //         m.style.display = "block";
                            //         btn.onclick() = null;
                            //     }
                            // }

                            function rm3() {
                                $(event.target).closest("tr").remove();
                            }

                            function add3() {
                                var m = document.getElementById('jumlahrow');
                                var rowCount3 = document.getElementById('myTableID3').rows.length;
                                $(".table3").append("<tr><td><input name='jenisLuaran" + rowCount3 +
                                    "' class='form-control' type='text' id='jenisLuaran" + rowCount3 +
                                    "' required></td><td><input name='targetCapaian" + rowCount3 +
                                    "' class='form-control' type='text' id='targetCapaian" + rowCount3 +
                                    "' required></td><td><input name='jurnalTujuan" + rowCount3 +
                                    "' class='form-control' type='text' id='jurnalTujuan" + rowCount3 +
                                    "' required></td><td><button onclick='rm3()' class='btn btn-danger'>Hapus</button></td></tr>");
                                console.log(rowCount3);
                                m.value = rowCount3;
                            }
                        </script>


                        <div class="row mb-3"></div>

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
    <!-- Button trigger modal -->

    <?php if (($jenis == "Mandiri")) : ?>
        <button type="button" class="btn btn-warning dropup position-fixed bottom-0 start-0 rounded-circle m-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="bi bi-question-square-fill"></i><span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-success p-2"><span class="visually-hidden">unread messages</span></span>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Penelitian Perorangan/Kelompok Mandiri</h1>
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
                                                Penelitian yang dalam proses penyelesaian serta publikasinya didanai sendiri oleh dosen/peneliti.
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                        <b>Ketentuan</b>
                                    </button>
                                </h2>
                                <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>
                                                Dalam hal ini, dosen hanya diwajibkan meng-upload ke SIPADU bukti luaran penelitian berupa artikel
                                                (atau link artikel) terpublikasi dalam prosiding seminar nasional, prosiding seminar internasional,
                                                jurnal nasional terakreditasi, atau jurnal internasional. Upload luaran penelitian sebagai salah satu
                                                bukti kinerja tahunan dosen.
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

    <?php if (($jenis == "Semi Mandiri")) : ?>
        <button type="button" class="btn btn-warning dropup position-fixed bottom-0 start-0 rounded-circle m-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="bi bi-question-square-fill"></i><span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-success p-2"><span class="visually-hidden">unread messages</span></span>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Penelitian Perorangan/Kelompok Semi Mandiri</h1>
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
                                                Penelitian yang dalam proses penelitiannya dibiayai secara mandiri oleh dosen atau tim dosen, namun
                                                publikasi dalam bentuk seminar nasional / internasional atau jurnal nasional / internasional didanai
                                                oleh Politeknik Statistika STIS
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

    <?php if (($jenis == "Didanai Institusi")) : ?>
        <button type="button" class="btn btn-warning dropup position-fixed bottom-0 start-0 rounded-circle m-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="bi bi-question-square-fill"></i><span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-success p-2"><span class="visually-hidden">unread messages</span></span>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Penelitian Perorangan/Kelompok Didanai Institusi</h1>
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
                                                Penelitian yang dalam proses penyelesaian maupun publikasinya didanai oleh Politeknik
                                                Statistika STIS. Penelitian yang dimaksud termasuk dalam jenis penelitian dasar dan penelitian
                                                terapan yang pelaksanaan penelitiannya dalam satu tahun anggaran. </li>
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

    <?php if (($jenis == "Institusi")) : ?>
        <button type="button" class="btn btn-warning dropup position-fixed bottom-0 start-0 rounded-circle m-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="bi bi-question-square-fill"></i><span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-success p-2"><span class="visually-hidden">unread messages</span></span>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Penelitian Perorangan/Kelompok Institusi</h1>
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
                                                Penelitian Institusi adalah penelitian yang dilakukan oleh institusi di dalam lingkungan
                                                Politeknik Statistika STIS, diantaranya penelitian yang dilaksanakan oleh Unit Kajian atau
                                                unit lain yang ditunjuk. Tujuan penelitian institusi adalah untuk memberikan masukan dan
                                                manfaat bagi pengembangan institusi, instansi induk serta meningkatkan sumber daya manusia
                                                yang ada didalamnya. Dalam penelitian ini termasuk juga jenis penelitian pengembangan, yang
                                                waktu pelaksanaannya dimungkinkan beberapa tahun (multiyears).
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

    <?php if (($jenis == "Kerjasama")) : ?>
        <button type="button" class="btn btn-warning dropup position-fixed bottom-0 start-0 rounded-circle m-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="bi bi-question-square-fill"></i><span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-success p-2"><span class="visually-hidden">unread messages</span></span>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Penelitian Kerjasama</h1>
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
                                                Penelitian yang dalam proses penyelesaian serta publikasinya didanai melalui mekanisme kerjasama
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                        <b>Ketentuan</b>
                                    </button>
                                </h2>
                                <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>
                                                Dalam hal adanya keikutsertaan pendanaan dari Politeknik Statistika STIS, dalam publikasi penelitian
                                                diharuskan ikut mencantumkan Politeknik Statistika STIS dalam acknowledgement atau sumber pendanaan
                                                (sources of funding). Dalam hal dihasilkannya hak cipta atau paten dari penelitian yang ikut didanai
                                                Politeknik Statistika STIS tersebut agar memberikan juga porsi hak kepemilikan dan/atau akses kepada
                                                Politeknik Statistika STIS.
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
                <button type="button" class="btn btn-primary" onclick="location.href='/penelitianInstitusi'">Ya</button>
            </div>
            <div class="w-100">
            </div>
        </div>
    </div>
</div> -->

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
<?= $this->endSection(); ?>