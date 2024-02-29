<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Home;

class HomeController extends Controller
{
    public function SelectAllHome(){
        $result = Home::all();
        return $result;
    }

    public function AllHome(){
        $result = Home::all();
        return view('backend.home.list_home',compact('result'));
    }

    public function AddHome(){
        return view ('backend.home.add_home');
    }

    public function StoreHome(Request $request){

        $request->validate([
            'Home_title'=>'required',
            'Home_desc'=>'required',
        ],[
            'Home_title.required' => 'Please enter home title',
            'Home_desc.required' => 'Please enter home description',
        ]);

        Home::insert([
            'Home_title'=>$request['Home_title'],
            'Home_desc'=>$request['Home_desc'],
        ]);
        $notification= array(
            'message'=> 'Home Inserted Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route("list.home")->with($notification);
    }
    
    public function EditHome($id){
        $result = Home::find($id);
        return view('backend.home.edit_home',compact('result'));
    }

    public function UpdateHome(Request $request,$id){

        $request->validate([
            'Home_title'=>'required',
            'Home_desc'=>'required',
        ],[
            'Home_title.required' => 'Please enter home title',
            'Home_desc.required' => 'Please enter home description',
        ]);
        
        Home::find($id)->update([
            'Home_title'=>$request['Home_title'],
            'Home_desc'=>$request['Home_desc'],
        ]);
        $notification= array(
            'message'=> 'Home Updated Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route("list.home")->with($notification);
    }

    public function DeleteHome($id){
        Home::find($id)->delete();
        $notification= array(
            'message'=> 'Home Deleted Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route("list.home")->with($notification);
    }
}
