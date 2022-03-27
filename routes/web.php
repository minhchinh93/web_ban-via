<?php

//admin
use App\Http\Controllers\admin\adminHomeController;
use App\Http\Controllers\admin\craterJobController;
use App\Http\Controllers\admin\dasboaController;
use App\Http\Controllers\admin\DetailController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\admin\totalController;
use App\Http\Controllers\admin\typeProductController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\auth\cfController;
use App\Http\Controllers\auth\logincontroller;
use App\Http\Controllers\auth\regiterController;
use App\Http\Controllers\auth\resetpassController;
use App\Http\Controllers\client\AccountHistoryController;
use App\Http\Controllers\client\DesignerController;
use App\Http\Controllers\client\detailIdeaController;
use App\Http\Controllers\client\docController;
use App\Http\Controllers\client\finePngController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\indexController;
use App\Http\Controllers\client\RechargeHistoryController;
use App\Http\Controllers\client\toolController;
//clients
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

Route::get('/chinh', function () {
    return view('client.test');
});
Route::middleware('CheckDesinger')->group(function () {
    Route::get('Dashboard', [DesignerController::class, 'Dashboard'])->name('Dashboard');
    Route::get('Detail/{id}', [DesignerController::class, 'Detail'])->name('Detail');
    Route::post('acceptDetail/{id}', [DesignerController::class, 'acceptDetail'])->name('acceptDetail');
    Route::get('accept/{id}', [DesignerController::class, 'accept'])->name('accept');
    Route::get('complete', [DesignerController::class, 'complete'])->name('complete');
    Route::get('PendingDS', [DesignerController::class, 'PendingDS'])->name('PendingDS');
    Route::get('replay', [DesignerController::class, 'replay'])->name('replay');
    Route::get('NotSeen', [DesignerController::class, 'NotSeen'])->name('NotSeen');
    Route::get('prioritize', [DesignerController::class, 'prioritize'])->name('prioritize');
    Route::post('componentDesigner/{id}', [DesignerController::class, 'componentDesigner'])->name('componentDesigner');

    Route::get('deleteProductPngDetails/{id}', [DesignerController::class, 'deleteProductPngDetails'])->name('deleteProductPngDetails');
    Route::post('addPngDetails/{id}', [DesignerController::class, 'addPngDetails'])->name('addPngDetails');

    Route::get('deletemocups/{id}', [DesignerController::class, 'deletemocups'])->name('deletemocups');
    Route::post('addmocups/{id}', [DesignerController::class, 'addmocups'])->name('addmocups');
    Route::get('deleteMocupAll/{id}', [DesignerController::class, 'deleteMocupAll'])->name('deleteMocupAll');
    Route::get('deletePngAll/{id}', [DesignerController::class, 'deletePngAll'])->name('deletePngAll');

});
Route::get('dasboa', [indexController::class, 'dasboa'])->name('dasboa');

Route::middleware('CheckIdea')->group(function () {

    // Route::get('/chinh', function () {
    //     return view('client.test');
    // });
    Route::get('/', [HomeController::class, 'home'])->name('home');
    // Route::get('dasboa', [HomeController::class, 'dasboa'])->name('dasboa');

    Route::get('done', [HomeController::class, 'done'])->name('done');
    Route::get('Pending', [HomeController::class, 'Pending'])->name('Pending');
    Route::get('allidea', [HomeController::class, 'allidea'])->name('allidea');
    Route::get('NotReceived', [HomeController::class, 'NotReceived'])->name('NotReceived');
    Route::get('success/{id}', [HomeController::class, 'success'])->name('success');
    Route::get('warning/{id}', [HomeController::class, 'warning'])->name('warning');
    Route::get('delete/{id}', [HomeController::class, 'delete'])->name('delete');
    Route::get('EditShow/{id}', [HomeController::class, 'EditShow'])->name('EditShow');
    Route::post('Edit/{id}', [HomeController::class, 'Edit'])->name('Edit');
    Route::post('addIdea', [HomeController::class, 'addIdea'])->name('addIdea');
    Route::get('approvalShow/{id}', [HomeController::class, 'approvalShow'])->name('approvalShow');
    Route::post('approval/{id}', [HomeController::class, 'approval'])->name('approval');
    Route::get('important/{id}', [HomeController::class, 'important'])->name('important');
    // Route::get('showimage/{id}', [HomeController::class, 'showimage'])->name('showimage');
    Route::post('showimage', [HomeController::class, 'showimage'])->name('showimage');
    Route::post('comment/{id}', [HomeController::class, 'comment'])->name('comment');
    Route::get('find', [HomeController::class, 'find'])->name('find');

    Route::get('ajax/{id}', [HomeController::class, 'ajax'])->name('ajax');
    Route::get('EditShow/ajax/{id}', [HomeController::class, 'EditShowajax'])->name('EditShowajax');

    Route::get('deleteImage/{id}', [HomeController::class, 'deleteImage'])->name('deleteImage');
    Route::post('addImage/{id}', [HomeController::class, 'addImage'])->name('addImage');

    Route::get('showdetail/{key1}/{key2}', [detailIdeaController::class, 'showdetail'])->name('showdetail');

    // find PNG

});

