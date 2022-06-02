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

    // Route::get('/admin/groups/{id}', [GroupsController::class, 'index'])->name('groups_edit');
    // Route::get('/admin/groups/{id}/links', [GroupsController::class, 'groupsLinks'])->name('groups_links');

    // Route::get('/admin/links', [LinksController::class, 'index'])->name('links');
    // Route::get('/admin/users', [UsersController::class, 'index'])->name('users');

    // Route::get('/admin/links/{label}', [LinksController::class, 'show']);

    // //API Groups
    // Route::get('/api/groups/{id}', [GroupsController::class, 'groupDetails']);
    // Route::post('/api/groups/edit', [GroupsController::class, 'editGroup']);
    // Route::delete('/api/groups/delete', [GroupsController::class, 'deleteGroup']);
    // //API Links
    // Route::get('/api/links/{label}', [LinksController::class, 'linkDetails']);
    // Route::post('/api/links/edit', [LinksController::class, 'editLink']);
    // Route::delete('/api/links/delete', [LinksController::class, 'deleteLink']);
    // //API Users
    // Route::post('/api/users/create', [UsersController::class, 'createUser']);
    // Route::get('/api/users/{id}', [UsersController::class, 'userDetails']);
    // Route::post('/api/users/edit', [UsersController::class, 'editUser']);
    // Route::delete('/api/users/delete', [UsersController::class, 'deleteUser']);

    //API register group
    Route::post('/api/register/group', [GroupsController::class, 'registerGroup']);
});
