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

$routes->get('/', 'Login::index');

// ================================================================
//                              Dosen
// ================================================================
$routes->get('/indexDosen', 'Dosen::index');
$routes->get('/anggaranDosen', 'Dosen::anggaran');
$routes->get('/penelitianDosen', 'Dosen::penelitian');
$routes->get('/pkmDosen', 'Dosen::pkm');
$routes->get('/pkmjenisDosen', 'Dosen::pkmjenis');
$routes->get('/penelitianjenisDosen', 'Dosen::penelitianjenis');

$routes->get('/penelitianMandiri', 'Dosen::penelitianMandiri');
$routes->get('/penelitianKerjasama', 'Dosen::penelitianKerjasama');
$routes->get('/penelitianSemiMandiri', 'Dosen::penelitianSemiMandiri');
$routes->get('/penelitianDidanaiInstitusi', 'Dosen::penelitianDidanaiInstitusi');
$routes->get('/penelitianInstitusi', 'Dosen::penelitianInstitusi');

$routes->get('/pkmMandiri', 'Dosen::pkmMandiri');
$routes->get('/pkmKelompok', 'Dosen::pkmKelompok');
$routes->get('/pkmTerstruktur', 'Dosen::pkmTerstruktur');

$routes->get('/penelitianSemiMandiri1/(:any)', 'Dosen::penelitianSemiMandiri1/$1');
$routes->get('/penelitianSemiMandiri2', 'Dosen::penelitianSemiMandiri2');
$routes->get('/penelitianSemiMandiri3', 'Dosen::penelitianSemiMandiri3');
$routes->get('/penelitianSemiMandiri4', 'Dosen::penelitianSemiMandiri4');

//===========================New============================================
$routes->get('/penelitianProses1/(:any)', 'Dosen::penelitianProses1/$1');
$routes->get('/penelitianProses2/(:any)', 'Dosen::penelitianProses2/$1');
$routes->get('/penelitianProses2Kontrak/(:any)', 'Dosen::penelitianProses2Kontrak/$1');
$routes->get('/penelitianProses3/(:any)', 'Dosen::penelitianProses3/$1');
$routes->get('/penelitianProses4/(:any)', 'Dosen::penelitianProses4/$1');


//===========================Detail============================================
$routes->get('/penelitianDetail/saveLaporan/(:any)', 'PenelitianDetail::saveLaporan/$1');

//===========================New============================================

$routes->get('/penelitianDidanaiInstitusi1', 'Dosen::penelitianDidanaiInstitusi1');
$routes->get('/penelitianDidanaiInstitusi2', 'Dosen::penelitianDidanaiInstitusi2');
$routes->get('/penelitianDidanaiInstitusi3', 'Dosen::penelitianDidanaiInstitusi3');
$routes->get('/penelitianDidanaiInstitusi4', 'Dosen::penelitianDidanaiInstitusi4');

$routes->get('/penelitianInstitusi1', 'Dosen::penelitianInstitusi1');
$routes->get('/penelitianInstitusi2', 'Dosen::penelitianInstitusi2');
$routes->get('/penelitianInstitusi3', 'Dosen::penelitianInstitusi3');
$routes->get('/penelitianInstitusi4', 'Dosen::penelitianInstitusi4');

$routes->get('/pkmMandiri1', 'Dosen::pkmMandiri1');
$routes->get('/pkmMandiri2', 'Dosen::pkmMandiri2');
$routes->get('/pkmMandiri3', 'Dosen::pkmMandiri3');
$routes->get('/pkmMandiri4', 'Dosen::pkmMandiri4');

$routes->get('/pkmTerstruktur1', 'Dosen::pkmTerstruktur1');
$routes->get('/pkmTerstruktur2', 'Dosen::pkmTerstruktur2');
$routes->get('/pkmTerstruktur3', 'Dosen::pkmTerstruktur3');
$routes->get('/pkmTerstruktur4', 'Dosen::pkmTerstruktur4');

$routes->get('/pkmKelompok1', 'Dosen::pkmKelompok1');
$routes->get('/pkmKelompok2', 'Dosen::pkmKelompok2');
$routes->get('/pkmKelompok3', 'Dosen::pkmKelompok3');
$routes->get('/pkmKelompok4', 'Dosen::pkmKelompok4');

