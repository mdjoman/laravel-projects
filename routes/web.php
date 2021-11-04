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

//Route::get('/', function () {
 //   return view('Site-template.index');});


Route::get('/', [

    'uses'   =>  'App\Http\Controllers\ecommarcecontroller@index',
    'as'     =>  '/',
   
]);
Route::get('/about', [

    'uses'   =>  'App\Http\Controllers\ecommarcecontroller@about',
    'as'     =>  'about',
  
]);

Route::get('/category-product/{id}', [

    'uses'   =>  'App\Http\Controllers\ecommarcecontroller@product',
    'as'     =>  'category-product',
   
]);

Route::get('/product-details/{id}', [

    'uses'   =>  'App\Http\Controllers\ecommarcecontroller@details',
    'as'     =>  'product-details',
  
]);

Route::post('/cart', [

    'uses'   =>  'App\Http\Controllers\cardcontroller@cart',
    'as'     =>  'cart',
    
]);

Route::get('/show-cart', [

    'uses'   =>  'App\Http\Controllers\cardcontroller@show',
    'as'     =>  'show-cart',
   
]);

Route::get('/remove-cart/{rowId}', [

    'uses'   =>  'App\Http\Controllers\cardcontroller@remove',
    'as'     =>  'remove-cart',
   
]);
Route::get('/checkout', [

    'uses'   =>  'App\Http\Controllers\cardcontroller@checkout',
    'as'     =>  'checkout',
   
]);
Route::post('/update', [

    'uses'   =>  'App\Http\Controllers\cardcontroller@update',
    'as'     =>  'update',
    
]);

Route::post('/customar-resistration', [

    'uses'   =>  'App\Http\Controllers\customercontroller@resistration',
    'as'     =>  'customar-resistration',
    
]);

Route::post('/customar-shiping', [

    'uses'   =>  'App\Http\Controllers\customercontroller@shiping',
    'as'     =>  'customar-shiping',
    
]);

Route::post('/complete-order', [

    'uses'   =>  'App\Http\Controllers\customercontroller@completeOrder',
    'as'     =>  'complete-order',
    
]);



Route::post('/customar-login', [

    'uses'   =>  'App\Http\Controllers\customercontroller@login',
    'as'     =>  'customar-login',
    
]);
Route::post('/customar-logout', [

    'uses'   =>  'App\Http\Controllers\customercontroller@logout',
    'as'     =>  'customar-logout',
    
]);



Route::get('/register', [

    'uses'   =>  'App\Http\Controllers\Auth\RegisterController@register',
    'as'     =>  'register',
   
]);
Route::get('/forgot-password', [

    'uses'   =>  'App\Http\Controllers\Auth\ForgotPasswordController@forgot',
    'as'     =>  'forgot-password',
   
]);
Route::post('/new-category', [

    'uses'   =>  'App\Http\Controllers\Categoriescontoller@create',
    'as'     =>  'new-category',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);

Route::post('/new-brand',[
    'uses' =>  'App\Http\Controllers\Brandcontoller@brand',
    'as'   =>  'new-brand',
    'middleware'=> ['auth:sanctum', 'verified']
]);

Route::get('/manage-categories', [

    'uses'   =>  'App\Http\Controllers\Categoriescontoller@manage',
    'as'     =>  'manage-categories',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);

Route::get('/edit-category/{id}', [

    'uses'   =>  'App\Http\Controllers\Categoriescontoller@edit',
    'as'     =>  'edit-category',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);
Route::get('/edit-brand/{id}', [

    'uses'   =>  'App\Http\Controllers\Brandcontoller@edit',
    'as'     =>  'edit-brand',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);

Route::post('/update-category',[
    'uses' =>  'App\Http\Controllers\Categoriescontoller@update',
    'as'   =>  'update-category',
    'middleware'=> ['auth:sanctum', 'verified']
]);

Route::post('/update-brand',[
    'uses' =>  'App\Http\Controllers\Brandcontoller@update',
    'as'   =>  'update-brand',
    'middleware'=> ['auth:sanctum', 'verified']
]);

Route::get('/delete-category/{id}', [

    'uses'   =>  'App\Http\Controllers\Categoriescontoller@delete',
    'as'     =>  'delete-category',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);

Route::get('/delete-brand/{id}', [

    'uses'   =>  'App\Http\Controllers\Brandcontoller@delete',
    'as'     =>  'delete-brand',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);
Route::get('/add-categories', [

    'uses'   =>  'App\Http\Controllers\Categoriescontoller@add',
    'as'     =>  'add-categories',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);

Route::get('/add-brand', [

    'uses'   =>  'App\Http\Controllers\Brandcontoller@add',
    'as'     =>  'add-brand',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);
Route::get('/manage-brand', [

    'uses'   =>  'App\Http\Controllers\Brandcontoller@manage',
    'as'     =>  'manage-brand',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);

Route::get('/add-product', [

    'uses'   =>  'App\Http\Controllers\Productcontoller@add',
    'as'     =>  'add-product',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);
Route::post('/create-product', [

    'uses'   =>  'App\Http\Controllers\Productcontoller@create',
    'as'     =>  'create-product',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);

Route::get('/manage-product', [

    'uses'   =>  'App\Http\Controllers\Productcontoller@manage',
    'as'     =>  'manage-product',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);

Route::get('/edit-product/{id}', [

    'uses'   =>  'App\Http\Controllers\Productcontoller@edit',
    'as'     =>  'edit-product',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);
Route::get('/delete-product/{id}', [

    'uses'   =>  'App\Http\Controllers\Productcontoller@delete',
    'as'     =>  'delete-product',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);
Route::post('/update-product',[
    'uses' =>  'App\Http\Controllers\Productcontoller@update',
    'as'   =>  'update-product',
    'middleware'=> ['auth:sanctum', 'verified']
]);

Route::get('/view-product/{id}', [

    'uses'   =>  'App\Http\Controllers\Productcontoller@view',
    'as'     =>  'view-product',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);
Route::get('/manage-order', [

    'uses'   =>  'App\Http\Controllers\customercontroller@manageorder',
    'as'     =>  'manage-order',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);
Route::get('/view-order/{id}', [

    'uses'   =>  'App\Http\Controllers\customercontroller@vieworder',
    'as'     =>  'view-order',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);

Route::get('/invoice/{id}', [

    'uses'   =>  'App\Http\Controllers\customercontroller@invoice',
    'as'     =>  'invoice',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);
Route::get('/dwonlod-invoice/{id}', [

    'uses'   =>  'App\Http\Controllers\customercontroller@dwonlodinvoice',
    'as'     =>  'dwonlod-invoice',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);
Route::get('/print-invoice/{id}', [

    'uses'   =>  'App\Http\Controllers\customercontroller@printinvoice',
    'as'     =>  'print-invoice',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);

Route::get('/delete-order/{id}', [

    'uses'   =>  'App\Http\Controllers\customercontroller@deleteorder',
    'as'     =>  'delete-order',
    'middleware'     =>  ['auth:sanctum', 'verified']
]);


//Route::get('/dashboard', [

  // 'uses'       =>  'App\Http\Controllers\admincontroller@login',
 //   'as'         =>  'login',
  //  'middleware' =>  (['auth:sanctum', 'verified']),
//]);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

