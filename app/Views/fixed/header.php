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
                <li>
                    <a class="nav-link scrollto" href="/indexDosen">Beranda</a>
                </li>
                <li><a class="nav-link scrollto" href="/anggaranDosen">Anggaran</a></li>
                <li class="dropdown">
                    <a href="#"><span>Pengajuan</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/penelitianDosen">Penelitian</a></li>
                        <li><a href="/pkmDosen">PKM</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="reimburseDosen">Reimbursement</a></li>
                <li class="dropdown">
                    <a class="username scrollto" href="#"><span>Dosen</span></a>
                    <ul>
                        <?php } ?>



                        <!-- Admin PPPM -->
                        <?php
                        if ($_SESSION['group'] == "admin") {
                        ?>
                        <li>
                            <a class="nav-link scrollto" href="/indexAdmin">Beranda</a>
                        </li>
                        <li><a class="nav-link scrollto" href="/anggaranAdmin">Anggaran</a></li>
                        <li class="dropdown">
                            <a href="#"><span>Pengajuan</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="/penelitianAdmin">Penelitian</a></li>
                                <li><a href="/pkmAdmin">PKM</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link scrollto" href="reimburseAdmin">Reimbursement</a></li>
                        <li class="dropdown">
                            <a class="username scrollto" href="#"><span>Admin</span></a>
                            <ul>
                                <li><a href="/userSetting">User Setting</a></li>
                                <li><a href="/Setting">Setting</a></li>
                                <!-- <li><a href="/login">Logout</a></li> -->
                                <!-- </ul>
                        </li> -->
                                <?php } ?>



                                <!-- Reviewer -->
                                <?php
                                if ($_SESSION['group'] == "reviewer") {
                                ?>
                                    <li>
                                        <a class="nav-link scrollto" href="/indexReviewer">Beranda</a>
                                    </li>
                                    <li><a class="nav-link scrollto" href="/anggaranReviewer">Anggaran</a></li>
                                    <li class="dropdown">
                                        <a href="#"><span>Pengajuan</span> <i class="bi bi-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="/penelitianReviewer">Penelitian</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="nav-link scrollto" href="#">Reimbursement</a></li>
                                    <li class="dropdown">
                                        <a class="username scrollto" href="#"><span>Reviewer</span></a>
                                        <ul>
                                        <?php } ?>
                                        <!-- <li><a href="/login">Logout</a></li>
                            </ul>
                        </li> -->


                                        <!-- Kepala PPPM -->
                                        <?php
                                        if ($_SESSION['group'] == "kepalapppm") {
                                        ?>
                                        <li>
                                            <a class="nav-link scrollto" href="/indexKepala">Beranda</a>
                                        </li>
                                        <li><a class="nav-link scrollto" href="/anggaranKepala">Anggaran</a></li>
                                        <li class="dropdown">
                                            <a href="#"><span>Pengajuan</span> <i class="bi bi-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="/penelitianKepala">Penelitian</a></li>
                                                <li><a href="/pkmKepala">PKM</a></li>
                                            </ul>
                                        </li>
                                        <li><a class="nav-link scrollto" href="/reimburseKepala">Reimbursement</a></li>
                                        <li class="dropdown">
                                            <a class="username scrollto" href="#"><span>Kepala PPPM</span></a>
                                            <ul>
                                                <!-- <li><a href="/login">Logout</a></li>
                                    </ul>
                                </li> -->
                                                <?php } ?>


                                                <!-- Direktur -->
                                                <?php
                                                if ($_SESSION['group'] == "direktur") {
                                                ?>
                                                <li>
                                                    <a class="nav-link scrollto" href="/indexDirektur">Beranda</a>
                                                </li>
                                                <li><a class="nav-link scrollto" href="/anggaranDirektur">Anggaran</a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#"><span>Pengajuan</span> <i
                                                            class="bi bi-chevron-down"></i></a>
                                                    <ul>
                                                        <li><a href="/penelitianDirektur">Penelitian</a></li>
                                                    </ul>
                                                </li>
                                                <li><a class="nav-link scrollto"
                                                        href="/reimburseDirektur">Reimbursement</a></li>
                                                <li class="dropdown">
                                                    <a class="username scrollto" href="#"><span>Direktur</span></a>
                                                    <ul>
                                                        <!-- <li><a href="/login">Logout</a></li>
                                    </ul>
                                </li> -->
                                                        <?php } ?>



                                                        <!-- BAU -->
                                                        <?php
                                                        if ($_SESSION['group'] == "bau") {
                                                        ?>
                                                        <li>
                                                            <a class="nav-link scrollto" href="/indexBAU">Beranda</a>
                                                        </li>
                                                        <li><a class="nav-link scrollto"
                                                                href="/anggaranBAU">Anggaran</a></li>
                                                        <li class="dropdown">
                                                            <a href="#"><span>Pengajuan</span> <i
                                                                    class="bi bi-chevron-down"></i></a>
                                                            <ul>
                                                                <li><a href="/penelitianBAU">Penelitian</a></li>
                                                                <li><a href="/pkmBAU">PKM</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a class="nav-link scrollto"
                                                                href="reimburseBAU">Reimbursement</a></li>
                                                        <li class="dropdown">
                                                            <a class="username scrollto" href="#"><span>BAU</span></a>
                                                            <ul>
                                                                <!-- <li><a href="/login">Logout</a></li>
                                    </ul>
                                </li> -->
                                                                <?php } ?>
                                                                <li><a href="/user/ubahPaswword">Ubah Password</a></li>
                                                                <li><a href="/logout">Logout</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
    </div>
</header>
<!-- End Header-->