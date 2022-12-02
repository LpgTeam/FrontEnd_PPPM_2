<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
// $routes->get('/login', 'Login::index');

// service('auth')->routes($routes);

$routes->get('/', 'Dosen::index');
$routes->get('/login', 'Login::loginView');
$routes->post('/login', 'Login::loginAction');
$routes->post('/loginAdmin', 'Login::loginActionAdmin');
$routes->get('/logout', 'Login::logoutAction');

// ================================================================
//                              Dosen
// ================================================================
$routes->get('/indexDosen', 'Dosen::index');
$routes->get('/anggaranDosen', 'Dosen::anggaran');
$routes->get('/penelitianDosen', 'Dosen::penelitian');
$routes->get('/pkmDosen', 'Dosen::pkm');
$routes->get('/pkmjenisDosen', 'Dosen::pkmjenis');
$routes->get('/penelitianjenisDosen', 'Dosen::penelitianjenis');

$routes->get('/penelitianForm/(:any)', 'Dosen::penelitianForm/$1');

// $routes->get('/penelitianKerjasama', 'Dosen::penelitianKerjasama');
// $routes->get('/penelitianSemiMandiri', 'Dosen::penelitianSemiMandiri');
// $routes->get('/penelitianDidanaiInstitusi', 'Dosen::penelitianDidanaiInstitusi');
// $routes->get('/penelitianInstitusi', 'Dosen::penelitianInstitusi');

// $routes->get('/pkmMandiri', 'Dosen::pkmMandiri');
// $routes->get('/pkmKelompok', 'Dosen::pkmKelompok');
// $routes->get('/pkmTerstruktur', 'Dosen::pkmTerstruktur');
$routes->get('/pkmForm/(:any)', 'Dosen::pkmForm/$1');
$routes->get('/reimburseDosen', 'Dosen::reimburse');

$routes->get('/reimburseDosen', 'Dosen::reimburse');
$routes->get('/detailReimburseDosen/(:any)/(:any)', 'Dosen::detailReimburse/$1/$2');
$routes->get('/reimburseDetail/savePkm/(:any)', 'ReimburseDetail::savePKM/$1');
$routes->get('/reimburseDetail/savePenelitian/(:any)', 'ReimburseDetail::savePenelitian/$1');

$routes->get('/detailReimburse2Dosen/(:any)', 'Dosen::detailReimburse2/$1');

//=====================PKM Detail======================
$routes->get('/pkmProses1/(:any)', 'Dosen::pkmDetail1/$1');
$routes->get('/pkmProses2/(:any)', 'Dosen::pkmDetail2/$1');
$routes->get('/pkmProses3/(:any)', 'Dosen::pkmDetail3/$1');
$routes->get('/pkmProses4/(:any)', 'Dosen::pkmDetail4/$1');

$routes->get('/pkm/saveSurat/(:any)', 'PkmDetail::saveSurat/$1');
$routes->get('/pkm/saveBukti/(:any)', 'PkmDetail::saveBukti/$1');
// $routes->get('/penelitianSemiMandiri1/(:any)', 'Dosen::penelitianSemiMandiri1/$1');
// $routes->get('/penelitianSemiMandiri2', 'Dosen::penelitianSemiMandiri2');
// $routes->get('/penelitianSemiMandiri3', 'Dosen::penelitianSemiMandiri3');
// $routes->get('/penelitianSemiMandiri4', 'Dosen::penelitianSemiMandiri4');

//===========================New============================================
$routes->get('/penelitianProses1/(:any)', 'Dosen::penelitianProses1/$1');
$routes->get('/penelitianProses2/(:any)', 'Dosen::penelitianProses2/$1');
$routes->get('/penelitianProses2Kontrak/(:any)', 'Dosen::penelitianProses2Kontrak/$1');
$routes->get('/penelitianProses3/(:any)', 'Dosen::penelitianProses3/$1');
$routes->get('/penelitianProses4/(:any)', 'Dosen::penelitianProses4/$1');

