<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;

use App\Http\Controllers\Frontend\IndexController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


//Admin Routes
Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.loginform');
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});
Route::get('/admin/logout',[AdminController::class, 'destroy'])->name('admin.logout');

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');

Route::get('/admin/profile',[AdminProfileController::class, 'adminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit',[AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store/{id}',[AdminProfileController::class, 'adminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password',[AdminProfileController::class, 'changePassword'])->name('admin.change.password');
Route::post('/admin/update/password/{id}',[AdminProfileController::class, 'updatePassword'])->name('admin.update.password');

//Brand Routes
Route::prefix('brand')->group(function(){
    Route::get('/view',[BrandController::class, 'allBrand'])->name('all.brand');
    Route::post('/store',[BrandController::class, 'storeBrand'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'editBrand'])->name('brand.edit');
    Route::post('/update/{id}',[BrandController::class, 'updateBrand'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'deleteBrand'])->name('brand.delete');
});

//Category Routes
Route::prefix('category')->group(function(){
    Route::get('/view',[CategoryController::class, 'allCategory'])->name('all.category');
    Route::post('/store',[CategoryController::class, 'storeCategory'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'editCategory'])->name('category.edit');
    Route::post('/update/{id}',[CategoryController::class, 'updateCategory'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('category.delete');
});

//SubCategory Routes
Route::prefix('subcategory')->group(function(){
    Route::get('/view',[SubCategoryController::class, 'allSubCategory'])->name('all.subcategory');
    Route::post('/store',[SubCategoryController::class, 'storeSubCategory'])->name('subcategory.store');
    Route::get('/edit/{id}', [SubCategoryController::class, 'editSubCategory'])->name('subcategory.edit');
    Route::post('/update/{id}',[SubCategoryController::class, 'updateSubCategory'])->name('subcategory.update');
    Route::get('/delete/{id}', [SubCategoryController::class, 'deleteSubCategory'])->name('subcategory.delete');
});


//User Routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/',[IndexController::class, 'index']);
Route::get('/user/logout',[IndexController::class, 'logout'])->name('user.logout');
Route::get('/user/profile',[IndexController::class, 'userProfile'])->name('user.profile');
Route::post('/user/profile/update',[IndexController::class, 'userProfileUpdate'])->name('user.profile.update');
Route::get('/user/change/password',[IndexController::class, 'changePassword'])->name('user.change.password');
Route::post('/user/update/password',[IndexController::class, 'updatePassword'])->name('user.update.password');