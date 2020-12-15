<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Image;
use Storage;
use Response;

class StudentController extends Controller
{
    public function index() {
    	$students = Student::all();
    	return view('student.index',compact('students'));
    	//return "Aung";
    }
    public function create(){
    	
    	return view('student/create');
    }
    public function store(Request $request) {
        $data = $this->validate($request, [
            'rollNo' => 'required|min:3|max:255',
            'name'  => 'required|min:3',
            'image' => 'sometimes|image',
            'file' => 'sometimes|file'
          ]);

        //$file_extensions = ["pdf"];

        $student = Student::create($data);

        //pdf
        if($file = $request->hasFile('file')) {
            
            $file = $request->file('file') ;
            
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = storage_path('app/public/file/') . $fileName;
            $file->move($destinationPath,$fileName);
            $student->file = $fileName ;
        }
        $student->save() ;

        //image


        if ($request->hasfile('image')) {
            $image = $request->file('image');
            //$extension = $image->getClientOriginalExtension();
            //if (array_key_exists($extension, $image_extensions)) {
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = storage_path('app/public/images/') . $filename;
                Image::make($image)->save($location);
                $student->image = $filename;
                $student->save();
            //}
          }
    	return redirect('student');
    }
    public function edit($id){
    	$student = Student::find($id);
    	return view('student.edit', compact('student'));
    }
    public function update($id,Request $request){
        $data = $this->validate($request, [
            'rollNo' => 'required|min:3|max:255',
            'name'  => 'required|min:3',
            'image' => 'sometimes|image'
        ]);
        $student = Student::find($id);
       
        $student->update($data);

        //pdf
        if($file = $request->hasFile('file')) {
            Storage::disk('public')->delete("file/$student->file");
            $file = $request->file('file') ;
            
            $fileName = $file->getClientOriginalName();
            $destinationPath = storage_path('app/public/file/') . $fileName;
            $file->move($destinationPath,$fileName);
            $student->file = $fileName ;
            $student->save();
        }

        //image
    	if ($request->hasfile('image')) {
            Storage::disk('public')->delete("images/$student->image");

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = storage_path('app/public/images/') . $filename;

            Image::make($image)->save($location);

            $student->image = $filename;
            $student->save();
          }
    	return redirect('student');
    }	
    public function destory($id){
        
        $student = Student::find($id);
        Storage::disk('public')->delete("images/$student->image");
        $student->delete();
    	return redirect('student');
    }
    public function download($id,Request $request){

        // $data = $this->validate($request, [
        //     'file' => 'sometimes|file'
        //   ]);
        $student = Student::find($id);
        //return $student->file;
        //$file = $request->file('file') ;
            
        // $path= public_path(). "storage/app/public/file/Ubuntu-Linux-for-You-14.04-by-Ei.Maung.pdf";
        // $path= public_path(). "storage/app/public/file/".$file;
        $path= public_path(). "storage/app/public/file/".$student->file;

          $headers = array(
                'Content-Type: application/pdf',
          );
        return Response::download($path,$student->file, $headers);
    }
    
}
