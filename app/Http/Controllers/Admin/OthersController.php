<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Others;

class OthersController extends Controller
{
    public function SelectAllOthers(){
        $result = Others::all();
        return $result;
    }
    public function onSelectDetails($othersId){
        $result = Others::where('id', $othersId)->get();
        return $result;
    }
    public function SelectThreeImage()
    {
        try {
            $othersImages = Others::take(3)->pluck('others_image')->all();
    
            return $othersImages;
        } catch (\Exception $e) {
            // Log or handle the exception as needed
            return "An error occurred while fetching others images.";
        }
    }

    public function AllOthers(){
        $result = Others::all();
        return view('backend.others.list_others',compact('result'));
    }

    public function AddOthers(){
        return view('backend.others.add_others');
    }

    public function StoreOthers(Request $request){

        $request->validate([
            "image_name" => "required",
            "short_desc" => "required",
            "long_title" => "required",
            "long_desc" => "required",
            "date" => "required",
            "client" => "required",
            "url" => "required",
            "other_image" => "mimes:jpg,jpeg,png",
            "other_image2" => "mimes:jpg,jpeg,png",
        ],[
            "other_image.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            "other_image2.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            'image_name.required' => 'Please enter image name',
            'short_desc.required' => 'Please enter short description',
            'long_title.required' => 'Please enter long title',
            'long_desc.required' => 'Please enter long description',
            'date.required' => 'Please enter date',
            'client.required' => 'Please enter client',
            'url.required' => 'Please enter url',
        ]);

        $other_img=$request->file('other_image');
        $img_name=hexdec(uniqid()). "."  .$other_img->getClientOriginalExtension();
        $location='upload/other/';
        $final_file1='http://127.0.0.1:8000/upload/other/'.$img_name;
        $other_img->move($location,$img_name);
    
        $other_img2=$request->file('other_image2');
        $img_name1=hexdec(uniqid()). "."  .$other_img2->getClientOriginalExtension();
        $location2='upload/other/'; // Use a different variable name for the second image location
        $final_file2='http://127.0.0.1:8000/upload/other/'.$img_name1;
        $other_img2->move($location2,$img_name1);
    
        Others::insert([    
           'other_image'=>$final_file1,
           'image_name'=>$request->image_name,
           'short_desc'=>$request->short_desc,
            'long_title'=>$request->long_title,
            'long_desc'=>$request->long_desc,
            'other_image2'=>$final_file2,
            'date'=>$request->date,
            'client'=>$request->client,
            'url'=>$request->url,
       ]);
       $notification= array(
        'message'=> 'others Inserted Successfully',
        'alert-type' => 'success'
       );
       return redirect()->route("list.others")->with($notification);
    }

    public function EditOthers($id){
        $result = Others::find($id);
        return view('backend.others.edit_others',compact('result'));
    }

    public function UpdateOthers(Request $request, $id)
    {

        $request->validate([
            "image_name" => "required",
            "short_desc" => "required",
            "long_title" => "required",
            "long_desc" => "required",
            "date" => "required",
            "client" => "required",
            "url" => "required",
            "other_image" => "mimes:jpg,jpeg,png",
            "other_image2" => "mimes:jpg,jpeg,png",
        ],[
            "other_image.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            "other_image2.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            'image_name.required' => 'Please enter image name',
            'short_desc.required' => 'Please enter short description',
            'long_title.required' => 'Please enter long title',
            'long_desc.required' => 'Please enter long description',
            'date.required' => 'Please enter date',
            'client.required' => 'Please enter client',
            'url.required' => 'Please enter url',
        ]);
        
        if ($request->file('other_image') || $request->file('other_image2')) {
            $project_img = $request->file('other_image');
            $img_name1 = hexdec(uniqid()) . "." . $project_img->getClientOriginalExtension();
            $location1 = 'upload/other/'; // Use a different variable name for the first image location
            $final_file1 = 'http://127.0.0.1:8000/upload/other/' . $img_name1;
            $project_img->move($location1, $img_name1);
    
            $project_img2 = $request->file('other_image2');
            $img_name2 = hexdec(uniqid()) . "." . $project_img2->getClientOriginalExtension();
            $location2 = 'upload/other/'; // Use a different variable name for the second image location
            $final_file2 = 'http://127.0.0.1:8000/upload/other/' . $img_name2;
            $project_img2->move($location2, $img_name2);
    
            Others::findOrFail($id)->update([
                'other_image' => $final_file1,
                'image_name' => $request->image_name,
                'short_desc' => $request->short_desc,
                'long_title' => $request->long_title,
                'long_desc' => $request->long_desc,
                'other_image2' => $final_file2,
                'date' => $request->date,
                'client' => $request->client,
                'url' => $request->url,
            ]);
    
            $notification = [
                'message' => 'other Updated Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route("list.others")->with($notification);
        } else {
            Others::findOrFail($id)->update([
                'image_name' => $request->image_name,
                'short_desc' => $request->short_desc,
                'long_title' => $request->long_title,
                'long_desc' => $request->long_desc,
                'other_image2' => $request->other_image2,
                'date' => $request->date,
                'client' => $request->client,
                'url' => $request->url,
            ]);
    
            $notification = [
                'message' => 'other Updated without image Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route("list.others")->with($notification);
        }
    }

    public function DeleteOthers($id){
        Others::find($id)->delete();
        $notification= array(
            'message'=> 'others Deleted Successfully',
            'alert-type' => 'success'
           );
           return redirect()->route("list.others")->with($notification);
    }

    
}
