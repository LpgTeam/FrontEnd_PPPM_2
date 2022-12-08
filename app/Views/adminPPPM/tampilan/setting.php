<? //= $this->extend('adminPPPM/fixed/template') 
?>
<?= $this->extend('fixed/templateUserSetting') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section class="section">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>Setting</h2>
                <hr>
                <p><?= $title ?></p>
            </header>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="row justify-content-md-center" data-aos="fade-up">
                <div class="form row gy-4 justify-content-md-center col-md-8">
                    <div class="form-body pt-3 col-md-14">
                        <form action="<?= base_url('admin/save')?>" method="post" onsubmit="return submitForm(this);" enctype="multipart/form-data">
                            <div class="text-center mb-4">
                                <h3>Atur Tanda Tangan</h3>
                            </div>
                            <div class="row mb-3 mt-3">
                                <label for="setting" class="col-md-4 col-lg-3 col-form-label">Jenis Tanda Tangan</label>
                                <div class="col-md-8 col-lg-9">
                                    <select class="form-select" id="setting" name="setting">
                                        <?php //foreach ($ttd as $key => $ttd) { ?>
                                            <option value="1" <?php if($ttd['id_setting'] == '1') echo 'selected'?>>Manual</option>
                                            <option  value="2"<?php if($ttd['id_setting'] == '2') echo 'selected'?>>Digital</option>

                                        <?//php } ?>
                                        <!-- <option selected readonly value=""></option>
                                        <option value="1">Manual</option>
                                        <option value="2">Digital</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>


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
    </section>

</main>
<!-- End #main -->

<?= $this->endSection(); ?>