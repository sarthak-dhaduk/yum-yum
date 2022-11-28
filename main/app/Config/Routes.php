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
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('index', 'Home::index');
$routes->get('shop', 'ItemController::ManageUsers_Web');
$routes->get('news', 'Home::news');
$routes->get('single-news', 'Home::s_news');
$routes->get('single-product', 'ItemController::Single_Item_Web');
$routes->post('buy_from_item', 'ItemController::buy_from_item');
$routes->post('give_review', 'ReviewsController::give_review');
$routes->get('contact', 'ContactController::contact');
$routes->post('contact_us', 'ContactController::contact_us');
$routes->get('cart', 'CartController::cart');
$routes->get('cart_u', 'CartController::cart_u');
$routes->get('buy_from_cart', 'CartController::buy_from_cart');
$routes->get('delete_from_cart', 'CartController::delete_from_cart');
$routes->get('about', 'Home::about');
$routes->get('login', 'Home::login');
$routes->post('login_check', 'LoginController::verify_user');
$routes->get('logout', 'UserDashboardController::logout');
$routes->get('register', 'Home::register');
$routes->post('InsertData', 'Home::InsertData');
$routes->get('forget_password_view', 'Activate_Account_Controller::forget_Password');
$routes->post('forgetpasswordaction', 'Activate_Account_Controller::forget_Password_action');
$routes->get('foregtpwdpage', 'Activate_Account_Controller::forget_Password_update');
$routes->get('newPasswordForm', 'Activate_Account_Controller::newPasswordForm');
$routes->post('updatenewPassword', 'Activate_Account_Controller::updatenewPassword');

//Admin

$routes->get('index2', 'ContactController::ManageUsers');

$routes->get('forms_input_groups', 'Home2::forms_input_groups');
$routes->get('forms_basic_inputs', 'Home2::forms_basic_inputs');
$routes->get('edit_register_table', 'UserDashboardController::edit_register_table');
$routes->get('edit_added_item_table', 'ItemController::edit_added_item_table');
$routes->get('pages_account_settings_connections', 'Home2::pages_account_settings_connections');
$routes->get('pages_account_settings_notifications', 'Home2::pages_account_settings_notifications');
$routes->get('tables_basic', 'UserController::ManageUsers');
$routes->get('orderd', 'OrdersController::ManageUsers');
$routes->get('reviews', 'ReviewsController::ManageUsers');
$routes->get('cart_t', 'CartController::ManageUsers');
$routes->get('added_item', 'ItemController::ManageUsers');
$routes->post('add_item', 'ItemController::add_item');
$routes->get('admin_add_item', 'Home2::demo');
$routes->get('pages_misc_error', 'Home2::pages_misc_error');
$routes->get('pages_account_settings_account', 'UserDashboardController::edit_profile');
$routes->post('editProfile', 'UserDashboardController::editProfile');
$routes->post('single_user_u', 'UserDashboardController::single_user_u');
$routes->post('edit_admin_added_item', 'ItemController::edit_admin_added_item');
$routes->post('edit_admin_orderd_item', 'OrdersController::edit_admin_orderd_item');
$routes->get('edit_orderd_table', 'OrdersController::edit_orderd_table');
$routes->get('edit_review_table', 'ReviewsController::edit_review_table');
$routes->get('edit_cart_table', 'CartController::edit_cart_table');
$routes->post('edit_admin_review_item', 'ReviewsController::edit_admin_review_item');
$routes->post('edit_admin_cart_item', 'CartController::edit_admin_cart_item');
$routes->get('delete_added_item_table', 'ItemController::delete_added_item_table');
$routes->get('delete_orderd_table', 'OrdersController::delete_orderd_table');
$routes->get('delete_review_table', 'ReviewsController::delete_review_table');
$routes->get('delete_register_table', 'UserDashboardController::delete_register_table');
$routes->get('delete_cart_table', 'CartController::delete_cart_table');
$routes->get('delete_contact_table', 'ContactController::delete_contact_table');

//User

$routes->get('index3', 'UserDashboardController::ManageUsers_u');
$routes->get('pages_account_settings_account_u', 'UserDashboardController::edit_profile');





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
