<?php

namespace App\Http\Controllers;

use App\Models\Post;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\File;
 


class PostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     
     */
public function __construct()
{
  $this->middleware('auth',['except'=>['index','show']]);
}

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
  
        public function create(Request $request)
            { 
              //validation des données du formulaire
              $request->validate(
                [    // 'email' => ['email:rfc,dns'],
                    'title'=>['required','min:4'],
                    'description' =>['required', 'min:25'],
                    'img1' => 'required|mimes:png,jpg,jpeg|max:2048',
                    'price'=> 'required',
                    'location'=>'required',
                ]
                );
              
              /* Dans l'objet $request, il y a l'ensemble des propriétés contenues dans le 
                constructeur de la class Request de Symfony ! c’est à dire : $query, $request, $attributes, $cookies, $files, $server .
                L'objet $request permet non seulement de récupérer les inputs du formulaire envoyé ($_POST) ainsi que d’autres données tel que les cookies ($_COOKIE), les données de $_SERVER etc… mais aussi appliquer diverses méthodes à cet objet.
                https://walkerspider.com/cours/laravel/request/ */
        
                /* Validation des données envoyées dans le formulaire 
                https://laravel.sillo.org/cours-laravel-8-les-bases-la-validation/ */
           
                $Annonce = new Post();
                $Annonce -> title = $request -> title;
                $Annonce -> category_id = $request -> category;
                $Annonce -> description = $request -> type_ad;
                $Annonce -> description = $request -> description;

                $Annonce -> price = $request -> price;
                $Annonce->condition_id=$request->condition;
                $Annonce -> location = $request -> location;
        
                /* ----- traitement de l'image ---- */
               
                // Générer un nom de fichier unique "dynamique" avec time + extension de l'image //
                $filename = Str::uuid().'.'.$request -> img1 -> extension();
        
                /* Récupérer l'image (file) saisie dans le formulaire et la stocker (store) dans le dossier images dans storage app public en spécifiant son nom grace à "As"*/
                // $image_path = $request->file('img')->storeAs('images',$filename,'public');
                $Annonce -> image1 = $request->file('img1')->storeAs('images',$filename,'public');
                
                if (isset($request -> img2)){
                    $filename2 = Str::uuid().'.'.$request -> img2 -> extension();
                    $Annonce -> image2 = $request->file('img2')->storeAs('images',$filename2,'public'); 
                }
                if (isset($request -> img3)){

                $filename3 = Str::uuid().'.'.$request -> img3 -> extension();
                $Annonce -> image3 = $request->file('img3')->storeAs('images',$filename3,'public');

                }
                if (isset($request -> img4)){
                  $filename4 = Str::uuid().'.'.$request -> img4 -> extension();
                  $Annonce -> image4 = $request->file('img4')->storeAs('images',$filename4,'public');
                }
                if (isset($request -> img5)){
                    $filename5 = Str::uuid().'.'.$request -> img5 -> extension();
                $Annonce -> image5 = $request->file('img5')->storeAs('images',$filename5,'public');
                
                }
                /* ----- envoyer dans la BDD = requête SQL INSERT INTO ads() VALUES() ---- */ 
                $Annonce -> save();
                session()->flash('ad_created', 'YEees yo have created a new ad!'); // creation du meesgae d'alert qui se verra dans la page index
                /* Renvoyer ensuite sur la page index par le biais de la route
                pour afficher les données Route::get('/ads', [AdsController::class, 'index']); */
                return Redirect('/index')->with('success', "Image uploaded successfully.");
            }





}
