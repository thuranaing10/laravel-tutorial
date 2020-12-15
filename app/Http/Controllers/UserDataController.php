<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserData;

class UserDataController extends Controller
{
    public function create()
    {
        return view('userData.create');
    }

	public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        UserData::create($request->all());
        return json_encode(array(
            "statusCode"=>200
        ));
    }
    public function index()
    {
            return view('userData.index');
    }
    public function getUserData(){
        $userData = UserData::get();
        return json_encode(array('data'=>$userData));
    }
    public function edit($id)
    {
        $userData = UserData::find($id);
        return view('userData.edit',compact('userData','id'));
    }

    public function update($id)
    {
        $userData = UserData::find($id);
        $userData->type = request('type');
        $userData->name = request('name');
        $userData->email = request('email');
        $userData->phone = request('phone');
        $userData->city = request('city');
        
        $userData->save();
       
        return json_encode(array('statusCode'=>200));
      
    }
    public function destroy($id)
    {
        UserData::find($id)->delete();
        
        return json_encode(array('statusCode'=>200));
       
    }
}
