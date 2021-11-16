<?php

use Illuminate\Support\Facades\Route;

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

Route::group([], function () {
    Route::get('/accueil',function (){
        $categories = DB::table('categories')->get();
        return view('accueil', compact('categories'));

    })->middleware(['auth'])->name('accueil');

    Route::get('/accueil/{id}',function ($categorie_id){
        $id = DB::table('articles_categories')->where('categorie_id',$categorie_id)->get();
        $articles = DB::table('articles')->get();
        return view('article', compact('id', 'articles'));
    });

    Route::get('/accueil/article/{comme_id}',function ($id){
        $detailarticles = DB::table('articles')->where('id',$id)->get();
        $commentaires = DB::table('comentaires')->where('article_id',$id)->get();
        
        $users = DB::table('users')->get();
        return view('detail_article', compact('detailarticles','commentaires','users'));
    });
    
    Route::post("/accueil/article/comme_id", [\App\Http\Controllers\CommentairesController::class, "store"])->name("commentaire.store");
    
});

Route::get('/gestion', function () {
    return view('gestion');
})->middleware(['auth'])->name('gestion');

Route::get('/creation_article', function () {
    $categories = DB::table('categories')->get();
    return view('creation_article', compact('categories'));
})->middleware(['auth'])->name('creation_article');
Route::post("/creation_article", [\App\Http\Controllers\ArticlesController::class, "store"])->name("article.store");

Route::get('/creation_categorie', function () {
    $categories = DB::table('categories')->get();
    return view('creation_categorie', compact('categories'));
})->middleware(['auth'])->name('creation_categorie');
Route::post("/creation_categorie", [\App\Http\Controllers\CategoriesController::class, "store"])->name("categorie.store");
Route::delete("/creation_categorie", [\App\Http\Controllers\CategoriesController::class, "destroy"])->name("categorie.delete");


Route::get('/historique', function () {
    return view('historique');
})->middleware(['auth'])->name('historique');

Route::get('/article', function () {
    return view('article');
})->middleware(['auth'])->name('article');

Route::get('/categorie', function () {
    return view('categorie');
})->middleware(['auth'])->name('categorie');


Route::get('/detail_article', function () {
    return view('detail_article');
})->middleware(['auth'])->name('detail_article');


require __DIR__.'/auth.php';
