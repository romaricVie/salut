<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TemoignageController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\EnseignementController;
use App\Http\Controllers\DonController;
use App\Http\Controllers\IntercessionUserController;
use App\Http\Controllers\VersetUserController;
use App\Http\Controllers\PriereController;
use App\Http\Controllers\ConvertirController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserNotifyController;
use App\Http\Controllers\CommunauteController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\SignalController;
use App\Http\Controllers\Admin\UserController; 
use App\Http\Controllers\Admin\PostAdminController;
use App\Http\Controllers\Admin\EvenementAdminController;
use App\Http\Controllers\Admin\TemoignageAdminController;
use App\Http\Controllers\Admin\VilleDonAdminController;
use App\Http\Controllers\Admin\DonAdminController;
use App\Http\Controllers\Admin\IntercessionController;
use App\Http\Controllers\Admin\VersetController;
use App\Http\Controllers\Admin\PriereAdminController;
use App\Http\Controllers\Admin\ConvertirAdminController;
use App\Http\Controllers\Admin\ContactAdminController;
use App\Http\Controllers\Admin\DonRecuAdminController;
use App\Http\Controllers\Admin\EnseignementAdminController;
use App\Http\Controllers\Admin\SignalAdminController;





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



/**************** Welcome ********************************/
Route::view('/','welcome')->name('welcome');

/****************** Charte d'utilisation *************************/
Route::view('/charte-d-utilisation-de-la-plateforme','pages.charte')->name('charte');//guest
Route::view('/charte-d-utilisation','pages.reglement')->name('reglement'); //auth
/****************** A propos *************************/
Route::view('/a-propos-de-nous','pages.us')->name('us'); //guest
Route::view('/a-propos','pages.about')->name('about'); //auth
/****************** Bésoin d'aide  *************************/
Route::view('/besion-d-aide','pages.help')->name('help');

/*********************** Web TV   *********************************/

Route::view('/web-tv','pages.web-tv')->name('web.tv');


/**********--  Contact ContactController --**************/
Route::get('contacts',[ContactController::class, 'index'])->name('contacts.index');
Route::post('contacts',[ContactController::class, 'store'])->name('contacts.store');

/**********--   Intercession --**************/
Route::get('intercessions',[IntercessionUserController::class, 'index'])->name('intercession.index');

/*************++ prière  ++******************/
Route::get('/priere',[PriereController::class, 'create'])->name('priere.create');
Route::post('priere',[PriereController::class, 'store'])->name('priere.store');

/**** ------Convertir *****/

Route::get('/nouveau-convertir', [ConvertirController::class, 'create'])->name('convertir.create');
Route::post('convertir', [ConvertirController::class, 'store'])->name('convertir.store');

/****-------  Verset   ---------*********/

Route::get('verset-du-jour',[VersetUserController::class, 'index'])->name('verset.index');
Route::get('verset-prefere',[VersetUserController::class, 'create'])->name('verset.create');
Route::post('verset-prefere',[VersetUserController::class, 'store'])->name('verset.store');

//User Profile controller
Route::get('profil/{user}', [ProfilController::class, 'index'])->name('profil.index');

//Members
Route::get('membres', [MemberController::class, 'index'])->name('membres.index');

//temoignages controller
Route::get('/temoignages', [TemoignageController::class, 'index'])->name('temoignage.index');
Route::post('temoignages', [TemoignageController::class, 'store'])->name('temoignage.store');

/**  New feature  */
Route::get('/fil-des-temoignages', [TemoignageController::class, 'display_all'])->name('temoignage.display_all');
///Evenement Controller
Route::get('/evenements', [EvenementController::class, 'index'])->name('evenement.index');
Route::post('evenement', [EvenementController::class, 'store'])->name('evenement.store');

/* New feature*/

Route::get('/fil-des-evenements', [EvenementController::class, 'display_all'])->name('evenement.display_all');

// Enseignement controller EnseignementController
Route::get('/enseignements', [EnseignementController::class, 'index'])->name('enseignement.index');
Route::post('/enseignement', [EnseignementController::class, 'store'])->name('enseignement.store');

/* New feature */
Route::get('/fil-des-enseignements', [EnseignementController::class, 'display_all'])->name('enseignement.display_all');

//Post Controller PostController 
Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard'); 
/*  New feature */
Route::get('/fil-d-actualités', [PostController::class, 'display_all'])->name('dashboard.display_all');  //here
/*end*/

Route::post('post', [PostController::class, 'store'])->name('post.store');
Route::delete('post/{post}', [PostController::class, 'destroy'])->name('post.destroy')->middleware('can:delete,post');
Route::get('posts-en-attente', [PostController::class, 'shows'])->name('post.shows');


//Notification UserNotifyController
Route::get('notifications/{topic}/{notification}',[UserNotifyController::class, 'show'])->name('show.notification');

//Don controller

