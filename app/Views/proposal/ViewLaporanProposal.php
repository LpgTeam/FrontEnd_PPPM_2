<?= $this->extend('fixed/templatePenelitianDetail') ?>

<?= $this->section('content'); ?>
<style>
    .resp-container {
        /* position: relative; */
        overflow: hidden;
        /* padding-top: 0; */
    }
</style>
<main id="main" class="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <!-- <header class="section-header2">
            </header> -->
            <div class="row" data-aos="fade-up">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Laporan Penelitian</h5>
                            <p>Judul penelitian : <?= $penelitian['judul_penelitian']; ?></p>
                            <hr>
                            <!-- <iframe class="responsive-iframe resp-container" src="/laporan_akhir_penelitian/<?= $judul_penelitian ?>" style="position:fixed; top:0; left:0; bottom:0; right:0; width:100%; height:100%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;"></iframe> -->
                            <iframe class="responsive-iframe resp-container" src="/laporan_akhir_penelitian/<?= $judul_penelitian ?>" width="100%" height="650px"></iframe>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</main>
<!-- End #main -->
<?= $this->endSection(); ?>