Route::middleware('auth')->group(function () {
    Route::get('showTool', [toolController::class, 'showTool'])->name('showtool');
    Route::post('postTypeProduct', [toolController::class, 'postTypeProduct'])->name('postTypeProduct');

    Route::post('cornerstone', [toolController::class, 'cornerstone'])->name('cornerstone');

    Route::post('cornerstoneProduct/{id}', [toolController::class, 'cornerstoneProduct'])->name('cornerstoneProduct');

    Route::get('/carbon', [toolController::class, 'carbon'])->name('carbon');
    Route::post('cornerstoneadd', [toolController::class, 'cornerstoneadd'])->name('cornerstoneadd');
    Route::post('cornerstonedele', [toolController::class, 'cornerstonedele'])->name('cornerstonedele');

    Route::get('showIdeaa', [toolController::class, 'showIdeaa'])->name('showIdeaa');
    Route::get('showPNGG', [toolController::class, 'showPNGG'])->name('showPNGG');
    Route::get('showMockup', [toolController::class, 'showMockup'])->name('showMockup');
    Route::get('Sku', [toolController::class, 'Sku'])->name('Sku');
    // Route::get('Dashboard', [HomeController::class, 'Dashboard'])->name('Dashboard');
    Route::get('findPNG', [finePngController::class, 'findPNG'])->name('findPNG');

});
Route::get('detailAccountHistory/{id}', [AccountHistoryController::class, 'detailAccountHistory'])->middleware('auth')->name('detailAccountHistory');
Route::get('RechargeHistory', [HomeController::class, 'RechargeHistory'])->name('RechargeHistory');
Route::post('postcheckout/{id}', [HomeController::class, 'postcheckout'])->middleware('auth')->name('postcheckout');
Route::post('RechargeHistory', [RechargeHistoryController::class, 'RechargeHistory'])->name('RechargeHistory');

//============Auth==========//

