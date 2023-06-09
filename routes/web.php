<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\controlllers\EnderecoController;
use App\Http\controlllers\MailingController;
use App\Http\controlllers\FormularioController;


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



                                            /*     Route - MR_Sistema    */

Route::any('/', [App\Http\Controllers\UserController::class, 'index'])->name('home.login');
Route::any('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');                    
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home.login'); // Redirecionar para a página inicial após o logout
})->name('logout');

Route::middleware(['auth'])->group(function () {

Route::get('/home', [App\Http\Controllers\UserController::class, 'home'])->name('home.page');
Route::get('/user', [App\Http\Controllers\UserController::class, 'user'])->name('user');
                                            /*   Route - Users    */
Route::any('/side' ,[App\Http\Controllers\UserController::class, 'side'])->name('side');
Route::post('/create', [App\Http\Controllers\UserController::class, 'create'])->name('create');
Route::get('/user/index', [App\Http\Controllers\UserController::class, 'indexuser'])->name('user.index');
Route::any('/user/search', [App\Http\Controllers\UserController::class, 'searchuser'])->name('user.search');
Route::get('/user/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroyuser'])->name('user.destroy');
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edituser'])->name('user.edit');
Route::put('/user/update/{id}', [App\Http\Controllers\UserController::class, 'updateuser'])->name('user.update');
                                            /*     Route - INPUT      */

Route::any('/input/index', [App\Http\Controllers\InputController::class, 'index'])->name('input.index');
Route::any('/input/search', [App\Http\Controllers\InputController::class, 'search'])->name('input.search');
Route::get('/input/create', [App\Http\Controllers\InputController::class, 'create'])->name('input.create');
Route::any('/input/store', [App\Http\Controllers\InputController::class, 'store'])->name('input.store');
Route::delete('/input/destroy/{id}', [App\Http\Controllers\InputController::class, 'destroy'])->name('input.destroy');
Route::get('/input/edit/{id}', [App\Http\Controllers\InputController::class, 'edit'])->name('input.edit');
Route::put('/input/update/{id}', [App\Http\Controllers\InputController::class, 'update'])->name('input.update');
Route::post('/input/edit/notas', [App\Http\Controllers\InputController::class, 'nota'])->name('input.nota');
Route::get('/input/chat', [App\Http\Controllers\InputController::class, 'getChatData'])->name('input.getChatData');
Route::get('/input/export', [App\Http\Controllers\InputController::class, 'InputsExport'])->name('input.excel');

Route::get('/tv', [App\Http\Controllers\ProductController::class, 'showtv'])->name('tv');
Route::post('/tv/create', [App\Http\Controllers\ProductController::class, 'createtv'])->name('tv.create');
Route::get('/tv/index', [App\Http\Controllers\ProductController::class, 'indextv'])->name('tv.index');
Route::any('/tv/search', [App\Http\Controllers\ProductController::class, 'searchtv'])->name('tv.search');
Route::delete('/tv/destroy/{id}', [App\Http\Controllers\ProductController::class, 'destroytv'])->name('tv.destroy');
Route::get('/tv/edit/{id}', [App\Http\Controllers\ProductController::class, 'edittv'])->name('tv.edit');
Route::put('/tv/update/{id}', [App\Http\Controllers\ProductController::class, 'updatetv'])->name('tv.update');

Route::get('/net', [App\Http\Controllers\ProductController::class, 'shownet'])->name('net');
Route::post('/net/create', [App\Http\Controllers\ProductController::class, 'createnet'])->name('net.create');
Route::get('/net/index', [App\Http\Controllers\ProductController::class, 'indexnet'])->name('net.index');
Route::any('/net/search', [App\Http\Controllers\ProductController::class, 'searchnet'])->name('net.search');
Route::delete('/net/destroy/{id}', [App\Http\Controllers\ProductController::class, 'destroynet'])->name('net.destroy');
Route::get('/net/edit/{id}', [App\Http\Controllers\ProductController::class, 'editnet'])->name('net.edit');
Route::put('/net/update/{id}', [App\Http\Controllers\ProductController::class, 'updatenet'])->name('net.update');

Route::get('/fixo', [App\Http\Controllers\ProductController::class, 'showfixo'])->name('fixo');
Route::post('/fixo/create', [App\Http\Controllers\ProductController::class, 'createfixo'])->name('fixo.create');
Route::get('/fixo/index', [App\Http\Controllers\ProductController::class, 'indexfixo'])->name('fixo.index');
Route::any('/fixo/search', [App\Http\Controllers\ProductController::class, 'searchfixo'])->name('fixo.search');
Route::delete('/fixo/destroy/{id}', [App\Http\Controllers\ProductController::class, 'destroyfixo'])->name('fixo.destroy');
Route::get('/fixo/edit/{id}', [App\Http\Controllers\ProductController::class, 'editfixo'])->name('fixo.edit');
Route::put('/fixo/update/{id}', [App\Http\Controllers\ProductController::class, 'updatefixo'])->name('fixo.update');

Route::get('/cell', [App\Http\Controllers\ProductController::class, 'showcell'])->name('cell');
Route::post('/cell/create', [App\Http\Controllers\ProductController::class, 'createcell'])->name('cell.create');
Route::get('/cell/index', [App\Http\Controllers\ProductController::class, 'indexcell'])->name('cell.index');
Route::any('/cell/search', [App\Http\Controllers\ProductController::class, 'searchcell'])->name('cell.search');
Route::delete('/cell/destroy/{id}', [App\Http\Controllers\ProductController::class, 'destroycell'])->name('cell.destroy');
Route::get('/cell/edit/{id}', [App\Http\Controllers\ProductController::class, 'editcell'])->name('cell.edit');
Route::put('/cell/update/{id}', [App\Http\Controllers\ProductController::class, 'updatecell'])->name('cell.update');

});


