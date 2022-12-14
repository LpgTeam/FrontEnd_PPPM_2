<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
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
                ?>
                    <li><a class="nav-link scrollto" href="/pkmDosen">Kembali</a></li>
                    <li class="dropdown">
                        <a class="username scrollto" href="#"><span>Dosen</span></a>
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
                            <li><a class="nav-link scrollto" href="/pkmAdmin">Kembali</a></li>
                            <li class="dropdown">
                                <a class="username scrollto" href="#"><span>Admin</span></a>
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
                                    <li><a class="nav-link scrollto" href="/pkmKepala">Kembali</a></li>
                                    <li class="dropdown">
                                        <a class="username scrollto" href="#"><span>Kepala PPPM</span></a>
                                        <ul>
                                        <?php
                                    }
                                        ?>

                                        <!-- BAU -->
                                        <?php
                                        if ($_SESSION['group'] == "bau") {
                                        ?>
                                            <li><a class="nav-link scrollto" href="/pkmBAU">Kembali</a></li>
                                            <li class="dropdown">
                                                <a class="username scrollto" href="#"><span>BAU</span></a>
                                                <ul>
                                                <?php
                                            }
                                                ?>
                                                <li><a href="/logout">Logout</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
    </div>
    <!-- End Header Dosen PKM-->
</header>