<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VarientController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\SpecificationNameController;
use App\Http\Controllers\SpecificationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ServiceListController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\UpdateSeasonController;
use App\Http\Controllers\IconLocationcontroller;
use App\Http\Controllers\Commonfaqcontroller;
use App\Http\Controllers\Enquirycontroller;
use App\Http\Controllers\Enquirybannerimagecontroller;
use App\Http\Controllers\PolicybannerimageController;
use App\Http\Controllers\ServiceseasonController;
use App\Http\Controllers\AttachseasonserviceController;
use App\Http\Controllers\Locationcontroller;
use App\Http\Controllers\ServicebannerController;
use App\Http\Controllers\ServicevideoController;
use App\Http\Controllers\ServicefaqController;
use App\Http\Controllers\BlogpageController;

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
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {

    Route::resource('banner',BannerController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('models',ModelController::class);
    Route::resource('varients',VarientController::class);
    Route::get('/spec-get/{id}', [VarientController::class,'getspecification']);
    Route::get('/specification-details',[VarientController::class,'SpecificationDetails'])->name('varient.getSpecificationDetails');

    Route::resource('car',ProductController::class);
    Route::resource('service',ServiceController::class);
    Route::resource('servicetype',ServiceTypeController::class);
    Route::get('/servicelist-get/{id}', [ServiceListController::class,'addService']);
    // Route::post('form/save', [ServiceListController::class, 'saveRecord'])->name('form/save');
    Route::post('/servicelist/store/', [ServiceListController::class,'storeService'])->name('servicelist.store');
    Route::delete('servicelist/delete/{id?}', [ServiceListController::class,'delete'])->name('servicelist.delete');

    Route::resource('specname',SpecificationNameController::class);
    Route::resource('seasons', SeasonController::class);
    Route::resource('update-season', UpdateSeasonController::class);
    Route::resource('iconlocation', IconLocationcontroller::class);
    Route::resource('commonfaq', Commonfaqcontroller::class);
    Route::resource('serviceseason', ServiceseasonController::class);
    Route::resource('attachseasonservice', AttachseasonserviceController::class);
    Route::resource('enquirybannerimg', Enquirybannerimagecontroller::class);
    Route::resource('policybannerimg', PolicybannerimageController::class);
    Route::resource('location', Locationcontroller::class);
    Route::resource('servicebanner', ServicebannerController::class);
    Route::resource('servicevideo', ServicevideoController::class);
    Route::resource('servicefaq', ServicefaqController::class);
    Route::resource('blogpage', BlogpageController::class);


    Route::get('/specification.index', [SpecificationController::class,'index'])->name('specification.index');
    Route::get('/specification.create', [SpecificationController::class,'create'])->name('specification.create');
    Route::post('/specification.store', [SpecificationController::class,'store'])->name('specification.store');
    Route::put('/specification-update/{id}', [SpecificationController::class,'update']);

    Route::get('findcategory', [ProductController::class,'findCategoryname']);
    Route::get('findmodel', [ProductController::class,'findModelname']);

    Route::get('enquiry', [Enquirycontroller::class,'index'])->name("enquiry.index");
    Route::get('export',[EnquiryController::class,'export'])->name("export");

    // Route::get('image',[ImageController::class,'index'])->name('image.index');
    // Route::get('image/create',[ImageController::class,'create'])->name('image.create');
    Route::get('/destroy/image/{image?}', [ImageController::class,'destroyImage'])->name('destroy.image');
    // Route::get('/destroy/interiorimages/{image?}', [ImageController::class,'destroyInteriorImage'])->name('destroy.interiorimage');
    Route::delete('interior/delete/{id?}', [ImageController::class,'destroyInteriorImage'])->name('interior.delete');



});
