<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Image;
use Storage;
use App\Http\Requests\ArticleRequest;
use Redirect;


class ArticleController extends Controller
{
    public function index() {
    	$articles = Article::all();   
    	return view('article.index',compact('articles'));
    }
    
    public function create(){
    	return view('article/create');
    }

    public function store(ArticleRequest $request) {
    //single image

     //    $article = $request->all();
     //    $filename = $this->imageUpload($request); 
     //    $article['image'] = $filename;
     //    $article = Article::create($article);
     //    //$article->save();
    	// return redirect('article');

    //multiple image
        if($request->hasfile('image'))
         {
            foreach($request->file('image') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/storage/images/', $name);  
                $data[] = $name;  
                //var_dump($data);
            }
        }
        $form = $request->all();
        $form['image']=json_encode($data);
        //var_dump($form);
        Article::create($form);
        return redirect('article');
    }

    public function edit($id){
    	$article = Article::find($id);
    	return view('article.edit', compact('article'));
    }

    public function update(Request $request, $id){
        //single image
     //    $article = $request->all();
     //    $filename = $this->imageUpload($request);
     //    if ($filename) {
     //    	$article['image'] = $filename; 
     //    }
     //    Article::find($id)->update($article);
    	// return redirect('article');

        //multiple image
        if($request->hasfile('image'))
        {
            foreach($request->file('image') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/storage/images/', $name);  
                $data[] = $name;  
                //var_dump($data);
            }
        }
        $form = $request->all();
        if (!empty($data)) {
            $form['image']=json_encode($data);
        }
        Article::find($id)->update($form);
        return redirect('article');
    }

    public function destory($id){
        $article = Article::find($id);
        Storage::disk('public')->delete("images/$article->image");
        $article->delete();
    	return redirect('article');
    }

    private function imageUpload($request) {
        //single image
    	if ($request->hasfile('image')) {
    	    $image = $request->file('image');
    	    $filename = time() . '.' . $image->getClientOriginalExtension();
    	    $location = storage_path('app/public/images/') . $filename;
    	    Image::make($image)->save($location);
    	    return $filename;
    	}
    }
    // private function multipleUpload($request){
    //     if($request->hasfile('image'))
    //      {
    //         foreach($request->file('image') as $image)
    //         {
    //             $name=$image->getClientOriginalName();
    //             $image->move(public_path().'/storage/images/', $name);  
    //             $data[] = $name;  
    //             //var_dump($data);
    //             return $data;
    //         }
    //      }
    // }
}
