<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Main Users
// Route::get('/', 'frontProductController@index')->name('main');
Route::get('/', 'CustomerLoginController@showLoginForm')->name('customer.loginform');
Route::get('/product-user', 'frontProductController@withdata')->name('main');
Route::get('customer/cart', 'frontProductController@cart')->middleware('auth:customer')->name('customer.cart');
Route::get('customer/sukses_order', 'frontProductController@sukses_order')->middleware('auth:customer')->name('customer.sukses_order');

Route::post('customer/store', 'CartController@store')->name('customer.store');
Route::post('customer/ordersend', 'CartController@ordersend')->name('customer.ordersend');




// Customers
Route::get('/customer/login', 'CustomerLoginController@showLoginForm')->name('customer.loginform');
Route::get('/customer/register', 'CustomerLoginController@showRegisterForm')->name('customer.registerform');
Route::post('/customer/login', 'CustomerLoginController@login')->name('customer.login');
Route::post('/customer/register', 'CustomerLoginController@register')->name('customer.register');
Route::get('/customer/home', 'CustomerLoginController@index')->middleware('auth:customer')->name('customer.home');
Route::get('/customer/logout', 'CustomerLoginController@logout')->name('customer.logout');




Route::group( ['middleware' => 'auth' ], function()
{
    
    // Dashoarad
    Route::get('/home', 'HomeController@index')->name('home');


    // manage user
    Route::get('users-list', 'UserController@index');
    Route::post('users-list/store', 'UserController@store')->name('user-store');
    Route::put('users-list/edit', 'UserController@edit')->name('user-edit');
    Route::get('users-list/delete/{id}', 'UserController@destroy');
    Route::get('users-list/resetpassword/{id}', 'UserController@resetpassword');


    // manage customers
    Route::get('customers-list', 'CustomerController@index');
    Route::post('customers-list/store', 'CustomerController@store')->name('customer-store');
    Route::put('customers-list/edit', 'CustomerController@edit')->name('customer-edit');
    Route::get('customers-list/delete/{id}', 'CustomerController@destroy');
    Route::get('customers-list/resetpassword/{id}', 'CustomerController@resetpassword');


    // manage product
    Route::get('product', 'ProductController@index');
    Route::post('product/store', 'ProductController@store')->name('product-store');
    Route::put('product/edit', 'ProductController@edit')->name('product-edit');

    Route::get('list-order', 'ProductController@listorder');
    Route::get('report-order/{order_numb}/{store_name}', 'ProductController@report_order')->name('cart-report');


    Route::get('/linkstorage', function () {
        Artisan::call('storage:link');
    });
    

});





Route::get('/register-mitra', function () {
    return view('auth.register-mitra');
});




// Route::get('/index', 'MainController@index')->name('main');
// Route::get('/index', 'SettingAccountController@index')->name('main');


// Route::get('/home/rincian/{id}/{duration}/{payment_method}', 'HomeController@rincian'); // Step Detail Order Rincian
// Route::get('/home/findmitra/', 'MitraFinderController@findmitra'); // Step Pencarian Mitra

// Route::get('/home/searchAlamat/', 'MitraFinderController@searchAlamat'); // Step Pencarian Mitra



// Route::get('home/send', 'MitraFinderController@send');
// Route::get('/home/orderan-mitra/', 'MitraFinderController@index');
// Route::get('/home/find-maps/', 'MitraFinderController@cekJarak');



// //Rendy
// Route::get('test', function () {
//     event(new App\Events\StatusLiked('Someone'));
//     return "Event has been sent!";
// });

// //Customers
// Route::get('/home', 'HomeController@index'); // Step Dashboard Mitra & Customers
// Route::get('/massage', 'HomeController@message'); // Step Menu Message
// Route::get('/cleaning', 'HomeController@cleaning'); // Step Menu Cleaning
// Route::get('/education', 'HomeController@education'); // Step Menu Cleaning
// Route::get('/home/detail/{id}', 'HomeController@detail');  // Step Menu Detail
// Route::get('/home/rincian/{id}/{duration}/{payment_method}/{adress}/{lat}/{lng}/{gender}/{detail_alamat}/{nomor_hp}', 'HomeController@rincian'); // Step Rincian
// Route::get('/home/pencarian/{id}/{duration}/{payment_method}/{adress}/{lat}/{lng}/{gender}/{detail_alamat}/{nomor_hp}/{fcm}', 'HomeController@pencarian'); // Step Pencarian
// Route::get('/home/countdown/{id}/{duration}/{payment_method}/{adress}/{lat}/{lng}/{gender}/{detail_alamat}/{nomor_hp}', 'HomeController@countdown'); // Step Pencarian


// Route::get('/home/suksesmencari/{id_mitra}','HomeController@suksesmencari');
// Route::post('/api-batalkan-pesanan','HomeController@akhiri_mulai_layanan');


// //Mitra
// Route::get('/home/orderan/', 'MitraController@orderan');
// Route::get('/home/orderan-detail/', 'MitraController@orderan_detail');
// Route::get('/home/count-down-mulai-layanan/', 'MitraController@countDownMitra');
// Route::get('/home/aktivitas/', 'MitraController@aktivitas');
// Route::get('/home/profile-mitra/', 'MitraController@profileMitra');
// Route::get('/home/profile-mitra/edit/{id}', 'MitraController@edit');
// Route::get('/home/saldo','MitraController@saldo');
// Route::get('/home/virtual-account','MitraController@ShowVirtualAccount');
// Route::get('/home/show-berhasil-topup','MitraController@ShowBerhasilTopUp');
// Route::get('/home/show-akhiri-layanan', 'MitraController@akhiri_mulai_layanan');
// Route::post('/home/profile-mitra/update-data','MitraController@updateData');

// Route::get('ShowToken','MitraController@ShowToken');


// //BACKEND
// Route::get('/home/orderan-masuk/', 'MitraController@orderan_masuk');




// //API Ajax Mitra
// Route::post('/api-updatemitra-statusorder-maps','MitraController@updateStatusMaps');
// Route::post('/api-save-rekening-mitra','MitraController@rekeningMitra');
// Route::post('/api-tarik-saldo-mitra','MitraController@TarikSaldo');
// Route::post('/api-update-count-down','MitraController@UpdateCountDown');
// Route::post('/api-proses-layanan','MitraController@PostProsesLayanan');

// //XENDIT
// Route::post('/xendit-create-virtual-account','MitraController@createVirtualAccount');
// Route::post('/xendit-create-disbursement','MitraController@createDisbursement');
// Route::post('/xendit-disbursementCallBack','MitraController@DisbursementCallBack');
// Route::post('/xendit-FVACallBack','MitraController@FVACallBack');
// Route::post('/xendit-simulation-payment','MitraController@simulated');
// Route::post('/xendit-ceksimulation-payment','MitraController@Ceksimulated');
// Route::get('/simulator_payment','MitraController@simulator_payment');





Auth::routes();








