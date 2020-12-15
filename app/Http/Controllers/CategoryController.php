<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index() {
    	$categories = Category::all();
    	return view('category.index', compact('categories'));
    }

    public function create() {
    	return view('category.create');
    }

    public function store(Request $request) {
    	Category::create($request->all());
    	return redirect('category');
    }

    public function edit($id) {
    	$category = Category::find($id);
    	return view('category.edit', compact('category'));
    }

    public function update($id, Request $request) {
    	Category::find($id)->update($request->all());
    	return redirect('category');
    }

    public function destory($id) {
    	Category::find($id)->delete();
    	return redirect('category');
    } 


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('category.index');
    }


}




