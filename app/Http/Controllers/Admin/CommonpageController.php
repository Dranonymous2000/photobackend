<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commonpage;

class CommonpageController extends Controller
{
    public function SelectAllCommonPage(){
        $result = Commonpage::all();
        return $result;
    }
   
    public function AllCommonpage(){
        $result = Commonpage::all();
        return view('backend.commonpage.list_commonpage',compact('result'));
    }
    public function AddCommonpage(){
        return view('backend.commonpage.add_commonpage');
    }

    public function StoreCommonpage(Request $request){

        $request->validate([
            'web_name'=>'required',
            'twitter'=>'required',
            'facebook'=>'required',
            'linkedin'=>'required',
            'instagram'=>'required',
            'copywrite'=>'required',
        ],[
            'web_name.required' => 'Please enter web name',
            'twitter.required' => 'Please enter twitter',
            'facebook.required' => 'Please enter facebook',
            'linkedin.required' => 'Please enter linkedin',
            'instagram.required' => 'Please enter instagram',
            'copywrite.required' => 'Please enter copywrite',
        ]);
      

        Commonpage::insert([
            'web_name' => $request['web_name'],
            'twitter' => $request['twitter'],
            'facebook' => $request['facebook'],
            'linkedin' => $request['linkedin'],
            'instagram' => $request['instagram'],
            'copywrite' => $request['copywrite'],
        ]);
        $notification= array(
            'message'=> 'commonpage Inserted Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route("list.commonpage")->with($notification);
    }

    public function EditCommonpage($id){
        $result = Commonpage::find($id);
        return view('backend.commonpage.edit_commonpage',compact('result'));
    }

    public function UpdateCommonpage(Request $request,$id){

        $request->validate([
            'web_name'=>'required',
            'twitter'=>'required',
            'facebook'=>'required',
            'linkedin'=>'required',
            'instagram'=>'required',
            'copywrite'=>'required',
        ],[
            'web_name.required' => 'Please enter web name',
            'twitter.required' => 'Please enter twitter',
            'facebook.required' => 'Please enter facebook',
            'linkedin.required' => 'Please enter linkedin',
            'instagram.required' => 'Please enter instagram',
            'copywrite.required' => 'Please enter copywrite',
        ]);
        
        Commonpage::find($id)->update([
            'web_name' => $request['web_name'],
            'twitter' => $request['twitter'],
            'facebook' => $request['facebook'],
            'linkedin' => $request['linkedin'],
            'instagram' => $request['instagram'],
            'copywrite' => $request['copywrite'],
        ]);
        $notification= array(
            'message'=> 'commonpage Updated Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route("list.commonpage")->with($notification);
    }

    public function DeleteCommonpage($id){
        Commonpage::find($id)->delete();
        
        $notification= array(
            'message'=> 'commonpage Deleted Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route("list.commonpage")->with($notification);
    }


}
