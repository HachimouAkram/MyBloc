<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ApiController;
Route::get('/', function () {
    return view('welcome');
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
Route::get('/saluer/{nom}', function ($nom) {
    $reponse = 'Bonjour ' . $nom ;
    return $reponse;
    });




Route::get('/user/create', function () {
    return '
        <form action="/user/create" method="POST">
            '.csrf_field().'
            <label for="name">Nom de l\'utilisateur :</label>
            <input type="text" id="name" name="name" required>
            <button type="submit">Ajouter l\'utilisateur</button>
        </form>
    ';
});


Route::post('/user/create', function (\Illuminate\Http\Request $request) {
$name = $request->input('name'); // Récupération de la valeur saisie
$response = '<h1>Ajout Utilisateur</h1>';
$response .= '<p>Utilisateur "' . htmlspecialchars($name) . '" ajouté avec succès</p>';
return $response;
});


   
Route::get('/', function () {
return view('welcome');
});


Route::get('/accueil', function () {
return view('index');
});






Route::get('/navbar', function () {
return view('navbar');
});






Route::get('/view', [PostController::class, 'view'])->name('view');


Route::get('/posts/{id}', [PostController::class, 'show'])->name('show');


// Route pour stocker un nouvel article
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');


Route::get('/posts', [PostController::class, 'index'])->name('posts.index');


// Route pour afficher le formulaire d'édition d'un article
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');


// Route pour mettre à jour un article
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');


// Route pour supprimer un article
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');


Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');




Route::get('/postsApi', [ApiController::class, 'getPosts'])->middleware('auth')->name('posts.api');