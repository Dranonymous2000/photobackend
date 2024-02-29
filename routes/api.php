<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\Admin\AboutController;
Use App\Http\Controllers\Admin\HomeController;
Use App\Http\Controllers\Admin\Client_ReviewController;
Use App\Http\Controllers\Admin\CommonPageController;
Use App\Http\Controllers\Admin\ContactController;
Use App\Http\Controllers\Admin\PriceController;
Use App\Http\Controllers\Admin\ServiceController;
Use App\Http\Controllers\Admin\NatureController;
Use App\Http\Controllers\Admin\SportController;
Use App\Http\Controllers\Admin\AnimalController;
Use App\Http\Controllers\Admin\PeopleController;
Use App\Http\Controllers\Admin\ArchitectureController;
Use App\Http\Controllers\Admin\OthersController;
Use App\Http\Controllers\Admin\TravelController;



Route::get('/about', [AboutController::class, 'SelectAllAbout']);
Route::get('/aboutcontact',[AboutController::class, 'SelectContact']);

Route::get("/home", [HomeController::class, "SelectAllHome"]);
Route::get("/client_review",[Client_ReviewController::class, "SelectAllClientReview"]);
Route::get("/commonpage",[CommonPageController::class, "SelectAllCommonPage"]);

Route::post("/contact",[ContactController::class, "AddContact"]);

Route::get('/price', [PriceController::class, 'SelectPrice']);
Route::get("/prices",[PriceController::class, "SelectSix"]);
Route::get('/service',[ServiceController::class, 'SelectAllService']);

Route::get('/nature',[NatureController::class, 'SelectAllNature']);
Route::get("/naturepicture",[NatureController::class, "SelectNaturePicture"]);
Route::get('/naturedetails/{natureId}',[NatureController::class, 'onSelectDetails']);
Route::get('/naturehome',[NatureController::class, 'SelectThreeImage']);

Route::get('/sport',[SportController::class, 'SelectAllSport']);
Route::get('/sportdetails/{sportId}',[SportController::class, 'onSelectDetails']);
Route::get('/sporthome',[SportController::class, 'SelectThreeImage']);

Route::get('/animal',[AnimalController::class, 'SelectAllAnimal']);
Route::get('/animaldetails/{animalId}',[AnimalController::class, 'onSelectDetails']);
Route::get('/animalhome',[AnimalController::class, 'SelectThreeImage']);

Route::get('/people',[PeopleController::class, 'SelectAllPeople']);
Route::get('/peopledetails/{peopleId}',[PeopleController::class, 'onSelectDetails']);
Route::get('/peoplehome',[PeopleController::class, 'SelectThreeImage']);


Route::get('/architecture',[ArchitectureController::class, 'SelectAllArchitecture']);
Route::get('/architecturedetails/{architectureId}',[ArchitectureController::class, 'onSelectDetails']);
Route::get('/architecturehome',[ArchitectureController::class, 'SelectThreeImage']);


Route::get('/others',[OthersController::class, 'SelectAllOthers']);
Route::get('/othersdetails/{othersId}',[OthersController::class, 'onSelectDetails']);
Route::get('/othershome',[OthersController::class, 'SelectThreeImage']);


Route::get('/travel',[TravelController::class, 'SelectAllTravel']);
Route::get('/traveldetails/{travelId}',[TravelController::class, 'onSelectDetails']);
Route::get('/travelhome',[TravelController::class, 'SelectThreeImage']);