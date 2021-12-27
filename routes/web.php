<?php

use App\Http\Controllers\ZKHController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
    return redirect('/zkh');
});
Route::get('zkh/excel', [ZKHController::class, 'excel'])->name('zkh.excel');
Route::get('zkh/pdf/{id}', [ZKHController::class, 'pdf'])->name('zkh.pdf');
Route::resource('zkh', ZKHController::class);
// Route::get('/', [ZKHController::class ,'index']);
/**
 * Проверка подключения к бд
 */
// Route::get('bd', function () {
//     if (DB::connection()->getDatabaseName())  {
//         dd('Есть контакт!');
//       } else {
//         return 'Соединения нет';}
// });