$routes->get('/penelitian/saveKontrak/(:any)', 'PenelitianDetail::saveKontrak/$1');
$routes->get('/penelitian/savePendanaan/(:any)', 'PenelitianDetail::savePendanaan/$1');
$routes->get('/penelitianDetail/saveLaporan/(:any)', 'PenelitianDetail::saveLaporan/$1');
//===========================New============================================

// $routes->get('/penelitianDidanaiInstitusi1', 'Dosen::penelitianDidanaiInstitusi1');
// $routes->get('/penelitianDidanaiInstitusi2', 'Dosen::penelitianDidanaiInstitusi2');
// $routes->get('/penelitianDidanaiInstitusi3', 'Dosen::penelitianDidanaiInstitusi3');
// $routes->get('/penelitianDidanaiInstitusi4', 'Dosen::penelitianDidanaiInstitusi4');

// $routes->get('/penelitianInstitusi1', 'Dosen::penelitianInstitusi1');
// $routes->get('/penelitianInstitusi2', 'Dosen::penelitianInstitusi2');
// $routes->get('/penelitianInstitusi3', 'Dosen::penelitianInstitusi3');
// $routes->get('/penelitianInstitusi4', 'Dosen::penelitianInstitusi4');

// $routes->get('/pkmMandiri1', 'Dosen::pkmMandiri1');
// $routes->get('/pkmMandiri2', 'Dosen::pkmMandiri2');
// $routes->get('/pkmMandiri3', 'Dosen::pkmMandiri3');
// $routes->get('/pkmMandiri4', 'Dosen::pkmMandiri4');

// $routes->get('/pkmTerstruktur1', 'Dosen::pkmTerstruktur1');
// $routes->get('/pkmTerstruktur2', 'Dosen::pkmTerstruktur2');
// $routes->get('/pkmTerstruktur3', 'Dosen::pkmTerstruktur3');
// $routes->get('/pkmTerstruktur4', 'Dosen::pkmTerstruktur4');

// $routes->get('/pkmKelompok1', 'Dosen::pkmKelompok1');
// $routes->get('/pkmKelompok2', 'Dosen::pkmKelompok2');
// $routes->get('/pkmKelompok3', 'Dosen::pkmKelompok3');
// $routes->get('/pkmKelompok4', 'Dosen::pkmKelompok4');

// $routes->get('/login', 'Login::index');






//routes create pengajuan
$routes->get('/penelitian/save', 'Penelitian::save');
//submit Edit Profil dosen
$routes->get('/dosen/editProfil', 'Dosen::editProfil');
//menampilkan foto 
$routes->get('/foto_profil/(:any)', 'Dosen::editProfil');

$routes->get('/pkm/save', 'PKM::save');

