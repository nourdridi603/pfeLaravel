<?php

use TCG\Voyager\Models\Role;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProduitController;

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
/*Route::get('/', function () {
    return Inertia\Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
*/

Route::get('/send-email', [MailController::class, 'sendEmail']);

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/add-produit', [ProduitController::class, 'addProduit']);

Route::post('/add-produit', [ProduitController::class, 'storeProduit'])->name('produit.store');

Route::get('/produits', [ProduitController::class, 'produits']);



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::middleware('auth:sanctum', 'verified')->get('/chat', function () {
    return Inertia\Inertia::render('Chat/container');
})->name('chat');



Route::middleware('auth:sanctum')->get('/chat/rooms', [ChatController::class, 'rooms']);
Route::middleware('auth:sanctum')->get('/chat/room/{roomId}/messages', [ChatController::class, 'messages']);
Route::middleware('auth:sanctum')->post('/chat/room/{roomId}/message', [ChatController::class, 'newMessage']);
