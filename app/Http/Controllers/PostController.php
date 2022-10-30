<?php

namespace App\Http\Controllers;

use App\Models\Post;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
          $posts=Post::get();
          $categories=Category::get();
          return view('index',["ads"=>$posts ,'categories'=>$categories]);
        }

        public function show(Post $ad)
        {
            // $ad=Post::findOrFail($ad); Pour utilser la fonction de cette façon enlever Post des arguments 
              return view('ad',['ad'=>$ad]);
            }
    
            public function store(Request $request)
            {
                /* Dans l'objet $request, il y a l'ensemble des propriétés contenues dans le 
                constructeur de la class Request de Symfony ! c’est à dire : $query, $request, $attributes, $cookies, $files, $server .
                L'objet $request permet non seulement de récupérer les inputs du formulaire envoyé ($_POST) ainsi que d’autres données tel que les cookies ($_COOKIE), les données de $_SERVER etc… mais aussi appliquer diverses méthodes à cet objet.
                https://walkerspider.com/cours/laravel/request/ */
        
                /* Validation des données envoyées dans le formulaire 
                https://laravel.sillo.org/cours-laravel-8-les-bases-la-validation/ */
        
                // $this->validate($request, [
                //     'title' => 'bail|string|between:5,50',
                //     'category_id' => 'bail|required|between:5,50',
                //     'description' => 'bail|required|max:255',
                //     'img' => 'bail|required|image',
                //     'prix' => 'bail|required|integer',
                //     'localisation' => 'bail|required|between:5,50',
                // ]);
        
                $Annonce = new Post();
                $Annonce -> title = $request -> title;
                $Annonce -> category_id = $request -> category;
                // $Annonce -> description = $request -> type_ad;
                $Annonce -> description = $request -> description;

                $Annonce -> price = $request -> price;
                $Annonce->condition_id=$request->condition;
                $Annonce -> location = $request -> location;
        
                /* ----- traitement de l'image ---- */
        
                // Générer un nom de fichier unique "dynamique" avec time + extension de l'image //
                $filename = time().'.'.$request -> img1 -> extension();
        
                /* Récupérer l'image (file) saisie dans le formulaire et la stocker (store) dans le dossier images dans storage app public en spécifiant son nom grace à "As"*/
                // $image_path = $request->file('img')->storeAs('images',$filename,'public');
                $Annonce -> image1 = $request->file('img1')->storeAs('images',$filename,'public');
        
                // Redimmensionner l'image //
                // $image = Image::make(public_path("storage/{$image_path}")) -> fit(400,150);
                // $image -> save();
        
                /* ----- envoyer dans la BDD = requête SQL INSERT INTO ads() VALUES() ---- */ 
                $Annonce -> save();
        
                /* Renvoyer ensuite sur la page index par le biais de la route
                pour afficher les données Route::get('/ads', [AdsController::class, 'index']); */
                return Redirect('/register')->with('success', "Image uploaded successfully.");
            }

}