Route::get('donation', [DonController::class, 'show'])->name('don.show');//guest
Route::get('don', [DonController::class, 'index'])->name('don.index');//auth
Route::post('don', [DonController::class, 'store'])->name('don.store');


/****************++++++++++++++ Forum TopicController  +++++++++++++++++++++++++************/
Route::get('forum', [TopicController::class, 'index'])->name('forum.index');
Route::post('forum/store', [TopicController::class, 'store'])->name('forum.store');
Route::get('forum/{topic}', [TopicController::class, 'show'])->name('forum.show');
Route::delete('forum/{topic}', [TopicController::class, 'destroy'])->name('forum.destroy')->middleware('can:delete,topic');

/* CommentController */

Route::post('comment/forum/{topic}', [CommentController::class, 'store'])->name('comment.store');
Route::delete('comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy')->middleware('can:delete,comment');


/*+++++++++++    New feature page  CommunauteController    +++++++++*/

/*    CommunauteController CRUD      */
Route::get('communaute', [CommunauteController::class, 'index'])->name('communaute.index');
Route::post('communaute/store', [CommunauteController::class, 'store'])->name('communaute.store');
Route::get('communaute/{communaute}', [CommunauteController::class, 'show'])->name('communaute.show');
Route::get('communaute/{communaute}/edit', [CommunauteController::class, 'edit'])->name('communaute.edit')->middleware('can:update,communaute');  //middleware
Route::patch('communaute/{communaute}', [CommunauteController::class, 'update'])->name('communaute.update')->middleware('can:update,communaute');
Route::delete('communaute/{communaute}', [CommunauteController::class, 'destroy'])->name('communaute.destroy')->middleware('can:delete,communaute');

 /****************  PublicationController  ************************/
Route::post('publication/{communaute}', [PublicationController::class, 'store'])->name('publication.store');
Route::get('publication/{publication}', [PublicationController::class, 'show'])->name('publication.show');
Route::delete('publication/{publication}', [PublicationController::class, 'destroy'])->name('publication.destroy');

/****************** CommentaireController *****************************/

Route::post('commentaire/{publication}', [CommentaireController::class, 'store'])->name('commentaire.store');
Route::delete('commentaire/{commentaire}', [CommentaireController::class, 'destroy'])->name('commentaire.destroy')->middleware('can:delete,commentaire');

/*  SignalController */

Route::get('signal/{communaute}', [SignalController::class, 'create'])->name('signal.create');
Route::post('signal/{communaute}', [SignalController::class, 'store'])->name('signal.store');

/*++++++++++++   end feature page             ++++++++++++*/


