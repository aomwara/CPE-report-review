<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GroupsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;

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
    return view('landing.index');
});


// Route::middleware(['auth:sanctum', 'verified'])->get('/admin/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::group(['auth:sanctum', 'verified'], function(){
    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::post('/admin/dashboard', [HomeController::class, 'sendRequest'])->name('dashboard');
    Route::get('/admin/myrequest', [GroupsController::class, 'myRequest'])->name('myrequest');
    Route::get('/admin/request/{id}', [GroupsController::class, 'viewRequest'])->name('myrequest1');
    //API register group
    Route::post('/api/register/group', [GroupsController::class, 'registerGroup']);

    Route::get('/admin/requestfile/{filename}', function($path){
        $fileName = storage_path()."/app/uploads/req-report/$path";
        if (File::exists($fileName)){
            return Response::file($fileName);
        }
        return abort(404);
    });

    Route::get('/admin/reviewfile/{filename}', function($path){
        $fileName = storage_path()."/app/uploads/rev-report/$path";
        if (File::exists($fileName)){
            return Response::file($fileName);
        }
        return abort(404);
    });


    Route::get('/admin/review/{id}', [GroupsController::class, 'review'])->name('review');
    Route::post('/admin/review/{id}', [GroupsController::class, 'reviewSave'])->name('review-post');
    Route::get('/admin/history-review/{id}', [GroupsController::class, 'hisReview'])->name('review');

});
