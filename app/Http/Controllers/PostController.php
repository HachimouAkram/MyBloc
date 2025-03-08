<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Méthode existante pour afficher tous les articles
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Nouvelle méthode pour afficher les détails d'un article
    public function show($id)
    {
        // Récupère l'article par son ID ou retourne une erreur 404
        $post = Post::findOrFail($id);

        // Retourne la vue des détails de l'article
        return view('posts.show', compact('post'));
    }

    public function searchPage()
    {
        $posts = Post::all();
        return view('search', compact('posts'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $posts = Post::where('title', 'like', "%$query%")
            //->orWhere('content', 'like', "%$query%")
            ->get();

        return response()->json($posts);
    }

    

     // 2. Afficher le formulaire de création
     public function create()
     {
         return view('posts.create');
     }
 
 
     public function edit($id)
 {
     // Trouver l'article correspondant à l'ID
     $post = Post::findOrFail($id);
 
 
     // Retourner la vue avec les données de l'article
     return view('posts.edit', compact('post'));
 }
     // 3. Stocker un nouvel article
     public function store(Request $request)
     {
         $validated = $request->validate([
             'title' => 'required|string|max:255',
             'content' => 'required',
         ]);
 
 
         Post::create($validated);
 
 
         return redirect()->route('posts.index')->with('success', 'Article créé avec succès.');
     }
     // 6. Mettre à jour un article
     public function update(Request $request, $id)
     {
         $validated = $request->validate([
             'title' => 'required|string|max:255',
             'content' => 'required',
         ]);
 
 
         $post = Post::findOrFail($id);
         $post->update($validated);
 
 
         return redirect()->route('posts.index')->with('success', 'Article mis à jour avec succès.');
     }
     // 7. Supprimer un article
     public function destroy($id)
        {
            $post = Post::findOrFail($id);
            $post->delete();
    
    
            return redirect()->route('posts.index')->with('success', 'Article supprimé avec succès.');
        }
    
}
