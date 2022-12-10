<?= $this->extend('fixed/templatePkmDetail') ?>

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
                            <h5 class="card-title text-center">Laporan Pengabdian Kepada Masyarakat</h5>
                            <p>Judul PKM : <?= $pkm['topik_kegiatan']; ?></p>
                            <hr>
                            <iframe class="responsive-iframe resp-container" src="/laporan_akhir_pkm/<?= $judul_pkm ?>" width="100%" height="650px"></iframe>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</main>
<!-- End #main -->
<?= $this->endSection(); ?>