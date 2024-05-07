<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotifyController;
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
Route::get('/signin', [AuthController::class, 'loginPage']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/regorganizer', [AuthController::class, 'OrganizerRegistrationSubmitForm']);
Route::post('/regexhibitor', [AuthController::class, 'ExhibitorRegistrationSubmitForm']);
Route::get('/organizerform', [AuthController::class, 'OrganizerRegistrationForm']);
Route::get('/exhibitorform', [AuthController::class, 'ExhibitorForm']);


Route::middleware(['validLogin','preventBackHistory'])->group(function () {
    //Add your routes here
    
    
    
Route::get('/AdminDashboard', [AuthController::class, 'AdminDashboard']);

Route::get('/auditlog',[AuthController::class,'auditLogDetails']);




Route::get('/logout', [AuthController::class, 'logout']);


Route::get('/approvedorgcount', [ExhibitionController::class, 'approvedorgcount']);
Route::get('/unapprovedorgcount', [ExhibitionController::class, 'unapprovedorgcount']);
Route::get('/approvedexcount', [ExhibitionController::class, 'approvedexcount']);
Route::get('/unapprovedexcount', [ExhibitionController::class, 'unapprovedexcount']);

Route::get('/rejectedorgcount', [ExhibitionController::class, 'rejectedorgcount']);
Route::get('/rejectedexcount', [ExhibitionController::class, 'rejectedexcount']);

Route::get('/ExDashboard', [ExhibitionController::class, 'exdashboard'])->name('ExDashboard');
Route::get('/OrgDashboard', [ExhibitionController::class, 'orgdashboard'])->name('OrgDashboard');
Route::get('/industrymaster', [ExhibitionController::class, 'industrymaster']);

//Route::post('/regexhibitor', [ExhibitionController::class, 'ExhibitorRegistrationSubmitForm']);

Route::get('/deleteindustry/{id}', [ExhibitionController::class, 'deleteindustry']);
Route::get('/deleteindustryo/{id}', [ExhibitionController::class, 'deleteindustryo']);


Route::post('/updateStatus', [ExhibitionController::class, 'updateStatus']);



Route::post('/storeindustrydetails', [ExhibitionController::class, 'storeindustrydetails']);
Route::post('/storeindustrydetailso', [ExhibitionController::class, 'storeindustrydetailso']);


Route::get('/createExhibitionform', [ExhibitionController::class, 'createExhibitionform']);
Route::get('/createExhibitionform-E', [ExhibitionController::class, 'createExhibitionformE']);



Route::post('/createExhibition', [ExhibitionController::class, 'storeExhibitionform']);
Route::post('/createExhibitionE', [ExhibitionController::class, 'storeExhibitionformE']);





Route::get('/activeExhibitions', [ExhibitionController::class, 'activeExhibitions'])->name('activeExhibitions');
Route::get('/InactiveExhibitions', [ExhibitionController::class, 'InactiveExhibitions']);


Route::get('/updateExStatus/{id}', [ExhibitionController::class, 'updateExStatus'])->name('updateExStatus');
//Route::post('/update-exhibition-status', [ExhibitionController::class, 'updateExStatus'])->name('updateExStatus');
Route::get('/products', [ExhibitionController::class, 'products']);
Route::get('/documents', [ExhibitionController::class, 'documents']);
Route::get('/upcomingExhibitions', [ExhibitionController::class, 'upcomingExhibitions'])->name('upcomingExhibitions');
Route::get('/upcomingExhibitionsO', [ExhibitionController::class, 'upcomingExhibitionsO']);


Route::get('/pastExhibitions', [ExhibitionController::class, 'pastExhibitions']);
Route::get('/companysetupform', [ExhibitionController::class, 'companysetupform']);

Route::get('/companysetupform-O', [ExhibitionController::class, 'companysetupformo']);





Route::post('/storeproductdetails', [ExhibitionController::class, 'storeproductdetails']);

Route::post('/storedocuments', [ExhibitionController::class, 'storedocuments']);

Route::get('/delete-document/{id}',[ExhibitionController::class,'deleteDocument']);


// Route::get('/assignproducts', [ExhibitionController::class, 'assignproducts'])->name('assignproducts');



Route::get('/deleteproduct/{id}', [ExhibitionController::class, 'deleteproduct']);
Route::get('documents/assignproducts/{encDocumentId}', [ExhibitionController::class, 'assignProducts']);



Route::get('/deleteassignedproducts/{id}',[ExhibitionController::class,'deleteAssignedProducts']);

Route::post('/assignprod',[ExhibitionController::class,'assignProd']);


//company set up
Route::post('/updatecompanydetails',[ExhibitionController::class,'updateCompanyDetails']);
Route::post('/updatecompanydetailsE',[ExhibitionController::class,'updatecompanydetailsE']);


});



Route::get('/pendingexcounts', [ExhibitionController::class, 'pendingexcounts']);

Route::get('/participatedExhibitions', [ExhibitionController::class, 'participatedExhibitions']);

Route::get('/visitordetails/{id}', [ExhibitionController::class, 'visitorsdetails'])->name('visitorsdetails');


Route::get('/industrymasterO', [ExhibitionController::class, 'industrymasterO']);

//participate in exhibitions
Route::get('/participate/{id}',[ExhibitionController::class,'participate']);

Route::post('/selected-options-to-notify',[NotifyController::class,'selectNotifyOptions']);

//Notifications Settings
Route::get('/notificationSetting', [NotifyController::class, 'notificationSetting']);


Route::post('/regvisitor',[ExhibitionController::class, 'regVisitor']  );


Route::get('/collectdata/{id}', [ExhibitionController::class, 'collectdata'])->name('collectdata');

Route::post('/notification-settings/email',[NotifyController::class,'storeEmailSettings']);

Route::post('/notification-settings/sms',[NotifyController::class,'storeSMSSettings']);





Route::get('/fetchvisitordata', [ExhibitionController::class, 'fetchvisitordata']);


//Edit Exhibition Route 
Route::get('/editExhibition/{id}', [ExhibitionController::class, 'editExhibition']);
Route::post('/updateExhibition',[ExhibitionController::class,'updateExhibition']);


?>