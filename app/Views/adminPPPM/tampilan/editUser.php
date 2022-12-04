<? //= $this->extend('adminPPPM/fixed/templateUser') 
?>
<?= $this->extend('fixed/templateUserSetting') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section class="section">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>Edit User</h2>
                <hr>
                <p>Website PPPM Politeknik Statistika STIS</p>
            </header>
        </div>
        <div class="row justify-content-md-center" data-aos="fade-up">
            <div class="form row gy-4 justify-content-md-center col-md-8">
                <div class="form-body pt-3 col-md-14">
                    <!-- Bordered Tabs -->
                    <!-- Form -->
                    <form action="/updateUser/<?= $user1->id; ?>">
                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="username" type="text" class="form-control" id="username" value="<?= $user1->username; ?>" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-lg-3 col-form-label" for="role">Role</label>
                            <div class="col-md-8 col-lg-9">
                                <!-- <input name="aaa" type="text" class="form-control" id="aaa" required> -->

                                <select class="form-select" id="role" name="role">
                                    <option selected readonly>Pilih</option>
                                    <option value="dosen">Dosen</option>
                                    <option value="bau">BAU</option>
                                    <option value="admin">Admin PPPM</option>
                                    <option value="kepalapppm">Kepala PPPM</option>
                                    <option value="reviewer">Reviewer </option>
                                    <option value="direktur">Direktur </option>
                                </select>
                            </div>
                        </div>

                        <!-- <div class="row mb-3">
                            <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="nama" type="text" class="form-control" id="nama" required>
                            </div>
                        </div> -->


                        <hr>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        </div>
                </div>

                </form><!-- Form End -->
    </section>

</main>
<!-- End #main -->

<?= $this->endSection(); ?>