// ================================================================
//                          Admin PPPM
// ================================================================
if (auth()->loggedIn()) {
    if (auth()->user()->inGroup('admin')) {
        $routes->get('/indexAdmin', 'Dosen::index');
        $routes->get('/anggaranAdmin', 'Admin::anggaran');
        $routes->get('/penelitianAdmin', 'Admin::penelitian');
        $routes->get('/pkmAdmin', 'Admin::pkm');
        // view list user
        $routes->get('/userSetting', 'AdminUserSetting::index');
        // view edit role user
        $routes->get('/editRole/(:any)', 'AdminUserSetting::editRole/$1');
        // view edit user
        $routes->get('/editUser/(:any)', 'AdminUserSetting::editUser/$1');

        // btn update user
        $routes->get('/updateUser/(:any)', 'AdminUserSetting::updateUser/$1');
        // delete user
        $routes->get('/deleteUser/(:any)', 'AdminUserSetting::deleteUser/$1');
        // delete role
        $routes->get('/deleteRoleUser/(:any)', 'AdminUserSetting::deleteRole/$1');



        $routes->get('/adminSemiMandiri1/(:any)', 'Admin::adminSemiMandiri1/$1');
        $routes->get('/adminSemiMandiri2/(:any)', 'Admin::adminSemiMandiri2/$1');
        $routes->get('/adminSemiMandiri3/(:any)', 'Admin::adminSemiMandiri3/$1');

        $routes->get('/adminDidanaiInstitusi1', 'Admin::adminProses1');
        $routes->get('/adminDidanaiInstitusi2', 'Admin::adminProses2');
        $routes->get('/adminDidanaiInstitusi3', 'Admin::adminProses3');

        $routes->get('/adminInstitusi1', 'Admin::adminProses1');
        $routes->get('/adminInstitusi2', 'Admin::adminProses2');
        $routes->get('/adminInstitusi3', 'Admin::adminProses3');

        $routes->get('/pkmMandiriAdmin1', 'Admin::pkmAdminProses1');
        $routes->get('/pkmMandiriAdmin2', 'Admin::pkmAdminProses2');

        $routes->get('/pkmKelompokAdmin1', 'Admin::pkmAdminProses1');
        $routes->get('/pkmKelompokAdmin2', 'Admin::pkmAdminProses2');

        $routes->get('/pkmTerstrukturAdmin1', 'Admin::pkmAdminProses1');
        $routes->get('/pkmTerstrukturAdmin2', 'Admin::pkmAdminProses2');

        $routes->get('/reimburseAdmin', 'Admin::reimburse');
        $routes->get('/persetujuanReimburseAdmin/(:any)', 'Admin::persetujuanReimburse/$1');
        $routes->get('/acc-reimburseAdmin/(:any)', 'Admin::acc_reimburse/$1');
    }
    // ================================================================
    //                          Reviewer
    // ================================================================

    if (auth()->user()->inGroup('reviewer')) {

        $routes->get('/indexReviewer', 'Dosen::index');
        $routes->get('/anggaranReviewer', 'Reviewer::anggaran');
        $routes->get('/penelitianReviewer', 'Reviewer::penelitian');
        $routes->get('/persetujuanReviewer/(:any)', 'Reviewer::persetujuan/$1');
        $routes->get('/acc-reviewer/(:any)', 'Reviewer::acc_penelitian_reviewer/$1');
        $routes->get('/rjc-reviewer/(:any)', 'Reviewer::rjc_penelitian_reviewer/$1');
    }

    // ================================================================
    //                          Direktur
    // ================================================================

    if (auth()->user()->inGroup('direktur')) {
        $routes->get('/indexDirektur', 'Dosen::index');
        $routes->get('/anggaranDirektur', 'Direktur::anggaran');
        $routes->get('/penelitianDirektur', 'Direktur::penelitian');
        $routes->get('/reimburseDirektur', 'Direktur::reimburse');
        $routes->get('/detailReimburseDirektur', 'Direktur::detailReimburse');
        $routes->get('/detailReimburse2Direktur', 'Direktur::detailReimburse2');
        $routes->get('/persetujuanDirektur/(:any)', 'Direktur::persetujuan/$1');
        $routes->get('/acc-direktur/(:any)', 'Direktur::acc_penelitian_direktur/$1');
    }

    // ================================================================
    //                          Kepala PPPM
    // ================================================================

    if (auth()->user()->inGroup('kepalaPPPM')) {
        $routes->get('/indexKepala', 'Dosen::index');
        $routes->get('/anggaranKepala', 'Kepala::anggaran');
        $routes->get('/penelitianKepala', 'Kepala::penelitian');
        $routes->get('/penelitianPersetujuanKepala/(:any)', 'Kepala::penelitianPersetujuan/$1');
        $routes->get('/pkmKepala', 'Kepala::pkm');
        $routes->get('/pkmPersetujuanKepala/(:any)', 'Kepala::pkmPersetujuan/$1');
        $routes->get('/pkmPersetujuanKepalaSelesai/(:any)', 'Kepala::pkmPersetujuanSelesai/$1');
        $routes->get('/acc-kepala/(:any)', 'Kepala::acc_penelitian_kepala/$1');
        $routes->get('/rjc-kepala/(:any)', 'Kepala::rjc_penelitian_kepala/$1');
        $routes->get('/pkmacc-kepala/(:any)', 'Kepala::acc_pkm_kepala/$1');
        $routes->get('/pkmaccAkhir-kepala/(:any)', 'Kepala::accAkhir_pkm_kepala/$1');
        $routes->get('/pkmrjc-kepala/(:any)', 'Kepala::rjc_pkm_kepala/$1');
        $routes->get('/reimburseKepala', 'Kepala::reimburse');
        $routes->get('/detailReimburseKepala', 'Kepala::detailReimburse');
        $routes->get('/detailReimburse2Kepala', 'Kepala::detailReimburse2');
    }

    // ================================================================
    //                          BAU
    // ================================================================
    if (auth()->user()->inGroup('bau')) {
        $routes->get('/indexBAU', 'Dosen::index');
        $routes->get('/anggaranBAU', 'BAU::anggaran');
        $routes->get('/penelitianBAU', 'BAU::penelitian');
        $routes->get('/pkmBAU', 'BAU::pkm');
        $routes->get('/pkmPersetujuanBAU/(:any)', 'BAU::pkmPersetujuan/$1');
        $routes->get('/persetujuanBAU/(:any)', 'BAU::persetujuan/$1');
        $routes->get('/acc-BAU/(:any)', 'BAU::acc_penelitian_BAU/$1');
        $routes->get('/rjc-BAU/(:any)', 'BAU::rjc_penelitian_BAU/$1');
        $routes->get('/pkmacc-BAU/(:any)', 'BAU::acc_pkm_BAU/$1');
        $routes->get('/pkmrjc-BAU/(:any)', 'BAU::rjc_pkm_BAU/$1');
        
        $routes->post('/updateAnggaran', 'BAU::updateAnggaran');

        $routes->get('/reimburseBAU', 'BAU::reimburse');
        $routes->get('/detailReimburseBAU', 'BAU::detailReimburse');
        $routes->get('/detailReimburse2BAU', 'BAU::detailReimburse2');
    }
}
//===========================================download Penelitian===============================================
//proposal
$routes->get('/penelitian/download-p1-proposal/(:any)', 'ProposalPenelitian::download_p1_proposal/$1');
$routes->get('/penelitian/download-p2-proposal/(:any)', 'ProposalPenelitian::download_p2_proposal/$1');
$routes->get('/penelitian/download-p3-proposal/(:any)', 'ProposalPenelitian::download_p3_proposal/$1');
$routes->get('/penelitian/download-p4-proposal/(:any)', 'ProposalPenelitian::download_p4_proposal/$1');
$routes->get('/penelitian/download-p5-proposal/(:any)', 'ProposalPenelitian::download_p5_proposal/$1');
$routes->get('/penelitian/download-all-proposal/(:any)', 'ProposalPenelitian::download_all_proposal/$1');
$routes->get('/penelitian/view_proposal_savelocal/(:any)', 'ProposalPenelitian::view_proposal_savelocal/$1');
$routes->get('/penelitian/view_proposal/(:any)/(:any)', 'ProposalPenelitian::view_proposal/$1/$2');
$routes->get('/lihat_pdf/(:any)', 'ProposalPenelitian::lihat_pdf/$1');
//download surat pernyataan penelitian
$routes->get('/penelitian/printSurat', 'Penelitian::printSurat');
//download Kontrak penelitian
$routes->get('/penelitian/printKontrak', 'Penelitian::printKontrak');
//download laporan
$routes->get('/penelitian/download-laporan/(:any)/(:any)', 'ProposalPenelitian::printLaporan/$1/$2');
$routes->get('/penelitian/download_laporan_proposal/(:any)/(:any)', 'ProposalPenelitian::download_laporan_proposal/$1/$2');
//viewlaporan
$routes->get('/penelitian/view-laporan/(:any)/(:any)', 'ProposalPenelitian::printLaporan/$1/$2');
$routes->get('/penelitian/view_laporan_proposal/(:any)/(:any)', 'ProposalPenelitian::view_laporan_proposal/$1/$2');



//============================download pkm===================================
//form pengajuan
$routes->get('/pkm/download-proposal/(:any)', 'ProposalPKM::download_proposal/$1');
$routes->get('/pkm/download-surat-keterangan/(:any)', 'ProposalPKM::download_surat_keterangan/$1');
//surat pernyataan pkm
$routes->get('/pkm/printSurat', 'PKM::printSurat');

//error page routes
$routes->get('/backurl', 'Error::index');

//cek except login
service('auth')->routes($routes, ['except' => ['login', 'logout']]);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
