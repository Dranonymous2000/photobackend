<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function SelectAllService(){
        $result = Service::all();
        return $result;
    }

    public function AllService(){
        $result = Service::all();
        return view('backend.service.list_service',compact('result'));
    }
    public function AddService(){
        return view ('backend.service.add_service');
    }

    public function StoreService(Request $request){

        $request->validate([
            'service_description'=>'required',
            'service_type1'=>'required',
            'service_type2'=>'required',
            'service_type3'=>'required',
            'service_type4'=>'required',
            'service_type1_desc'=>'required',
            'service_type2_desc'=>'required',
            'service_type3_desc'=>'required',
            'service_type4_desc'=>'required',
        ],[
            'service_description.required' => 'Please enter service description',
            'service_type1.required' => 'Please enter service type1',
            'service_type2.required' => 'Please enter service type2',
            'service_type3.required' => 'Please enter service type3',
            'service_type4.required' => 'Please enter service type4',
            'service_type1_desc.required' => 'Please enter service type1 description',
            'service_type2_desc.required' => 'Please enter service type2 description',
            'service_type3_desc.required' => 'Please enter service type3 description',
            'service_type4_desc.required' => 'Please enter service type4 description',
        ]);

        Service::insert([
            'service_description'=>$request['service_description'],
            'service_type1'=>$request['service_type1'],
            'service_type2'=>$request['service_type2'],
            'service_type3'=>$request['service_type3'],
            'service_type4'=>$request['service_type4'],
            'service_type1_desc'=>$request['service_type1_desc'],
            'service_type2_desc'=>$request['service_type2_desc'],
            'service_type3_desc'=>$request['service_type3_desc'],
            'service_type4_desc'=>$request['service_type4_desc'],
        ]);
        $notification= array(
            'message'=> 'Service Inserted Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route("list.service")->with($notification);
    }

    public function EditService($id){
        $result = Service::find($id);
        return view('backend.service.edit_service',compact('result'));
    }

    public function UpdateService(Request $request,$id){

        $request->validate([
            'service_description'=>'required',
            'service_type1'=>'required',
            'service_type2'=>'required',
            'service_type3'=>'required',
            'service_type4'=>'required',
            'service_type1_desc'=>'required',
            'service_type2_desc'=>'required',
            'service_type3_desc'=>'required',
            'service_type4_desc'=>'required',
        ],[
            'service_description.required' => 'Please enter service description',
            'service_type1.required' => 'Please enter service type1',
            'service_type2.required' => 'Please enter service type2',
            'service_type3.required' => 'Please enter service type3',
            'service_type4.required' => 'Please enter service type4',
            'service_type1_desc.required' => 'Please enter service type1 description',
            'service_type2_desc.required' => 'Please enter service type2 description',
            'service_type3_desc.required' => 'Please enter service type3 description',
            'service_type4_desc.required' => 'Please enter service type4 description',
        ]);

        
        Service::find($id)->update([
            'service_description'=>$request['service_description'],
            'service_type1'=>$request['service_type1'],
            'service_type2'=>$request['service_type2'],
            'service_type3'=>$request['service_type3'],
            'service_type4'=>$request['service_type4'],
            'service_type1_desc'=>$request['service_type1_desc'],
            'service_type2_desc'=>$request['service_type2_desc'],
            'service_type3_desc'=>$request['service_type3_desc'],
            'service_type4_desc'=>$request['service_type4_desc'],
        ]);
        $notification= array(
            'message'=> 'Service Updated Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route("list.service")->with($notification);
    }

    public function DeleteService($id){
        Service::find($id)->delete();
        $notification= array(
            'message'=> 'Service Deleted Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route("list.service")->with($notification);
    }
    
}
