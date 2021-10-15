<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ComboController;
use App\Models\Product;
use App\Models\Combo;
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
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return redirect()->route('register');
        // return view('welcome');

    }
});

Route::get('/dashboard', function () {
    $products = Product::paginate(5);
    $combos = Combo::paginate(5);

    $data['css'] = 'css/dashboard.css';
    $data['js'] = 'js/dashboard.js';
    $data['products'] = $products;
    $data['combos'] = $combos;

    return view('dashboard', $data);
})->middleware(['auth'])->name('dashboard');

Route::resource('products', ProductController::class);
Route::resource('combos', ComboController::class);

require __DIR__.'/auth.php';