/*++++++++++++++++++++++   Administration  ++++++++++++++++++++++++++++++++++++++*/

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['auth','can:manage-users'])->group(function (){
        	   /*+++ users controller +++*/
            Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
            Route::get('/users', [UserController::class, 'index'])->name('index');
            Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('edit');
            Route::patch('users/{user}', [UserController::class, 'update'])->name('update');
            Route::delete('users/{user}', [UserController::class, 'destroy'])->name('destroy');

            /*++++++++++++++++++++++  Post controller +++++++++++++++++++++++*/
            Route::get('/posts', [PostAdminController::class, 'index'])->name('index.posts');
            Route::get('/posts/utilisateur/{user}', [PostAdminController::class, 'shows'])->name('shows.posts');
            Route::patch('posts/{post}', [PostAdminController::class, 'update'])->name('update.posts');
            Route::delete('posts/{post}', [PostAdminController::class, 'destroy'])->name('destroy.posts');

            /*++++++++++++ Event controller ++++++++++++++++++++++*/

            Route::get('/evenements', [EvenementAdminController::class, 'index'])->name('index.evenements');
            Route::get('/evenements/utilisateur/{user}', [EvenementAdminController::class, 'shows'])->name('shows.evenements');
            Route::patch('evenements/{post}', [EvenementAdminController::class, 'update'])->name('update.evenements');
            Route::delete('evenements/{post}', [EvenementAdminController::class, 'destroy'])->name('destroy.evenements');

             /*+++++++++++++++++++++ temoignage controller ++++++++++++++++++++++*/
            Route::get('/temoignages', [TemoignageAdminController::class, 'index'])->name('index.temoignages');
            Route::get('/temoignages/utilisateur/{user}', [TemoignageAdminController::class, 'shows'])->name('shows.temoignages');
            Route::patch('temoignages/{post}', [TemoignageAdminController::class, 'update'])->name('update.temoignages');
            Route::delete('temoignages/{post}', [TemoignageAdminController::class, 'destroy'])->name('destroy.temoignages');


            /* Enseignement EnseignementAdminController  */
             
            Route::get('/enseignements', [EnseignementAdminController::class, 'index'])->name('index.enseignements');
            Route::get('/enseignements/utilisateur/{user}', [EnseignementAdminController::class, 'shows'])->name('shows.enseignements');
            Route::patch('enseignements/{post}', [EnseignementAdminController::class, 'update'])->name('update.enseignements');
            Route::delete('enseignements/{post}', [EnseignementAdminController::class, 'destroy'])->name('destroy.enseignements');

            /*+++++++++++++++++++++++++++++++ Point relais  +++++++++++++++++++++++++++++++++++++*/
            Route::get('ville/index', [VilleDonAdminController::class,'index'])->name('index.villes');
            Route::get('ville/create', [VilleDonAdminController::class,'create'])->name('create.villes');
            Route::post('ville', [VilleDonAdminController::class,'store'])->name('store.villes');
            Route::post('ville', [VilleDonAdminController::class,'store'])->name('store.villes');
            Route::delete('ville/{ville}', [VilleDonAdminController::class,'destroy'])->name('destroy.villes');
            
            /**++++++++++++++ Intercession +++++++++++++++++*/
           Route::get('intercessions/index', [IntercessionController::class,'index'])->name('index.intercessions');
           Route::get('intercessions/create', [IntercessionController::class,'create'])->name('create.intercessions');
           Route::post('intercessions', [IntercessionController::class,'store'])->name('store.intercessions');
           Route::get('intercessions/{intercession}/edit', [IntercessionController::class,'edit'])->name('edit.intercessions');
           Route::patch('intercessions/{intercession}', [IntercessionController::class,'update'])->name('update.intercessions');
           Route::delete('intercessions/{intercession}', [IntercessionController::class,'destroy'])->name('destroy.intercessions');
           
           /*++++++++++++++++++++++  VersetController   Verset du jour +++++++++++++++++++++++++++++++++++*/
           Route::get('versets/index', [VersetController::class,'index'])->name('index.versets');
           Route::get('versets/create', [VersetController::class,'create'])->name('create.versets');
           Route::post('versets', [VersetController::class,'store'])->name('store.versets');
           Route::get('versets/{verset}/edit', [VersetController::class,'edit'])->name('edit.versets');
           Route::patch('versets/{verset}', [VersetController::class,'update'])->name('update.versets');
           Route::delete('versets/{verset}', [VersetController::class,'destroy'])->name('destroy.versets');


           /*++++++++++++++++    Dons DonAdminController  ++++++++++++++++++*/
           Route::get('/dons', [DonAdminController::class,'index'])->name('index.dons');
           Route::get('/dons/{don}', [DonAdminController::class,'show'])->name('show.dons');
          //Route::get('dons/{don}/edit',[DonAdminController::class,'edit'])->name('edit.dons');
           Route::patch('dons/{don}', [DonAdminController::class,'update'])->name('update.dons');
           Route::delete('dons/{don}', [DonAdminController::class,'destroy'])->name('destroy.dons');

          /*++++++++++++++ Demandes de prière +++++++++++++*/

          Route::get('/prieres', [PriereAdminController::class,'index'])->name('index.prieres');
          Route::get('/prieres/utilisateur/{user}', [PriereAdminController::class,'shows'])->name('shows.prieres');
          Route::delete('/prieres/{priere}', [PriereAdminController::class,'destroy'])->name('destroy.priere');


          /**********   Nouveaux convertis    *********************/
          Route::get('/nouveaux-convertis', [ConvertirAdminController::class,'index'])->name('index.convertis');
          Route::get('/convertir/{user}', [ConvertirAdminController::class,'show'])->name('show.convertir');

        /*++++++++++++++++ DonRecuAdminController  ++++++++++++++++++*/
    
        Route::get('/donations-recus', [DonRecuAdminController::class,'index'])->name('index.donation');
        Route::get('/donation-info/{don}', [DonRecuAdminController::class,'show'])->name('show.donation');
        
        /******************************* Contact Admin ContactAdminController ***********************/
        Route::get('/contacts', [ContactAdminController::class,'index'])->name('contact.index');
        Route::get('/contacts/{contact}', [ContactAdminController::class,'show'])->name('contact.show');
        Route::delete('/contacts/{contact}', [ContactAdminController::class,'destroy'])->name('contact.destroy');   


        /************************** CommunauteAdminController   **********************************/


          Route::get('/signals', [SignalAdminController::class, 'index'])->name('index.signals');
          Route::get('/signal/{signal}', [SignalAdminController::class, 'show'])->name('show.signal');
          Route::patch('/signal/{communaute}', [SignalAdminController::class, 'bloquer'])->name('bloquer.signal');
          Route::patch('/signal/activer/{communaute}', [SignalAdminController::class, 'activer'])->name('activer.signal');
          Route::delete('/signal/{signal}', [SignalAdminController::class,'destroy'])->name('destroy.signal');  
          Route::delete('/communaute/{communaute}', [SignalAdminController::class,'supprimer'])->name('supprimer.communaute');  

});


