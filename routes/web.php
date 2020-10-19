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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('companies', 'CompanyController');
Route::resource('employees', 'EmployeeController');
Route::resource('reminders', 'ReminderController');

Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from REminder',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('jayanisagar@gmail.com')->send(new \App\Mail\MyTestMail($details));
   
    dd("Email is Sent.");
});

Route::get('date', function () {
   
    $mytime = Carbon\Carbon::now();
    echo $mytime->toDateTimeString();

    $pieces = explode(" ", $mytime);

    echo " ", $pieces[0];

    $pieces[1] = "13:25:00";
    $reminders = \App\Reminder::where([
        ['date', '=', $pieces[0]],
        ['time', '=', $pieces[1]]
        ])->get();
    echo " ", $reminders;

    foreach ($reminders as $reminder) {
        \Mail::to($reminder->email)->send(new \App\Mail\ReminderMail($reminder));
    }

    dd("Reminder is Sent.");
});

