<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\AdminUserController;
Use App\Http\Controllers\Admin\AboutController;
Use App\Http\Controllers\Admin\CommonpageController;
Use App\Http\Controllers\Admin\HomeController;
Use App\Http\Controllers\Admin\ServiceController;
Use App\Http\Controllers\Admin\PriceController;
Use App\Http\Controllers\Admin\NatureController;
Use App\Http\Controllers\Admin\TravelController;
Use App\Http\Controllers\Admin\AnimalController;
Use App\Http\Controllers\Admin\SportController;
Use App\Http\Controllers\Admin\ArchitectureController;
Use App\Http\Controllers\Admin\PeopleController;
Use App\Http\Controllers\Admin\OthersController;
Use App\Http\Controllers\Admin\ContactController;
Use App\Http\Controllers\Admin\Client_ReviewController;



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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([ 'auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
Route::get('/dashboard', function () { return view('admin.index'); })->name('dashboard');});

Route::get('/logout',[AdminUserController::class,"AdminLogout"])->name('admin.logout');

Route::prefix('admin')->group(function(){

       Route::get('/user/profile',[AdminUserController::class, 'UserProfile'])->name('user.profile');
       Route::get('/user/profile/edit',[AdminUserController::class, 'UserProfileEdit'])->name('user.profile.edit');
       Route::post('/user/profile/store',[AdminUserController::class, 'UserProfileStore'])->name('user.profile.store');
       Route::get('/change/password',[AdminUserController::class, 'UserChangePassword'])->name('change.password');
       Route::post('/change/password/update',[AdminUserController::class, 'UserPasswordUpdate'])->name('change.password.update');
});

Route::prefix('About')->group(function(){

    Route::get('/list/about',[AboutController::class, 'AllAbout'])->name('list.about');
    Route::get('/add/about',[AboutController::class, 'AddAbout'])->name('add.about');
    Route::post('/store',[AboutController::class, 'StoreAbout'])->name('about.store');
    Route::get('/edit/{id}',[AboutController::class, 'EditAbout'])->name('edit.about');
    Route::post('/update/{id}',[AboutController::class, 'UpdateAbout'])->name('update.about');
    Route::get('/delete/{id}',[AboutController::class, 'DeleteAbout'])->name('delete.about');
});


Route::prefix('Commonpage')->group(function(){
    Route::get('/list/commonpage',[CommonpageController::class, 'AllCommonpage'])->name('list.commonpage');
    Route::get('/add/commonpage',[CommonpageController::class, 'AddCommonpage'])->name('add.commonpage');
    Route::post('/store',[CommonpageController::class, 'StoreCommonpage'])->name('store.commonpage');
    Route::get('/edit/{id}',[CommonpageController::class, 'EditCommonpage'])->name('edit.commonpage');
    Route::post('/update/{id}',[CommonpageController::class, 'UpdateCommonpage'])->name('update.commonpage');
    Route::get('/delete/{id}',[CommonpageController::class, 'DeleteCommonpage'])->name('delete.commonpage');
});

Route::prefix('Home')->group(function(){
    Route::get('/list/home',[HomeController::class, 'AllHome'])->name('list.home');
    Route::get('/add/home',[HomeController::class, 'AddHome'])->name('add.home');
    Route::post('/store',[HomeController::class, 'StoreHome'])->name('store.home');
    Route::get('/edit/{id}',[HomeController::class, 'EditHome'])->name('edit.home');
    Route::post('/update/{id}',[HomeController::class, 'UpdateHome'])->name('update.home');
    Route::get('/delete/{id}',[HomeController::class, 'DeleteHome'])->name('delete.home');
});

Route::prefix('services')->group(function(){
    Route::get('list',[ServiceController::class,'AllService'])->name('list.service');
    Route::get('add',[ServiceController::class,'AddService'])->name('add.service');
    Route::post('store',[ServiceController::class,'StoreService'])->name('store.service');
    Route::get('edit/{id}',[ServiceController::class,'EditService'])->name('edit.service');
    Route::post('update/{id}',[ServiceController::class,'UpdateService'])->name('update.service');
    Route::get('delete/{id}',[ServiceController::class,'DeleteService'])->name('delete.service');
});

Route::prefix('Price')->group(function(){
    Route::get('/list/price',[PriceController::class, 'AllPrice'])->name('list.price');
    Route::get('/add/price',[PriceController::class, 'AddPrice'])->name('add.price');
    Route::post('/store',[PriceController::class, 'StorePrice'])->name('store.price');
    Route::get('/edit/{id}',[PriceController::class, 'EditPrice'])->name('edit.price');
    Route::post('/update/{id}',[PriceController::class, 'UpdatePrice'])->name('update.price');
    Route::get('/delete/{id}',[PriceController::class, 'DeletePrice'])->name('delete.price');
});

Route::prefix('Nature')->group(function(){
    Route::get('/list/nature',[NatureController::class, 'AllNature'])->name('list.nature');
    Route::get('/add/nature',[NatureController::class, 'AddNature'])->name('add.nature');
    Route::post('/store',[NatureController::class, 'StoreNature'])->name('nature.store');
    Route::get('/edit/{id}',[NatureController::class, 'EditNature'])->name('edit.nature');
    Route::post('/update/{id}',[NatureController::class, 'UpdateNature'])->name('update.nature');
    Route::get('/delete/{id}',[NatureController::class, 'DeleteNature'])->name('delete.nature');
});

