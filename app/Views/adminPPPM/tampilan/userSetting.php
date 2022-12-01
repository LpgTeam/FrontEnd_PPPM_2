<? //= $this->extend('adminPPPM/fixed/template') 
?>
<?= $this->extend('fixed/template') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section class="section">
        <div class="container" data-aos="fade-up">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert" data-aos="zoom-in">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <header class="section-header2">
                <h2>User Setting</h2>
                <hr>
                <p>Website PPPM Politeknik Statistika STIS</p>
            </header>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="">
                <div class="card">
                    <h5>&nbsp;</h5>
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <div class="search-bar col-lg-8 d-flex justify-content-end">
                                <form class="search-form d-flex align-items-center" method="POST" action="#">
                                    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                                    <button type="button" title="Search"><i class="bi bi-search"></i></button>
                                </form>
                            </div><!-- End Search Bar -->
                        </div>
                        <p>&nbsp</p>
                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table table-advance table-hover align-middle ">
                                <thead>
                                    <tr class="table-primary">
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Username</th>
                                        <!-- <th scope="col">Role</th> -->
                                        <th scope="col">NIP</th>
                                        <th scope="col">Role Setting</th>
                                        <th scope="col">Hapus User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($user as $key => $post) :  ?>
                                        <tr>
                                            <!-- <td><?php //echo $post['id_penelitian'] 
                                                        ?></td> -->
                                            <td><?= $i; ?></td>
                                            <td><?= $post->username; ?></td>
                                            <td><?= $post->nip; ?></td>
                                            <!-- <td><//?= $post->nama_dosen; ?></td> -->

                                            <td>
                                                <!-- <a class="btn btn-warning" id="editButton" id="editButton" href="/editUser/<//?= $post->id; ?>"><i class="bi bi-pencil-square"></i></a> -->
                                                <!-- <a class="btn btn-warning" id="editButton" id="editButton" href="/editUser/<//?= $post->id; ?>"><i class="bi bi-pencil-square"></i></a> -->
                                                <a href="/editRole/<?= $post->id; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger" id="deleteButton" data-bs-toggle="modal" data-bs-target="#delete"><i class="bi bi-trash"></i></i></a>
                                                <!-- <a class="btn btn-danger" id="deleteButton" href="/deel"><i class="bi bi-trash"></i></i></a> -->
                                            </td>
                                        </tr>
                                        </td>
                                        </tr>
                                        <?php $i++;    ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>
            </div>
        </div>

        </div>
        </div>

        <script>

        </script>
    </section>

</main>
<!-- End #main -->

<!-- Delete User -->
<div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteLabel">Hapus User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apak anda yakin akan menghapus User?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <!-- <button type="button" class="btn btn-primary" onclick="location.href=''">Ya</button> -->
                <button type="button" class="btn btn-primary" onclick="location.href='/deleteUser/<?= $post->id; ?>'">Ya</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>