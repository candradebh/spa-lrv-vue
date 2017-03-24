<?php

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
    return view('Website::index');
});


//Roote da aplicação vuejs
/*Route::prefix('home')->group(function (){

    Route::get('/', function () {
        return view('app');
    });

});*/

Route::get('/debug',function (){
    dd(app());
    $guard = Auth::guard('api');
    dd($guard);

});

Route::get('/dev','Dev\DocController@index');


Route::get('/messages', function () {
    return App\Models\Site\Chat\SiteMessage::with('visitor')->get();
})->middleware('auth');

Route::post('/messages', function () {
    // Store the new message
    $user = Auth::user();

    $message = $user->messages()->create([
        'message' => request()->get('message')
    ]);

    // Announce that a new message has been posted
    broadcast(new MessagePosted($message, $user))->toOthers();

    return ['status' => 'OK'];
})->middleware('auth');


/*Auth::routes();

Route::get('/home', 'HomeController@index');*/
