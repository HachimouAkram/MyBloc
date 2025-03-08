<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;


use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getPosts()
    {
        // Appeler une API externe (ex: JSONPlaceholder)
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
       
        // Vérifier si la requête est OK
        if ($response->successful()) {
            $posts = $response->json();
           
            // Retourner les données à la vue
            return view('postsApi', ['posts' => $posts]);
        } else {
            return response()->json(['message' => 'Erreur lors de la récupération des articles'], 500);
        }
    }
}