$routes->get('/login', 'Login::index');
//routes create pengajuan
$routes->get('/penelitian/save', 'Penelitian::save');
$routes->get('/pkm/save', 'PKM::save');

// ================================================================
//                          Admin PPPM
// ================================================================
$routes->get('/indexAdmin', 'Admin::index');
$routes->get('/anggaranAdmin', 'Admin::anggaran');
$routes->get('/penelitianAdmin', 'Admin::penelitian');
$routes->get('/pkmAdmin', 'Admin::pkm');
$routes->get('/userSetting', 'Admin::userSetting');
$routes->get('/editUser', 'Admin::editUser');

$routes->get('/adminSemiMandiri1', 'Admin::adminSemiMandiri1');
$routes->get('/adminSemiMandiri2', 'Admin::adminSemiMandiri2');
$routes->get('/adminSemiMandiri3', 'Admin::adminSemiMandiri3');

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

// ================================================================
//                          Reviewer
// ================================================================
$routes->get('/indexReviewer', 'Reviewer::index');
$routes->get('/anggaranReviewer', 'Reviewer::anggaran');
$routes->get('/penelitianReviewer', 'Reviewer::penelitian');
$routes->get('/persetujuanReviewer/(:any)', 'Reviewer::persetujuan/$1');
$routes->get('/acc-reviewer/(:any)', 'Reviewer::acc_penelitian_reviewer/$1');
$routes->get('/rjc-reviewer/(:any)', 'Reviewer::rjc_penelitian_reviewer/$1');

// ================================================================
//                          Direktur
// ================================================================
$routes->get('/indexDirektur', 'Direktur::index');
$routes->get('/anggaranDirektur', 'Direktur::anggaran');
$routes->get('/penelitianDirektur', 'Direktur::penelitian');
$routes->get('/persetujuanDirektur/(:any)', 'Direktur::persetujuan/$1');
$routes->get('/acc-direktur/(:any)', 'Direktur::acc_penelitian_direktur/$1');

// ================================================================
//                          Kepala PPPM
// ================================================================
$routes->get('/indexKepala', 'Kepala::index');
$routes->get('/anggaranKepala', 'Kepala::anggaran');
$routes->get('/penelitianKepala', 'Kepala::penelitian');
$routes->get('/penelitianPersetujuanKepala/(:any)', 'Kepala::penelitianPersetujuan/$1');
$routes->get('/pkmKepala', 'Kepala::pkm');
$routes->get('/pkmPersetujuanKepala', 'Kepala::pkmPersetujuan');
$routes->get('/acc-kepala/(:any)', 'Kepala::acc_penelitian_kepala/$1');
$routes->get('/rjc-kepala/(:any)', 'Kepala::rjc_penelitian_kepala/$1');


// ================================================================
//                          BAU
// ================================================================
$routes->get('/indexBAU', 'BAU::index');
$routes->get('/anggaranBAU', 'BAU::anggaran');
$routes->get('/penelitianBAU', 'BAU::penelitian');
$routes->get('/persetujuanBAU/(:any)', 'BAU::persetujuan/$1');
$routes->get('/acc-BAU/(:any)', 'BAU::acc_penelitian_BAU/$1');
$routes->get('/rjc-BAU/(:any)', 'BAU::rjc_penelitian_BAU/$1');

//download proposal
$routes->get('/penelitian/download-p1-proposal/(:any)', 'ProposalPenelitian::download_p1_proposal/$1');
$routes->get('/penelitian/download-p2-proposal/(:any)', 'ProposalPenelitian::download_p2_proposal/$1');
$routes->get('/penelitian/download-p3-proposal/(:any)', 'ProposalPenelitian::download_p3_proposal/$1');
$routes->get('/penelitian/download-p4-proposal/(:any)', 'ProposalPenelitian::download_p4_proposal/$1');
$routes->get('/penelitian/download-p5-proposal/(:any)', 'ProposalPenelitian::download_p5_proposal/$1');
$routes->get('/penelitian/download-all-proposal/(:any)', 'ProposalPenelitian::download_all_proposal/$1');
$routes->get('/lihat_pdf/(:any)', 'ProposalPenelitian::lihat_pdf/$1');

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
