<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $userID = Auth::user()->id; 
        // $posts = DB::select('select * from post where user_id = ?', [$userID]);
        // $categories=Category::get();
        // // $posts=Post::where('user_id', $userID)->get();
        // return view('dashboard',['posts'=>$posts,'categories'=>$categories]);

        $userID = Auth::user()->id; 
        $posts = DB::select('select * from post where user_id = ?', [$userID]);
        $categories=Category::all();
        return view('dashboard',compact('posts','categories'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // $post=Post::find($request->id);
        // $categories=Category::get();
        // return view('dashboard_update_ad',['post'=>$post,'categories'=>$categories]);

        $post=Post::find($request->id);
        $categories=Category::all();
        return view('dashboard_update_ad',compact('post','categories'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        $post->delete();
    }


    /* ------ Suppression du USER et de ses posts (en cascade avec clé étrangères) ------*/7
    public function deleteUser(Request $request, $id){
        // https://codeanddeploy.com/blog/laravel/laravel-8-eloquent-query-find-and-findorfail-example
        // Utiliser findOrFail pour trouver l'id de l'user ou à défaut return abort(404) si non trouvé
        
        $request->validate([
            'userid' => 'required',
        ]);

        if($id == $request->userid)
        {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect('index')->with('status', "You have been deleted. See you soon !");
        }
        else {
            return redirect()->with('status', "User cannot be deleted. ID is not the same !");
        }
        
        // Dans la view où tu auras le bouton pour delete le User. Mettre : 
        // <form action="{{route('delete_user",$user->id}}" method="post">
        // @csrf
        // <input type="text" name="userid" placeholder="Enter user id">
        // <button type="submit">Delete User</button>
        // adapter si besoin le $user et la variable si tu veux supprimer avec autre que l'id (mail, nom user)

        // la route est construite (ligne 63 dans web.blade.php). Il faut adapter l'URI.
        // Un lien qui permet de voir 3 façons différentes de "supprimer" : 
        // 1/ Empêcher l'utilisateur de se connecter mais les données sont tjrs présentes
        // 2/ Cacher le User mais données encore présentes
        // 3/ Supprimer réellement le User et ses données associées
        // J'ai fait le 3ème cas avec la clé étrangère (cf. Model Post) 
        // et suppression en cascade (dans la database : cd. Database Post)
        // https://blog.quickadminpanel.com/3-ways-to-delete-user-in-laravel-block-hide-or-hard-delete/



    }




}