Route::prefix('auth')->group(function () {
    //login
    Route::get('login', [logincontroller::class, 'index'])->name('login');

    Route::post('login', [logincontroller::class, 'login'])->name('auth.login');

    Route::get('logout', [logincontroller::class, 'logout'])->name('logout');

    //register

    Route::get('regiter', [regiterController::class, 'index'])->name('regiter');

    Route::post('postList', [regiterController::class, 'postList'])->name('postregiter');
    //mail
    Route::get('/senmail/{remember_token}', [cfController::class, 'update'])->name('senmail');

    Route::get('alert', [cfController::class, 'alert'])->name('alert');

    Route::get('/email', [resetpassController::class, 'forgotpass'])->name('forgotpass');

    Route::post('/chekcmail', [resetpassController::class, 'checkmail'])->name('checkmail');

    Route::get('/sendMailChangepass/{email}', [resetpassController::class, 'sendMailChangepass'])->name('sendMailChangepass');

    Route::post('/changePasss/{email}', [resetpassController::class, 'changePass'])->name('changePass');

    //doccument Controller
    Route::get('showDoc', [docController::class, 'showDoc'])->name('showDoc');

    Route::get('detailDoc/{id}', [docController::class, 'detailDoc'])->name('detailDoc');

    Route::get('addlDoc', [docController::class, 'addlDoc'])->name('addlDoc');

    Route::get('deleteDoc/{id}', [docController::class, 'deleteDoc'])->name('deleteDoc');

    Route::get('editDoc/{id}', [docController::class, 'editDoc'])->name('editDoc');

    Route::post('storeAdd', [docController::class, 'storeAdd'])->name('storeAdd');

    Route::post('documentAddUser/{id}', [docController::class, 'documentAddUser'])->name('documentAddUser');

    Route::get('accset/{id}', [docController::class, 'accset'])->middleware('checkAdmin')->name('accset');

});
//middleware('checkAdmin')->
//============ ADMIN  ====================//
Route::middleware('checkAdmin')->prefix('admin')->group(function () {
    //=======dasboa=========//
    //show dasboa
    Route::get('showdasboa', [dasboaController::class, 'showdasboa'])->name('showdasboa');
    // phana cua adminHomeController
    Route::get('AadminHome', [adminHomeController::class, 'home'])->name('AadminHome');
    Route::get('showIdea', [adminHomeController::class, 'showIdea'])->name('showIdea');
    Route::get('showPNG', [adminHomeController::class, 'showPNG'])->name('showPNG');
    // chi tiêt hóa dơn user
    Route::get('DetailMember/{id}', [dasboaController::class, 'DetailMember'])->name('DetailMember');

    // show php idea
    Route::get('totalidea', [totalController::class, 'totalidea'])->name('totalidea');
    Route::get('totalDesigner', [totalController::class, 'totalDesigner'])->name('totalDesigner');
    Route::get('totalall', [totalController::class, 'totalall'])->name('totalall');

    //show user
    Route::get('showUser', [UserController::class, 'showUser'])->name('showUser');
    // edit user
    Route::get('editList/user/{id}', [UserController::class, 'editList'])->name('editUser');
    Route::post('update/show/{id}', [UserController::class, 'updatesuser'])->name('updatesuser');
    // add user
    Route::get('addList/user', [UserController::class, 'addList'])->name('addUser');
    Route::post('postList/user', [UserController::class, 'postList'])->name('postList');
    // delete user
    Route::get('/deleteUser/{id}', [UserController::class, 'delete'])->name('deleteUser');
    // show trackuser
    Route::get('trackuser', [UserController::class, 'trackuser'])->name('trackuser');
    //show activeruser
    Route::get('activeruser', [UserController::class, 'activeruser'])->name('activeruser');
    // khoi phuc thung rac
    Route::get('/restoreUser/{id}', [UserController::class, 'restoreUser'])->name('restoreUser');
    // action tổng hợp trong uer
    Route::get('action', [UserController::class, 'action'])->name('action');

    Route::get('findUser', [UserController::class, 'findUser'])->name('findUser');

    Route::get('DetailDesigner/{id}', [DetailController::class, 'DetailDesigner'])->name('DetailDesigner');
    Route::get('DetailIdea/{id}', [DetailController::class, 'DetailIdea'])->name('DetailIdea');

    //=========khoi categoru============//
    //show list ctegori
    Route::get('categoriesList', [typeProductController::class, 'categoriesList'])->name('categoriesList');
    //show index add
    Route::get('addCategory', [typeProductController::class, 'addCategory'])->name('addCategory');
    // show add post
    Route::post('postCategory', [typeProductController::class, 'postCategory'])->name('postCategory');
    // show index update
    Route::get('updatetemplateCategory/{id}', [typeProductController::class, 'updatetemplateCategory'])->name('updatetemplateCategory');
    Route::post('updateCategory/{id}', [typeProductController::class, 'updateCategory'])->name('updateCategory');
    // delete categori
    Route::get('deleteCategory/{id}', [typeProductController::class, 'deleteCategory'])->name('deleteCategory');
    // show trackuser
    Route::get('trackCategory', [typeProductController::class, 'trackCategory'])->name('trackCategory');
    //show activeruser
    Route::get('activerCategory', [typeProductController::class, 'activerCategory'])->name('activerCategory');
    // khoi phuc thung rac
    Route::get('restoreCategory/{id}', [typeProductController::class, 'restoreCategory'])->name('restoreCategory');
    // thực hiện tác vụ
    Route::get('categoryaction', [typeProductController::class, 'action'])->name('categoryaction');

    Route::get('categoriesDetail/{id}', [typeProductController::class, 'categoriesDetail'])->name('categoriesDetail');

    //=====khoi product===========//
    //show index add
    // show add post
    // show index update
    // delete categori
    // show trackuser
    //show activeruser
    // khoi phuc thung rac
    // thực hiện tac vụ
    Route::get('productaction', [productController::class, 'action'])->name('productaction');

    Route::post('jobPublic', [craterJobController::class, 'jobPublic'])->name('jobPublic');

    // create job public
    Route::post('jobPrivate', [craterJobController::class, 'jobPrivate'])->name('jobPrivate');
    // create jobPrivate
    // create job public
    Route::get('deletejob/{id}', [craterJobController::class, 'deletejob'])->name('deletejob');
    // create job public
    Route::get('updateJob/{id}', [craterJobController::class, 'updateJob'])->name('updateJob');

});

//=========khôi client===========//
//===========Home=================//
Route::prefix('client')->group(function () {

    //show home

    //show product_type
    Route::get('product_type/{id_type}', [HomeController::class, 'product_type'])->name('product_type');
    //show product
    Route::get('product/{id}', [HomeController::class, 'product'])->name('product');
    //show contact
    Route::get('contact', [HomeController::class, 'contact'])->name('contact');
    //show about
    Route::get('about', [HomeController::class, 'about'])->name('about');
    //show shopping
    Route::get('shopping/{id}', [HomeController::class, 'shopping'])->middleware('auth')->name('shopping');
    //show addcart
    Route::get('deletecart/{rowID}', [HomeController::class, 'deletecart'])->name('deletecart');
    //show checkout
    Route::get('checkout', [HomeController::class, 'checkout'])->name('checkout');
    //show checkout
    // Route::post('postcheckout',[HomeController::class,'postcheckout'])->name('postcheckout');

});
