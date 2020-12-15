<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\User;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('home');
    }
    public function posts()
    {
        $posts = Like::get();
        return view('posts', compact('posts'));
    }
    public function ajaxRequest(Request $request){


        $post = Like::find($request->id);
        $response = auth()->user()->toggleLike($post);


        return response()->json(['success'=>$response]);
    }
}
