<!-- ======= Header Penelitian ======= -->
<header id="header" class="header fixed-top">
    <!-- Header Dosen Penelitian -->
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <!-- Logo Dosen -->
        <a href="/indexDosen" class="logo d-flex align-items-center">
            <img src="assets/img/STIS.png" alt="" />
            <span>
                <div class="fw-bold p-2">PPPM <br /></div>
                <div class="p-2 d-block responsive-font">
                    Politeknik&nbspStatistika&nbspSTIS
                </div>
            </span>
        </a>
        <!-- Logo Admin PPPM -->
        <!-- <a href="/indexAdmin" class="logo d-flex align-items-center">
            <img src="assets/img/STIS.png" alt="" />
            <span>
                <div class="fw-bold p-2">PPPM <br /></div>
                <div class="p-2 d-block responsive-font">
                    Politeknik&nbspStatistika&nbspSTIS
                </div>
            </span>
        </a> -->
        <!-- Logo Reviewer -->
        <!-- <a href="/indexReviewer" class="logo d-flex align-items-center">
            <img src="assets/img/STIS.png" alt="" />
            <span>
                <div class="fw-bold p-2">PPPM <br /></div>
                <div class="p-2 d-block responsive-font">
                    Politeknik&nbspStatistika&nbspSTIS
                </div>
            </span>
        </a> -->
        <!-- Logo Kepala PPPM -->
        <!-- <a href="/indexKepala" class="logo d-flex align-items-center">
            <img src="assets/img/STIS.png" alt="" />
            <span>
                <div class="fw-bold p-2">PPPM <br /></div>
                <div class="p-2 d-block responsive-font">
                    Politeknik&nbspStatistika&nbspSTIS
                </div>
            </span>
        </a> -->
        <!-- Logo Direktur -->
        <!-- <a href="/indexDirektur" class="logo d-flex align-items-center">
            <img src="assets/img/STIS.png" alt="" />
            <span>
                <div class="fw-bold p-2">PPPM <br /></div>
                <div class="p-2 d-block responsive-font">
                    Politeknik&nbspStatistika&nbspSTIS
                </div>
            </span>
        </a> -->
        <!-- Logo BAU -->
        <!-- <a href="/indexBAU" class="logo d-flex align-items-center">
            <img src="assets/img/STIS.png" alt="" />
            <span>
                <div class="fw-bold p-2">PPPM <br /></div>
                <div class="p-2 d-block responsive-font">
                    Politeknik&nbspStatistika&nbspSTIS
                </div>
            </span>
        </a> -->

        <nav id="navbar" class="navbar">
            <ul>
                <!-- Dosen -->
                <?php
                if ($_SESSION['group'] == "dosen") {
                    if ($penelitian['id_status'] == 10) { ?>
                        <li><a class="nav-link scrollto" href="/penelitianProses4/<?= $penelitian['id_penelitian']; ?>">Kembali</a></li>
                    <?php } else { ?>
                        <li><a class="nav-link scrollto" href="/penelitianProses1/<?= $penelitian['id_penelitian']; ?>">Kembali</a></li>
                    <?php } ?>
                    <li class="dropdown">
                        <a class="username scrollto" href="/indexDosen"><span>Dosen</span></a>
                        <ul>
                            <!-- <li><a href="/login">Logout</a></li>
                        </ul>
                    </li> -->
                        <?php
                    }
                        ?>

                        <!-- Admin PPPM -->
                        <?php
                        if ($_SESSION['group'] == "admin") {
                        ?>
                            <li><a class="nav-link scrollto" href="/adminProses1/<?= $penelitian['id_penelitian']; ?>">Kembali</a></li>
                            <li class="dropdown">
                                <a class="username scrollto" href="/indexAdmin"><span>Admin</span></a>
                                <ul>
                                    <!-- <li><a href="/login">Logout</a></li>
                        </ul>
                    </li> -->
                                <?php
                            }
                                ?>

                                <!-- Reviewer -->
                                <?php
                                if ($_SESSION['group'] == "reviewer") {
                                ?>
                                    <li><a class="nav-link scrollto" href="/persetujuanReviewer/<?= $penelitian['id_penelitian']; ?>">Kembali</a></li>
                                    <li class="dropdown">
                                        <a class="username scrollto" href="/indexReviewer"><span>Reviewer</span></a>
                                        <ul>
                                            <!-- <li><a href="/login">Logout</a></li>
                        </ul>
                    </li> -->
                                        <?php
                                    }
                                        ?>
                                        <!-- Kepala PPPM -->
                                        <?php
                                        if ($_SESSION['group'] == "kepalapppm") {
                                        ?>
                                            <li><a class="nav-link scrollto" href="/penelitianPersetujuanKepala/<?= $penelitian['id_penelitian']; ?>">Kembali</a></li>
                                            <li class="dropdown">
                                                <a class="username scrollto" href="/indexKepala"><span>Kepala PPPM</span></a>
                                                <ul>
                                                    <!-- <li><a href="/login">Logout</a></li>
                        </ul>
                    </li> -->
                                                <?php
                                            }
                                                ?>
                                                <!-- Direktur -->
                                                <?php
                                                if ($_SESSION['group'] == "direktur") {
                                                ?>
                                                    <li><a class="nav-link scrollto" href="/persetujuanDirektur/<?= $penelitian['id_penelitian']; ?>">Kembali</a></li>
                                                    <li class="dropdown">
                                                        <a class="username scrollto" href="/indexDirektur"><span>Direktur</span></a>
                                                        <ul>
                                                            <!-- <li><a href="/login">Logout</a></li>
                        </ul>
                    </li> -->
                                                        <?php
                                                    }
                                                        ?>

                                                        <!-- BAU -->
                                                        <?php
                                                        if ($_SESSION['group'] == "bau") {
                                                        ?>
                                                            <li><a class="nav-link scrollto" href="/persetujuanBAU/<?= $penelitian['id_penelitian']; ?>">Kembali</a></li>
                                                            <li class="dropdown">
                                                                <a class="username scrollto" href="/indexBAU"><span>BAU</span></a>
                                                                <ul>
                                                                <?php
                                                            }
                                                                ?>
                                                                <!-- <li><a href="/logout">Logout</a></li>
                                                                </ul> -->
                                                            </li>
                                                        </ul>
                                                        <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
    </div>
    <!-- End Header Penelitian-->
</header>