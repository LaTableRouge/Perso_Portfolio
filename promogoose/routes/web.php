<?php

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

/*Routes views*/
Route::get('/', 'HomeController@index')->name('index');

//Route du grand administrateur
//type
Route::get('/admin/add/type', 'AdminController@addType');
Route::get('/admin/modify/type', 'AdminController@modifyType');
Route::get('/admin/delete/type', 'AdminController@deleteType');
// category
Route::get('/admin/modify/category', 'AdminController@modifyCategory');
Route::get('/admin/add/category', 'AdminController@addCategory');
Route::get('/admin/delete/category', 'AdminController@deleteCategory');
//page admin
Route::get('/admin','AdminController@admin')->name('admin');


//Route pour qu'un utilisateur accède au code promotion
Route::get('/search/shop/getCodePromo','PagesController@getCodePromo')->name('getCodePromo');
/*  page d'un commerce*/
Route::get('/search/shop/{magasin_id}', 'PagesController@displayShop' )->name('commerces');

Route::get('/account/promos','PagesController@displayMesPromos')->name('mesPromos');
Route::get('/account/avis','PagesController@displayMesAvis')->name('mesAvis');


Route::get('/account/post/avis', function () {
    return view('pages/avis');
})->name('postAvis');

Route::post('account/post/avis/send','PagesController@postAvis')->name('post_avis'); 

Route::get('/mentions', function () {
    return view('pages/mentions');
})->name('mentions');

Route::get('/politique', function () {
    return view('pages/politiqueConf');
})->name('politique');

Route::get('/conditions', function () {
    return view('pages/conditions');
})->name('conditions');

Route::get('/service', function () {
    return view('pages/service');
})->name('service');

Route::get('/help', function () {
    return view('pages/help');
})->name('help');


Route::get('/search', 'HomeController@search')->name('search');


Route::get('/account','PagesController@getUser')->name('account');
Route::post('/account', 'PagesController@postEditUser')->name('user_edit_post');

// devenir commercant
Route::get('devenirCommercant', 'PagesController@devenirCommercant');

/*Routes logins/subscribe*/
Auth::routes();

/*Gets*/
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/getCities', 'HomeController@getCities')->name('getCities');
Route::get('/getShops', 'HomeController@getShops')->name('getShops');
Route::get('/getCategories', 'HomeController@getCategories')->name('getCategories');

/*Facebook connect*/
Route::get('auth/facebook', 'Auth\FacebookController@redirectToProvider')->name('facebook');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleProviderCallback')->name('facebookCallback');

/*Facebook connect*/
Route::get('auth/google', 'Auth\GoogleController@redirectToProvider')->name('google');
Route::get('auth/google/callback', 'Auth\GoogleController@handleProviderCallback')->name('googleCallback');


//////GESTION MAGASIN /////////////////////////////////////////////////
//routes pour la connexion sur magasin en edition et sauvegarde//
Route::get('/admin/stores/edit/{magasin_id}','AdminStores\StoreController@getEdit')->name('magasin_edit');
Route::post('/admin/stores/edit/','AdminStores\StoreController@postEdit')->name('magasin_post_edit');

//routes pour la création d'un magasin
Route::get('/admin/stores/create/' , 'AdminStores\StoreController@getCreateStore')->name('get_create_store');
Route::post('/admin/stores/create/' , 'AdminStores\StoreController@postCreateStore')->name('post_create_store');

//route pour la suppression d'un magasin
Route::get('/admin/stores/gestion/delete' , 'AdminStores\StoreController@deleteStore');

//Route gestion et affichage des commerces 
Route::get('/admin/stores/gestion/', 'AdminStores\StoreController@displayStores')->name('stores');

//Route d'affichage des promo d'n commerce
Route::get('/admin/stores/gestion/promo/{magasin_id?}', 'AdminStores\StoreController@promoStore')->name('promos');
//Route d'activation d'un promo
Route::get('/admin/stores/gestion/promo/{magasin_id?}/activPromo', 'AdminStores\StoreController@activPromo');
Route::get('/admin/stores/gestion/promo/{magasin_id?}/desactivPromo', 'AdminStores\StoreController@desactivPromo');
//Route de suppresson d'une des promo d'un commerce
Route::get('/admin/stores/gestion/promo/{magasin_id?}/delete', 'AdminStores\StoreController@deletePromo');

//routes pour la création d'une promotion en tant que commercant
Route::get('/admin/promotion/create/{magasin_id}' , 'PromotionController@getCreate')->name('get_create_promotion');
Route::post('/admin/promotion/create/' , 'PromotionController@postCreate')->name('post_create_promotion');


