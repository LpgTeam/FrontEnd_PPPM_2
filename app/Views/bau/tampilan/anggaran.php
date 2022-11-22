<? //= $this->extend('bau/fixed/template') 
?>
<?= $this->extend('fixed/template') ?>

<?= $this->section('content'); ?>
<!-- ======= Anggaran Section ======= -->
<main id="main" class="main">
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>Anggaran</h2>
                <hr>
                <p>Anggaran Penelitian dan PKM Dosen</p>
            </header>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="profile ">
                                <h3>DANA AWAL</h3>
                                <h4>Jumlah Dana Awal</h4>
                            </div>
                            <hr>
                            <img src="" class="testimonial-img" alt="" />
                            <?php
                            if (isset($anggaranAwal)) {
                                echo '<h2>Rp ', number_format($anggaranAwal['jumlah'], 0, ",", "."), '</h2>';
                            }
                            ?>

                        </div>
                    </div>
                    <!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="profile ">
                                <h3>DANA TEREALISASI</h3>
                                <h4>Jumlah Dana Yang Terealisasi</h4>
                            </div>
                            <hr>
                            <img src="" class="testimonial-img" alt="" />
                            <?php
                            if (isset($anggaranTerealisasi)) {
                                echo '<h2>Rp ', number_format($anggaranTerealisasi['dana_keluar'], 0, ",", "."), '</h2>';
                            }
                            ?>

                        </div>
                    </div>
                    <!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="profile ">
                                <h3>DANA PENGAJUAN</h3>
                                <h4>Jumlah Dana Dalam Tahap Pengajuan</h4>
                            </div>
                            <hr>
                            <img src="" class="testimonial-img" alt="" />
                            <h2>Rp 1.000.000</h2>

                        </div>
                    </div>
                    <!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="profile ">
                                <h3>DANA TERSEDIA</h3>
                                <h4>Jumlah Dana Yang Tersedia</h4>
                            </div>
                            <hr>
                            <img src="" class="testimonial-img" alt="" />
                            <?php
                            if (isset($anggaranTerealisasi)) {
                                echo '<h2>Rp ', number_format($anggaranTerealisasi['sisa_anggaran'], 0, ",", "."), '</h2>';
                            }
                            ?>

                        </div>
                    </div>
                    <!-- End testimonial item -->
                </div>
                <div class="swiper-pagination"></div>
            </div>

            <!-- Bar Chart -->
            <div class="justify-content-md-center">
                <div class="card">
                    <div class="card-body ">
                        <h5 class="card-title">Diagram Batang Anggaran</h5>

                        <!-- Pie Chart -->
                        <div id="pieChart" style="min-height: 400px;" class="echart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                echarts.init(document.querySelector("#pieChart")).setOption({
                                    title: {
                                        text: 'Data Anggaran',
                                        subtext: 'Grafik Mengenai Anggaran',
                                        left: 'center'
                                    },
                                    tooltip: {
                                        trigger: 'item'
                                    },
                                    legend: {
                                        orient: 'vertical',
                                        left: 'left'
                                    },
                                    series: [{
                                        name: 'Access From',
                                        type: 'pie',
                                        radius: '50%',
                                        data: [{
                                                <?php
                                                if (isset($anggaranAwal)) {
                                                    echo 'value: ', $anggaranTerealisasi['dana_keluar'];
                                                }
                                                ?>,
                                                name: 'Dana Terealisasi'

                                            },
                                            {
                                                value: 1000000,
                                                name: 'Dana Pengajuan'
                                            },
                                            {
                                                <?php
                                                if (isset($anggaranAwal)) {
                                                    echo 'value: ', $anggaranTerealisasi['sisa_anggaran'];
                                                }
                                                ?>,
                                                name: 'Dana Tersedia'
                                            }
                                        ],
                                        emphasis: {
                                            itemStyle: {
                                                shadowBlur: 10,
                                                shadowOffsetX: 0,
                                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                                            }
                                        }
                                    }]
                                });
                            });
                        </script>
                        <!-- End Pie Chart -->


                    </div>
                </div>
            </div>


        </div>
    </section>
</main>
<!-- End Testimonials Section -->
<?= $this->endSection(); ?>