Route::prefix('Travel')->group(function(){
    Route::get('/list/travel',[TravelController::class, 'AllTravel'])->name('list.travel');
    Route::get('/add/travel',[TravelController::class, 'AddTravel'])->name('add.travel');
    Route::post('/store',[TravelController::class, 'StoreTravel'])->name('travel.store');
    Route::get('/edit/{id}',[TravelController::class, 'EditTravel'])->name('edit.travel');
    Route::post('/update/{id}',[TravelController::class, 'UpdateTravel'])->name('update.travel');
    Route::get('/delete/{id}',[TravelController::class, 'DeleteTravel'])->name('delete.travel');
});

Route::prefix('Animal')->group(function(){
    Route::get('/list/animal',[AnimalController::class, 'Allanimal'])->name('list.animal');
    Route::get('/add/animal',[AnimalController::class, 'Addanimal'])->name('add.animal');
    Route::post('/store',[AnimalController::class, 'Storeanimal'])->name('animal.store');
    Route::get('/edit/{id}',[animalController::class, 'Editanimal'])->name('edit.animal');
    Route::post('/update/{id}',[animalController::class, 'Updateanimal'])->name('update.animal');
    Route::get('/delete/{id}',[animalController::class, 'Deleteanimal'])->name('delete.animal');
   
});

Route::prefix('Sport')->group(function(){
    Route::get('/list/sport',[SportController::class, 'AllSport'])->name('list.sport');
    Route::get('/add/sport',[SportController::class, 'AddSport'])->name('add.sport');
    Route::post('/store',[SportController::class, 'StoreSport'])->name('sport.store');
    Route::get('/edit/{id}',[SportController::class, 'EditSport'])->name('edit.sport');
    Route::post('/update/{id}',[SportController::class, 'UpdateSport'])->name('update.sport');
    Route::get('/delete/{id}',[SportController::class, 'DeleteSport'])->name('delete.sport');
});

Route::prefix('Architecture')->group(function(){
    Route::get('/list/architecture',[ArchitectureController::class, 'AllArchitecture'])->name('list.architecture');
    Route::get('/add/architecture',[ArchitectureController::class, 'AddArchitecture'])->name('add.architecture');
    Route::post('/store',[ArchitectureController::class, 'StoreArchitecture'])->name('store.architecture');
    Route::get('/edit/{id}',[ArchitectureController::class, 'EditArchitecture'])->name('edit.architecture');
    Route::post('/update/{id}',[ArchitectureController::class, 'UpdateArchitecture'])->name('update.architecture');
    Route::get('/delete/{id}',[ArchitectureController::class, 'DeleteArchitecture'])->name('delete.architecture');
});

Route::prefix('People')->group(function(){
    Route::get('/list/people',[PeopleController::class, 'AllPeople'])->name('list.people');
    Route::get('/add/people',[PeopleController::class, 'AddPeople'])->name('add.people');
    Route::post('/store',[PeopleController::class, 'StorePeople'])->name('store.people');
    Route::get('/edit/{id}',[PeopleController::class, 'EditPeople'])->name('edit.people');
    Route::post('/update/{id}',[PeopleController::class, 'UpdatePeople'])->name('update.people');
    Route::get('/delete/{id}',[PeopleController::class, 'DeletePeople'])->name('delete.people');
});

Route::prefix('Others')->group(function(){
    Route::get('/list/others',[OthersController::class, 'AllOthers'])->name('list.others');
    Route::get('/add/others',[OthersController::class, 'AddOthers'])->name('add.others');
    Route::post('/store',[OthersController::class, 'StoreOthers'])->name('store.others');
    Route::get('/edit/{id}',[OthersController::class, 'EditOthers'])->name('edit.others');
    Route::post('/update/{id}',[OthersController::class, 'UpdateOthers'])->name('update.others');
    Route::get('/delete/{id}',[OthersController::class, 'DeleteOthers'])->name('delete.others');
});

Route::prefix('ClientReview')->group(function(){
    Route::get('/list/clientreview',[Client_ReviewController::class, 'AllClientReview'])->name('list.review');
    Route::get('/add/clientreview',[Client_ReviewController::class, 'AddClientReview'])->name('add.review');
    Route::post('/store',[Client_ReviewController::class, 'StoreClientReview'])->name('review.store');
    Route::get('/edit/{id}',[Client_ReviewController::class, 'EditClientReview'])->name('edit.review');
    Route::post('/update/{id}',[Client_ReviewController::class, 'UpdateClientReview'])->name('update.review');
    Route::get('/delete/{id}',[Client_ReviewController::class, 'DeleteClientReview'])->name('delete.review');
});

Route::prefix('Contact')->group(function(){
    Route::get('/list/contact',[ContactController::class, 'AllContact'])->name('list.contact');
    Route::get('/delete/{id}',[ContactController::class, 'DeleteContact'])->name('delete.contact');

});





