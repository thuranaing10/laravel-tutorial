<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Cat;

class PostController extends Controller
{
    public function index(){
    	$posts = Post::all();
    	return view('eloquent/admin/post',compact('posts'));
    }
    public function post_create(){
    	$categorys = Cat::all();
    	return view('eloquent/admin/add_post',compact('categorys'));
    }
    public function store(Request $request){
    	Post::create($request->all());
    	return redirect('eloquent/admin/post');
    }
    public function edit($id){
   		$post = Post::find($id);
   		$category = Cat::all();
    	return view('eloquent/admin/edit_post', compact('post','category'));
   	}
   	public function update($id, Request $request) {
    	Post::find($id)->update($request->all());
    	return redirect('eloquent/admin/post');
    }
}
