<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Architecture;

class ArchitectureController extends Controller
{
    public function SelectAllArchitecture(){
        $result = Architecture::all();
        return $result;
    }
    public function onSelectDetails($architectureId){
        $result = Architecture::where('id', $architectureId)->get();
        return $result;
    }
    public function SelectThreeImage()
    {
        try {
            $architectureImages = Architecture::take(3)->pluck('architecture_image')->all();
    
            return $architectureImages;
        } catch (\Exception $e) {
            // Log or handle the exception as needed
            return "An error occurred while fetching architecture images.";
        }
    }

    public function AllArchitecture(){
        $result = Architecture::all();
        return view('backend.architecture.list_architecture',compact('result'));
    }

    public function AddArchitecture(){
        return view('backend.architecture.add_architecture');
    }

    public function StoreArchitecture(Request $request){

        $request->validate([
            "image_name" => "required",
            "short_desc" => "required",
            "long_title" => "required",
            "long_desc" => "required",
            "date" => "required",
            "client" => "required",
            "url" => "required",
            "architecture_image" => "mimes:jpg,jpeg,png",
            "architecture_image2" => "mimes:jpg,jpeg,png",
        ],[

            "architecture_image.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            "architecture_image2.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            'image_name.required' => 'Please enter image name',
            'short_desc.required' => 'Please enter short description',
            'long_title.required' => 'Please enter long title',
            'long_desc.required' => 'Please enter long description',
            'date.required' => 'Please enter date',
            'client.required' => 'Please enter client',
            'url.required' => 'Please enter url',
           
        ]);

        $architecture_img=$request->file('architecture_image');
        $img_name=hexdec(uniqid()). "."  .$architecture_img->getClientOriginalExtension();
        $location='upload/architecture/';
        $final_file1='http://127.0.0.1:8000/upload/architecture/'.$img_name;
        $architecture_img->move($location,$img_name);
    
        $architecture_img2=$request->file('architecture_image2');
        $img_name1=hexdec(uniqid()). "."  .$architecture_img2->getClientOriginalExtension();
        $location2='upload/architecture/'; // Use a different variable name for the second image location
        $final_file2='http://127.0.0.1:8000/upload/architecture/'.$img_name1;
        $architecture_img2->move($location2,$img_name1);
    
        Architecture::insert([    
           'architecture_image'=>$final_file1,
           'image_name'=>$request->image_name,
           'short_desc'=>$request->short_desc,
            'long_title'=>$request->long_title,
            'long_desc'=>$request->long_desc,
            'architecture_image2'=>$final_file2,
            'date'=>$request->date,
            'client'=>$request->client,
            'url'=>$request->url,
       ]);
       $notification= array(
        'message'=> 'architecture Inserted Successfully',
        'alert-type' => 'success'
       );
       return redirect()->route("list.architecture")->with($notification);
    }

    public function EditArchitecture($id){
        $result = Architecture::find($id);
        return view('backend.architecture.edit_architecture',compact('result'));
    }

    public function UpdateArchitecture(Request $request, $id)
    {
        $request->validate([
            "image_name" => "required",
            "short_desc" => "required",
            "long_title" => "required",
            "long_desc" => "required",
            "date" => "required",
            "client" => "required",
            "url" => "required",
            "architecture_image" => "mimes:jpg,jpeg,png",
            "architecture_image2" => "mimes:jpg,jpeg,png",
        ],[

            "architecture_image.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            "architecture_image2.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            'image_name.required' => 'Please enter image name',
            'short_desc.required' => 'Please enter short description',
            'long_title.required' => 'Please enter long title',
            'long_desc.required' => 'Please enter long description',
            'date.required' => 'Please enter date',
            'client.required' => 'Please enter client',
            'url.required' => 'Please enter url',
           
        ]);

        
        if ($request->file('architecture_image') || $request->file('architecture_image2')) {
            $project_img = $request->file('architecture_image');
            $img_name1 = hexdec(uniqid()) . "." . $project_img->getClientOriginalExtension();
            $location1 = 'upload/architecture/'; // Use a different variable name for the first image location
            $final_file1 = 'http://127.0.0.1:8000/upload/architecture/' . $img_name1;
            $project_img->move($location1, $img_name1);
    
            $project_img2 = $request->file('architecture_image2');
            $img_name2 = hexdec(uniqid()) . "." . $project_img2->getClientOriginalExtension();
            $location2 = 'upload/architecture/'; // Use a different variable name for the second image location
            $final_file2 = 'http://127.0.0.1:8000/upload/architecture/' . $img_name2;
            $project_img2->move($location2, $img_name2);
    
            Architecture::findOrFail($id)->update([
                'architecture_image' => $final_file1,
                'image_name' => $request->image_name,
                'short_desc' => $request->short_desc,
                'long_title' => $request->long_title,
                'long_desc' => $request->long_desc,
                'architecture_image2' => $final_file2,
                'date' => $request->date,
                'client' => $request->client,
                'url' => $request->url,
            ]);
    
            $notification = [
                'message' => 'architecture Updated Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route("list.architecture")->with($notification);
        } else {
            Architecture::findOrFail($id)->update([
                'image_name' => $request->image_name,
                'short_desc' => $request->short_desc,
                'long_title' => $request->long_title,
                'long_desc' => $request->long_desc,
                'architecture_image2' => $request->architecture_image2,
                'date' => $request->date,
                'client' => $request->client,
                'url' => $request->url,
            ]);
    
            $notification = [
                'message' => 'architecture Updated without image Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route("list.architecture")->with($notification);
        }
    }

    public function DeleteArchitecture($id){
        Architecture::findOrFail($id)->delete();
        $notification= array(
            'message'=> 'architecture Deleted Successfully',
            'alert-type' => 'success'
           );
           return redirect()->route("list.architecture")->with($notification);
    }

    
    

}
