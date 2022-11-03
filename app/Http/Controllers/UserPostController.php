<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
    public function update(Request $request,$id)
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

        $ad=Post::find($id);
        $ad->title=$request->input('title');
        $ad->price=$request->input('price');
        $ad->description=$request->input('description');
        $ad->location=$request->input('description');
        $ad->category_id=$request->input('category');
        $ad->save();
        // $this->index()->with('status','AD modified');
        return view('index')->with('status', "Your ad has been modified succesfully!");
    }

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
}
