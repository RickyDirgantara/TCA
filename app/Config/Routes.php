<?php
use App\Controllers\DetailBarang;
namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('HomePage');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'HomePage::index/$1');
$routes->get('home/index/(:num)', 'HomePage::category/$1');
$routes->get('/admin', 'Dashboard::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/login', 'Admin::login');
$routes->post('/login', 'Admin::login');
$routes->get('/profile', 'Profile::index');
$routes->post('/updateProfile', 'Profile::updateProfile');
$routes->get('/logout', 'Admin::logout');


// Auction
$routes->get('/users', 'Users::index');
$routes->get('/auctions', 'Auction::index');
$routes->get('/barang', 'Barang::index');
$routes->get('/userProfile', 'Profile::index');
$routes->post('/detailbarang/(:num)', 'DetailBarang::liveBids/$1');
$routes->get('/checkIfBidsExistInDatabase', 'DetailBarang::checkIfBidsExistInDatabase');
$routes->get('/getTotalBids/(:num)', 'DetailBarang::getTotalBids/$1');
$routes->get('/snk', 'SnK::index');
$routes->get('/previewbarangseller/(:num)', 'PreviewBarang::index/$1');
$routes->get('/editbarang/(:num)', 'PreviewBarang::EditBarang/$1');
$routes->post('/editbarang/(:num)', 'PreviewBarang::update/$1');
$routes->get('/checkout/(:num)', 'Checkout::index/$1');
$routes->get('/bukti-pembayaran', 'Checkout::Checkout');
// user function
$routes->get('/user_login', 'Users::user_login');
$routes->post('/user_login', 'Users::processLogin');
$routes->post('/save', 'Users::save');
$routes->get('/signup', 'Users::registration');
$routes->get('/Userlogout', 'Users::Userlogout');
$routes->get('/UserProfile', 'UserProfile::index');
$routes->get('/form_barang', 'UserBarang::index');
$routes->post('/updatebarang', 'PreviewBarang::update');
$routes->post('/tambahBarang', 'UserBarang::store');
$routes->get('/detailbarang/(:num)', 'DetailBarang::show/$1', ['as' => 'detailbarang.show']);
$routes->get('/editProfile', 'UserProfile::EditProfile');
$routes->post('/UpdateUserProfile', 'UserProfile::UpdateProfilePictures');
$routes->post('/UpdateUser', 'UserProfile::updateProfile');
$routes->get('/myProfile', 'UserProfile::UpdateProfileView');

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
