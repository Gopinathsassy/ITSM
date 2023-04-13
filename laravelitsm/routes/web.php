<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\profileController;
use App\Http\Controllers\Consultant\ConsultantController;
use App\Http\Controllers\projectController;
use App\Http\Controllers\TicketController;

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

//Route::group(['middleware'=> ['auth']],function (){
//    Route::get('/dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard');
//});
//
//Route::get('/home', function () {
//    return view('home');
//});



//Route::get('/ticket', function () {
//    return view('ticket.ticket');
//});


Auth::routes();

Route::prefix('user')->name('user.')->group(function () {

    Route::middleware(['guest:web', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'dashboard.user.login')->name('login');
        Route::post('/check', [UserController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:web'])->group(function () {
        Route::get('/ticket/download/{ticket}/{filename}', 'App\Http\Controllers\TicketController@getFile')->name('getfile');
        Route::get('/ticket/getuploadedfiles/{ticket}', 'App\Http\Controllers\TicketController@uploadedFile')->name('uploadedfile');
    });
});

Route::prefix('consultant')->name('consultant.')->group(function () {

    Route::middleware(['guest:web', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'dashboard.user.login')->name('login');
        Route::post('/check', [UserController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:web'])->group(function () {
        Route::get('/ticket/download/{ticket}/{filename}', 'App\Http\Controllers\Consultant\TicketController@getFile')->name('getfile');
        Route::get('/ticket/getuploadedfiles/{ticket}', 'App\Http\Controllers\Consultant\TicketController@uploadedFile')->name('uploadedfile');
    });
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function (){

    Route::middleware(['guest:web','PreventBackHistory'])->group(function (){
            Route::view('/login','dashboard.user.login')->name('login');
            Route::post('/check',[UserController::class,'check'])->name('check');
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function (){

            Route::get('/home','App\Http\Controllers\HomeController@index')->name('home');

            Route::get('/ticket','App\Http\Controllers\TicketController@index')->name('ticket');

            Route::post('/ticket/create','App\Http\Controllers\TicketController@store')->name('ticket.store');

            Route::post('/ticket/{ticket}','App\Http\Controllers\TicketController@update')->name('ticket.update');

            Route::post('/cancel/{ticket}','App\Http\Controllers\TicketController@cancel')->name('ticket.cancel');

            Route::get('/ticket/create','App\Http\Controllers\TicketController@create')->name('ticket.create');

            Route::get('/ticket/{ticket}','App\Http\Controllers\TicketController@show')->name('ticket.show');

      		Route::post('/ticket/dropzone/store/{ticket}', ['as'=>'dropzone.store','uses'=>'App\Http\Controllers\TicketController@fileupload']);

            Route::delete('/ticket/delete/{ticket}','App\Http\Controllers\TicketController@delete')->name('ticket.delete');

            Route::post('/ticket/completed/{ticket}','App\Http\Controllers\TicketController@edit')->name('ticket.edit');

            Route::get('/ticket/message/{ticket}','App\Http\Controllers\TicketController@getMessage')->name('ticket.message');

            Route::post('/ticket/message/{ticket}','App\Http\Controllers\TicketController@sendMessage');

        Route::get('/ticket/module/{module}','App\Http\Controllers\TicketController@getModule')->name('ticket.module');
              Route::get('/report','App\Http\Controllers\TicketController@report')->name('report');


            Route::post('/logout',[UserController::class,'logout'])->name('logout');
    });
});

Route::prefix('admin')->name('admin.')->group(function (){

    Route::middleware(['guest:admin','PreventBackHistory'])->group(function (){
        Route::view('/login','dashboard.admin.login')->name('login');
        Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function (){
        Route::view('/home','dashboard.admin.home')->name('home');

        /* Route for display user, project, consultants */
        Route::get('/display_projects',[projectController::class,'index1'])->name('display_projects');
        Route::get('/display_users',[UserController::class,'index'])->name('display_users');
        Route::get('/display_consultants',[ConsultantController::class,'index'])->name('display_consultants');
        Route::get('/admin_profile',[profileController::class,'index'])->name('admin_profile');
        Route::get('/report',[ConsultantController::class,'index'])->name('report');
        /* Route for display user, project, consultants */

        Route::get('/createuser',[projectController::class,'index'])->name('createuser');
        Route::post('/createuser',[UserController::class,'create'])->name('createuser');

        /* this is foe create user page view link and post link*/
        Route::view('/createprojects','dashboard.admin.createprojects')->name('createprojects');
        Route::post('/createprojects',[projectController::class,'create'])->name('createprojects');
        /* this is foe create user page view link and post link*/

//        Route::view('user_assign_projects', 'dashboard.admin.user_assign_projects')->name('user_assign_projects');
        Route::get('/user_assign_projects', [projectController::class, 'user_assign_projects'])->name('user_assign_projects');
        Route::get('/check_email_project', [projectController::class, 'check_email_project'])->name('check_email_project');
        Route::get('/check_project', [projectController::class, 'check_project'])->name('check_project');
        Route::post('/user_project_assign', [projectController::class, 'user_project_assign'])->name('user_project_assign');

        /* Route for display project update and Delete*/
        Route::post('/update/{project}','App\Http\Controllers\projectController@update')->name('project.update');
        Route::delete('/project/delete/{project}','App\Http\Controllers\projectController@delete')->name('project.delete');
        /* Route for display project update*/

        /* Route for display User update and Delete*/
//        Route::post('/{user}','App\Http\Controllers\User\UserController@update')->name('user.update');
        Route::delete('/user/delete/{user}','App\Http\Controllers\User\UserController@delete')->name('user.delete');
        /* Route for display User update*/

        /* Route for display Consultant update and Delete*/
//        Route::post('/update/{consultant}','App\Http\Controllers\Consultant\ConsultantController@update')->name('consultant.update');
        Route::delete('/consultant/delete/{consultant}','App\Http\Controllers\Consultant\ConsultantController@delete')->name('consultant.delete');
        /* Route for display User update*/

        /*Admin Report root*/
        Route::get('/report','App\Http\Controllers\Admin\TicketController@report')->name('report');
//        Route::get('/report','App\Http\Controllers\Admin\ReportController@index')->name('module');
        /*Admin Report root*/

        Route::view('/createconsultant','dashboard.admin.createconsultant')->name('createconsultant');
        Route::post('/createconsultant',[ConsultantController::class,'create'])->name('createconsultant');

        Route::get('/ticket','App\Http\Controllers\Admin\TicketController@index')->name('ticket');
        Route::post('/ticket/{ticket}','App\Http\Controllers\Admin\TicketController@update')->name('ticket.update');
        Route::get('/ticket/{ticket}','App\Http\Controllers\Admin\TicketController@show')->name('ticket.show');
        Route::delete('/ticket/delete/{ticket}','App\Http\Controllers\Admin\TicketController@delete')->name('ticket.delete');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    });

});

Route::prefix('consultant')->name('consultant.')->group(function (){

    Route::middleware(['guest:consultant','PreventBackHistory'])->group(function (){
        Route::view('/login','dashboard.consultant.login')->name('login');
        Route::post('/check',[ConsultantController::class,'check'])->name('check');
    });

    Route::middleware(['auth:consultant','PreventBackHistory'])->group(function (){
        Route::view('/home','dashboard.consultant.home')->name('home');
        Route::get('/ticket','App\Http\Controllers\Consultant\TicketController@index')->name('ticket');
        Route::post('/ticket/{ticket}','App\Http\Controllers\Consultant\TicketController@update')->name('ticket.update');
        Route::get('/ticket/{ticket}','App\Http\Controllers\Consultant\TicketController@show')->name('ticket.show');
        Route::post('/ticket/completed/{ticket}','App\Http\Controllers\Consultant\TicketController@edit')->name('ticket.edit');
      	Route::post('/ticket/dropzone/store/{ticket}', ['as'=>'dropzone.store','uses'=>'App\Http\Controllers\Consultant\TicketController@fileupload']);
        Route::get('/ticket/message/{ticket}','App\Http\Controllers\Consultant\TicketController@getMessage')->name('ticket.message');
        Route::post('/ticket/message/{ticket}','App\Http\Controllers\Consultant\TicketController@sendMessage');
        Route::post('/logout',[ConsultantController::class,'logout'])->name('logout');
    });
});
