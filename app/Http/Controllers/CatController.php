<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat;

class CatController extends Controller
{
    public function index(){
    	$cats = Cat::all();
    	return view('eloquent/admin/category',compact('cats'));
    }
    public function cat_create(){
    	return view('eloquent/admin/add_category');
    }
    public function store(Request $request){
    	Cat::create($request->all());
    	return redirect('eloquent/admin/category');
    }
   	public function edit($id){
   		$category = Cat::find($id);
    	return view('eloquent/admin/edit_category', compact('category'));
   	}
   	public function update($id, Request $request) {
    	Cat::find($id)->update($request->all());
    	return redirect('eloquent/admin/category');
    }
    public function destory($id) {
    	Cat::find($id)->delete();
    	return redirect('eloquent/admin/category');
    }
}
