<?php

use App\Http\Controllers\Answer;
use App\Http\Controllers\Option;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PollController;;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Question;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
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
    return view('acceuil');
});
Route::get('/connexion', function () {
    return view('connexion');
});
Route::get('/inscription', function () {
    return view('inscription');
}); 

Route::get('/emailRegister', function () {
    return view('Email.EmailRegistration');
});  

Route::post('inscrire', [UserController::class, 'createUser']);
Route::post('connecter',  [UserController::class, 'connecter']);

Route::group(['middleware' => 'auth.admin'], function () {
    // Sub Layouts 
    Route::get('dashboard/modify', function () {
        return view('Admin.modify');
    });
    Route::get('dashboard/sondage', function () {
        return view('Admin.sondage');
    });
    Route::get('dashboard/result', function () {
        return view('Admin.result');
    });
    Route::get('dashboard', function () {
        return view('dashboard');
    });
    Route::get('dashboard/listSondage', function () {
        return view('Admin.listSondage');
    });
    // deconnexion 
    Route::get('/deconnexion', function () {
        Auth::logout();
        return redirect('/connexion');
    });
    Route::post('creer_sondage', [PollController::class, 'creer']);
    Route::get('list', [PollController::class, 'getAllSurvey']);
    Route::get('getResult/{id}', [PollController::class, 'getResult']);
    Route::get('dashboard/modify/{id}', function ($id) {
        return view('Admin.modify', ['id' => $id]);
    });
    Route::get('getModification/{id}', [PollController::class, 'getModification']);
    Route::delete('effacer/{id}', [PollController::class, 'effacer']);
    Route::delete('supprimer', [PollController::class, 'destroy']);
    Route::get('list_question/{id}', [Question::class, 'retrieveList']); 
    Route::get('count/{id}', [Question::class, 'getCount']); 
    Route::get('responder/{id}', [Answer::class, 'getResponse']);

    Route::get('/response', function (){
        return view('Admin.response');
    });
    Route::get('/response/{idUser}/{poll_id}', function($idUser, $poll_id){
        return view('Admin.response', ['user' => $idUser, 'poll' => $poll_id]);
    }); 
    Route::get('/get_all_question/{id}/{user}', [Answer::class, 'get']);  
    Route::get('title/{id}', [PollController::class, 'getTitre']);
    Route::get('get_User/{id}', [UserController::class, 'getUser']); 
});

// User Layouts 

Route::group(['middleware' => 'auth.user'], function () {
    Route::get('user', function () {
        return view('User.DashboardUser');
    });
    Route::get('listQuestionnaire', function () {
        return view('User.listQuestionnaire');
    });
    Route::get('listSurvey', [PollController::class, 'getAllSurvey']);

    Route::get('/dashboard/questionnaire/{id}', [PollController::class, 'getModification']);

    Route::get('dashboard/questionnaire/{id}', function ($id) {
        return view('User.questionnaire', ['id' => $id]);
    });

    Route::post('envoyer_reponse', [Answer::class, 'store_response']);
    Route::get('titre/{id}', [PollController::class, 'getTitre']);

    Route::get('/init', function () {
        return view('init');
    });

    Route::get('/init/{id}', function ($id) {
        return view('init', ['id' => $id]);
    });

    Route::get('answer/{id}', [Answer::class, 'getData']);;

    Route::post('submit_question', [Question::class, 'create_question']); 

    Route::get('all_question/{id}', [Question::class, 'retrieveList']);   

    Route::get('success', function(){
        return view('User.success');
    });
    Route::post('submit_option', [Option::class, 'create_option']);
});