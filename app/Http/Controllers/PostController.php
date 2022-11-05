<?php

namespace App\Http\Controllers;

use App\Models\City;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
          $cities=City::get();
          $posts=Post::get();
          $categories=Category::get();
          return view('index',["ads"=>$posts ,'categories'=>$categories,'cities'=>$cities]);
        }

        public function show(Post $ad)
        {  
            // $login = DB::select('select login from users where id = ?', [$ad->user_id]); Non utilisé mais fonctinonnel
            // $location= DB::select('select * from cities where name = ?', [$ad->location]);
            // return view('ad',['ad'=>$ad,'login'=>$login,'location'=>$location]);
            // $ad=Post::findOrFail($ad); Pour utilser la fonction de cette façon enlever Post des arguments 
            
            
            $login = DB::select('select login from users where id = ?', [$ad->user_id]);
            return view('ad',['ad'=>$ad,'login'=>$login]);
            }
  
        public function create(Request $request)
            { 
         
              //validation des données du formulaire
              $request->validate(
                [    // 'email' => ['email:rfc,dns'],
                    'title'=>['required','min:4'],
                    'description' =>['required', 'min:10'],
                    'img1' => 'required|mimes:png,jpg,jpeg|max:2048',
                    'price'=> 'required',
                    'location'=>'required',
                    'category'=>'required'
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
                $Annonce -> type_ad = $request -> type_ad;
                $Annonce -> description = $request -> description;
                $Annonce -> user_id=Auth::user()->id;
                $Annonce -> price = $request -> price;
                $Annonce -> condition_id=$request->condition;
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
                //session()->flash('status', 'YEees yo have created a new ad!'); // creation du message d'alert qui se verra dans la page index
                /* Renvoyer ensuite sur la page index par le biais de la route
                pour afficher les données Route::get('/ads', [AdsController::class, 'index']); */
                return Redirect('/index')->with('status', "Your ad has been created!");
            }

              /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   $id=Post::find($id);
        $title=$id->title;
        $id->delete();
        return redirect('index')->with('status', "Yor ad: $title has been delete!");
    }
  
    
  /* ---------------------------------------------------------------------------*/
  /* ----- AFFICHE LA PAGE DES ANNONCES FILTRÉES SELON LES CATÉGORIES ----------*/
  /* ---------------------------------------------------------------------------*/

  public function filtre(Request $request){
    
    // dd($request);



    if ($request->reset==null && $request->category==null && $request->number_max==null && $request->number_min==null && $request->location==null)
    {
      return Redirect(route('home'))->with('status', 'le filtre sur la catégorie est requise');
    }

    if($request->reset!=null){
      return Redirect(route('home'));
    }




    if(isset($request->number_min) && isset($request->number_max)){
      if(($request->number_min) >= ($request->number_max)){
        $x = $request->number_max;
        $request->number_max = $request->number_min;
        $request->number_min = $x;
      }
      elseif(($request->number_max) <= ($request->number_min)){
        $x = $request->number_min;
        $request->number_min = $request->number_max;
        $request->number_max = $x;
      }
    };


    /* -- --- VERIFIER SI LES VARIABLES SONT VIDES OU PAS -- ---
    /  ET préparer la requête pour chacun des filtres  */

      // Ce sont les mêmes écritures : 
      // ->where('location', $request->location)
      // ->whereRaw("location  = ?",[$request->location])

      // dd($request->category);
      if (!empty ($request->category)){
        $query_cat = "category_id = '$request->category'";
      }
      else
      {
        return Redirect(route('home'))->with('status', 'le filtre sur la catégorie est requise');
      }

      if (!empty ($request->etat) || ($request->etat)!=null){
        // dd($request->etat);
        // récupérer les clés dans la variable $request->etat qui correspondent
        // à l'état du produit : used=0 good=1 new=2 
        // implode = transformer les clés du tableau dans une chaîne de caractère
        $keys=implode("','",array_keys($request['etat']));
        // dd($keys);
        $query_etat = "AND condition_id  IN ('$keys')";
      }
      else
      {
        $query_etat = "";
      }

      if (!empty ($request->number_min)){
        $query_price_min = "AND price >= '$request->number_min'";
      }
      else
      {
        $query_price_min = "";
      }

      if (!empty ($request->number_max)){
        $query_price_max = "AND price <= '$request->number_max'";
      }
      else
      {
        $query_price_max = "";
      }

      if (!empty ($request->location)){
        $query_lieu = "AND location = '$request->location'";
      }
      else
      {
        $query_lieu = "";
      }

    /* --------------------- REQUÊTE GLOBALE ----------------------
    /  AVEC CONCATENATION DES DIFFERENTES REQUÊTES DE CHAQUE FILTRE */

        $query= DB::table('post')
        ->whereRaw($query_cat .$query_etat .$query_price_min .$query_price_max .$query_lieu)
        ->orderBy('title')
        ->get();
        // return view('index',compact ('ads')); 
        $cities=City::get();
        $categories=Category::get();
        return view('index',["ads"=>$query ,'categories'=>$categories,'cities'=>$cities]);
  }


/* ---------------------------------------------------------------------------*/
/* ------------ AFFICHE LA PAGE DES ANNONCES FILTRÉES SELON LE ---------------*/
/* ----------------------- MOTEUR DE RECHERCHE -------------------------------*/
/* ---------------------------------------------------------------------------*/

public function search (Request $request){
  $keywords=$request->key;
  // dd($keywords);

  /* ----- RECHERCHE SELON TOUS LES MOTS SAISIS PAR L'UTILISATEUR ----- */
  /* ---------------- RECHERCHE UNIQUEMENT DANS LE TITRE -------------- */    
      // Mettre tous les mots saisis par l'utilisateur dans un array
      $words = explode(" ", trim($keywords));
      // dd($words);

      for ($i=0; $i<count($words);$i++)
      {
        /* tableau $kw contenant les expressions des mots saisis par l'utilisateur */
        $kw_title[$i] = "title like '%".$words[$i]."%'";
        // dd($kw[$i]);
        /* réaliser la requête en associant les mots du tableau $kw grâce la fonction implode qui convertit le tableau $kw en 1 chaine de caractère séparé par des OR */
        $query_title = implode(" OR ", $kw_title);
      }

      $query= DB::table('post')
      ->whereRaw($query_title)
      ->orderBy('title')
      ->get();

      $cities=City::get();
      $categories=Category::get();
      return view('index',["ads"=>$query ,'categories'=>$categories,'cities'=>$cities])
      ->with('status', 'sans annonce');

  /* ----- RECHERCHE SELON LE 1er MOT SAISI PAR L'UTILISATEUR ----- */
  /* ------ RECHERCHE DANS LE TITRE + CATEGORY + DESCRIPTION ------ */     
      
      // $query1= DB::table('post')
      // ->whereRaw("title = '$keywords' OR category_id = '$keywords' OR description LIKE '%$keywords%'")
      // ->orderBy('title')
      // ->get();

      // // Requête fonctionnelle mais m'affiche une erreur lors de la redirection vers la view
      // // erreur sur la ligne @if($ads->count()==0) de la view index
      // // $query1 = DB::select('SELECT * FROM post WHERE title = ? OR description LIKE ? OR category_id = ?', [$keywords,'%'.$keywords.'%',$keywords]);

      // // dd($query1);

      // $cities=City::get();
      // $categories=Category::get();
      // return view('index',["ads"=>$query1 ,'categories'=>$categories,'cities'=>$cities]);

  }


}
