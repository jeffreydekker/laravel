<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //      return a blade file as a page:
    // return view('welcome');

    // running raw SQL queries syntax:
    // first, fetch all users:
    // $users = DB::select("select * from users");

    // create new user:
    // $users = DB::insert('insert into users (username, email, password) values (?, ?, ?)', [
    //     'John',
    //     'john@doe.com',
    //     'johndoe'
    // ]);

    // edit values in a table:
    // $users = DB::update("update users set email='abc@alphabet.com' where id=2");

    // delete a user:
    // $users = DB::delete("delete from users where id=2");


    // official database documentation: https://laravel.com/docs/10.x/database#running-an-insert-statement 
    // dd($users);

    //      using the query builder syntax:
    // first, fetch all users:
    // $users = DB::table('users')->get();

    // create new user:
    // $users = DB::table('users')->insert([
    //     'username' => 'john',
    //     'email' => 'johndoe@abc.com',
    //     'password' => 'password'
    // ]);

    // edit values in a table:
    // $users = DB::table('users')
    // ->where('id', 3)
    // ->update(['email' => 'random@email.com']);

    // delete a user:
    // $user = DB::table('users')
    // ->where('id', 3)
    // ->delete();


    // official database documentation: https://laravel.com/docs/10.x/database#running-an-insert-statement 
    // dd($users);

    //      some powerful query builder tools: 
    //      find, pluck, chunk, 
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
