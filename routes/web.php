<?php

use App\AI\Chat;
use Illuminate\Support\Facades\Route;

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

    //    $chat = new \App\AI\Chat();
    //    $response = $chat->send('Tell me a joke!');

    return view('roast');
});

Route::post('/roast', function () {
    $validated = request()->validate([
        'topic' => [
            'required', 'string', 'min:2', 'max:50',
        ],
    ]);

    $chat = new Chat();
    $mp3 = $chat->send(
        message: "Please roast {$validated['topic']} in a sarcastic tone.",
        speech: true
    );

    $filename = '/roasts/'.md5($mp3).'.mp3';
    if (! file_exists(public_path('roasts'))) {
        mkdir(public_path('roasts'));
    }
    file_put_contents(public_path($filename), $mp3);

    return redirect('/')->with([
        'file' => $filename,
        'flash' => 'Boom! Roasted!',
    ]);

})->name('roast');
