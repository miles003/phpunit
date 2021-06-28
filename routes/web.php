<?php
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Post;
use App\Http\Controllers\PostController;
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
  	return redirect('/login');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
	$data = Post::latest()->get();
	return inertia('Dashboard',['data' => $data]);
})->name('dashboard');
Route::resource('posts', PostController::class);
