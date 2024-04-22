<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExhibitionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [AuthController::class, 'Home'])->name('Home');
Route::get('/AdminDashboard', [AuthController::class, 'AdminDashboard']);
Route::get('/organizerform', [AuthController::class, 'OrganizerRegistrationForm']);
Route::get('/exhibitorform', [AuthController::class, 'ExhibitorForm']);
Route::get('/signin', [AuthController::class, 'loginPage']);
Route::post('/regorganizer', [AuthController::class, 'OrganizerRegistrationSubmitForm']);
Route::post('/regexhibitor', [AuthController::class, 'ExhibitorRegistrationSubmitForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::get('/approvedorgcount', [ExhibitionController::class, 'approvedorgcount']);
Route::get('/unapprovedorgcount', [ExhibitionController::class, 'unapprovedorgcount']);
Route::get('/approvedexcount', [ExhibitionController::class, 'approvedexcount']);
Route::get('/unapprovedexcount', [ExhibitionController::class, 'unapprovedexcount']);

Route::get('/rejectedorgcount', [ExhibitionController::class, 'rejectedorgcount']);
Route::get('/rejectedexcount', [ExhibitionController::class, 'rejectedexcount']);

Route::get('/ExDashboard', [ExhibitionController::class, 'exdashboard']);
Route::get('/OrgDashboard', [ExhibitionController::class, 'orgdashboard'])->name('OrgDashboard');
Route::get('/industrymaster', [ExhibitionController::class, 'industrymaster']);

//Route::post('/regexhibitor', [ExhibitionController::class, 'ExhibitorRegistrationSubmitForm']);

Route::get('/deleteindustry/{id}', [ExhibitionController::class, 'deleteindustry']);

Route::post('/updateStatus', [ExhibitionController::class, 'updateStatus']);



Route::post('/storeindustrydetails', [ExhibitionController::class, 'storeindustrydetails']);

Route::get('/createExhibitionform', [ExhibitionController::class, 'createExhibitionform']);

Route::post('/createExhibition', [ExhibitionController::class, 'storeExhibitionform']);




Route::get('/activeExhibitions', [ExhibitionController::class, 'activeExhibitions']);
Route::get('/InactiveExhibitions', [ExhibitionController::class, 'InactiveExhibitions']);


Route::get('/updateExStatus/{id}', [ExhibitionController::class, 'updateExStatus'])->name('updateExStatus');
//Route::post('/update-exhibition-status', [ExhibitionController::class, 'updateExStatus'])->name('updateExStatus');
Route::get('/products', [ExhibitionController::class, 'products']);
Route::get('/documents', [ExhibitionController::class, 'documents']);
Route::get('/upcomingExhibitions', [ExhibitionController::class, 'upcomingExhibitions']);
Route::get('/pastExhibitions', [ExhibitionController::class, 'pastExhibitions']);




Route::post('/storeproductdetails', [ExhibitionController::class, 'storeproductdetails']);

Route::post('/storedocuments', [ExhibitionController::class, 'storedocuments']);


Route::get('/assignproducts', [ExhibitionController::class, 'assignproducts'])->name('assignproducts');




