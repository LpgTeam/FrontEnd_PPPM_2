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
                                if($anggaranAwal == 0){
                                    echo '<h2>Rp ', number_format($anggaranAwal, 0, ",", "."), '</h2>';
                                } else {
                                    echo '<h2>Rp ', number_format($anggaranAwal['jumlah'], 0, ",", "."), '</h2>';
                                }
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
                            if (isset($danaTerealisasi)) {
                                echo '<h2>Rp ', number_format($danaTerealisasi, 0, ",", "."), '</h2>';
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
                            <?php
                            if (isset($danaDiajukan)) {
                                echo '<h2>Rp ', number_format($danaDiajukan, 0, ",", "."), '</h2>';
                            }
                            ?>
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
                            if (isset($danaTersedia)) {
                                echo '<h2>Rp ', number_format($danaTersedia, 0, ",", "."), '</h2>';
                            }
                            ?>

                        </div>
                    </div>
                    <!-- End testimonial item -->
                </div>
                <div class="swiper-pagination"></div>
            </div>

            <div class="row gy-4 justify-content-md-center" data-aos="fade-up">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Pengubahan Dana Awal Anggaran</h5>
                        </div>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ubah">Ubah Dana Awal</i></button>
                        <br>
                    </div>
                </div>
            </div>

            <!-- Bar Chart -->
            <div class="justify-content-md-center">
                <div class="card">
                    <div class="card-body ">
                        <h5 class="card-title">Diagram Pie Anggaran</h5>

                        <!-- Pie Chart -->
                        <div id="pieChart" style="min-height: 400px;" class="echart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                echarts.init(document.querySelector("#pieChart")).setOption({
                                    title: {
                                        text: '',
                                        subtext: '',
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
                                                if (isset($danaTerealisasi)) {
                                                    echo 'value: ', $danaTerealisasi;
                                                }
                                                ?>,
                                            name: 'Dana Terealisasi'

                                        },
                                        {
                                            <?php
                                                if (isset($danaDiajukan)) {
                                                    echo 'value: ', $danaDiajukan;
                                                }
                                                ?>,
                                            name: 'Dana Pengajuan'
                                        },
                                        {
                                            <?php
                                                if (isset($danaTersedia)) {
                                                    echo 'value: ', $danaTersedia;
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

<!-- Ubah dana awal -->
<div class="modal fade" id="ubah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ubahLabel">Ubah Dana</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/updateAnggaran" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="danaAwal" class="col-form-label">Dana awal saat ini :</label>
                        <?php
                            if (isset($anggaranAwal)) {
                                if($anggaranAwal == 0){
                                    echo '<input type="text" class="form-control" id="danaAwal" name="danaAwal" value= "', number_format($anggaranAwal, 0, ",", "."), '" disabled>';
                                } else {
                                    echo '<input type="text" class="form-control" id="danaAwal" name="danaAwal" value= "', number_format($anggaranAwal['jumlah'], 0, ",", "."), '" disabled>';
                                }
                            }
                            ?>
                        
                    </div>
                    <div class="mb-3">
                        <label for="danaBaru" class="col-form-label">Dana Awal terbaru :</label>
                        <input type="text" class="form-control" id="danaBaru" name="danaBaru">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger" onclick="location.href='/anggaranBAU'">Ya</button>
                </div>

                <div class="w-100">
                </div>
        </div>
    </div>
</div>
<!-- End Testimonials Section -->
<?= $this->endSection(); ?>