<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nature;

class NatureController extends Controller
{
    public function SelectAllNature(){
        $result = Nature::all();
        return $result;
    }

    public function SelectNaturePicture(){
        $result= Nature::select("nature_image")->get();
        return $result;

    }

   public function onSelectDetails($natureid) {
    try {
        $id = $natureid;
        $result = Nature::where('id', $id)->first();

        if ($result) {
            // Query was successful, return the result
            return response()->json($result);
        } else {
            // No matching record found
            return response()->json(['message' => 'Nature not found'], 404);
        }
    } catch (\Exception $e) {
        // An error occurred during the query
        return response()->json(['message' => 'Error fetching nature details', 'error' => $e->getMessage()], 500);
    }
    }

    public function SelectThreeImage()
    {
        try {
            $natureImages = Nature::take(3)->pluck('nature_image')->all();
    
            return $natureImages;
        } catch (\Exception $e) {
            // Log or handle the exception as needed
            return "An error occurred while fetching nature images.";
        }
    }

    public function AllNature(){
        $result = Nature::all();
        return view('backend.nature.list_nature',compact('result'));
    }

    public function AddNature(){
        return view('backend.nature.add_nature');
    }

    public function StoreNature(Request $request){

        $request->validate([
            "image_name" => "required",
            "short_desc" => "required",
            "long_title" => "required",
            "long_desc" => "required",
            "date" => "required",
            "client" => "required",
            "url" => "required",
            "nature_image" => "mimes:jpg,jpeg,png",
            "nature_image2" => "mimes:jpg,jpeg,png",
        ],[
            "nature_image.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            "nature_image2.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            'image_name.required' => 'Please enter image name',
            'short_desc.required' => 'Please enter short description',
            'long_title.required' => 'Please enter long title',
            'long_desc.required' => 'Please enter long description',
            'date.required' => 'Please enter date',
            'client.required' => 'Please enter client',
            'url.required' => 'Please enter url',
        ]);

        $nature_img = $request->file('nature_image');
        $img_name = hexdec(uniqid()) . "."  . $nature_img->getClientOriginalExtension();
        $location = 'upload/nature/';
        $final_file1 = 'http://127.0.0.1:8000/upload/nature/' . $img_name;
        $nature_img->move($location, $img_name);
    
        $nature_img2 = $request->file('nature_image2');
        $img_name1 = hexdec(uniqid()) . "."  . $nature_img2->getClientOriginalExtension();
        $location2 = 'upload/nature/'; // Use a different variable name for the second image location
        $final_file2 = 'http://127.0.0.1:8000/upload/nature/' . $img_name1;
        $nature_img2->move($location2, $img_name1);
    
        Nature::insert([
           'nature_image' => $final_file1,
           'image_name' => $request->image_name,
           'short_desc' => $request->short_desc,
           'long_title' => $request->long_title,
           'long_desc' => $request->long_desc,
           'nature_image2' => $final_file2,
           'date' => $request->date,
           'client' => $request->client,
           'url' => $request->url,
        ]);
    
        $notification = [
            'message' => 'Nature Inserted Successfully',
            'alert-type' => 'success'
        ];
    
        return redirect()->route("list.nature")->with($notification);
    }
    

    public function EditNature($id){
        $result = Nature::find($id);
        return view('backend.nature.edit_nature',compact('result'));
    }

    public function UpdateNature(Request $request, $id)
    {

        $request->validate([
            "image_name" => "required",
            "short_desc" => "required",
            "long_title" => "required",
            "long_desc" => "required",
            "date" => "required",
            "client" => "required",
            "url" => "required",
            "nature_image" => "mimes:jpg,jpeg,png",
            "nature_image2" => "mimes:jpg,jpeg,png",
        ],[
            "nature_image.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            "nature_image2.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            'image_name.required' => 'Please enter image name',
            'short_desc.required' => 'Please enter short description',
            'long_title.required' => 'Please enter long title',
            'long_desc.required' => 'Please enter long description',
            'date.required' => 'Please enter date',
            'client.required' => 'Please enter client',
            'url.required' => 'Please enter url',
        ]);

        
        if ($request->file('nature_image') || $request->file('nature_image2')) {
            $project_img = $request->file('nature_image');
            $img_name1 = hexdec(uniqid()) . "." . $project_img->getClientOriginalExtension();
            $location1 = 'upload/nature/'; // Use a different variable name for the first image location
            $final_file1 = 'http://127.0.0.1:8000/upload/nature/' . $img_name1;
            $project_img->move($location1, $img_name1);
    
            $project_img2 = $request->file('nature_image2');
            $img_name2 = hexdec(uniqid()) . "." . $project_img2->getClientOriginalExtension();
            $location2 = 'upload/nature/'; // Use a different variable name for the second image location
            $final_file2 = 'http://127.0.0.1:8000/upload/nature/' . $img_name2;
            $project_img2->move($location2, $img_name2);
    
            Nature::findOrFail($id)->update([
                'nature_image' => $final_file1,
                'image_name' => $request->image_name,
                'short_desc' => $request->short_desc,
                'long_title' => $request->long_title,
                'long_desc' => $request->long_desc,
                'nature_image2' => $final_file2,
                'date' => $request->date,
                'client' => $request->client,
                'url' => $request->url,
            ]);
    
            $notification = [
                'message' => 'nature Updated Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route("list.nature")->with($notification);
        } else {
            Nature::findOrFail($id)->update([
                'image_name' => $request->image_name,
                'short_desc' => $request->short_desc,
                'long_title' => $request->long_title,
                'long_desc' => $request->long_desc,
                'nature_image2' => $request->nature_image2,
                'date' => $request->date,
                'client' => $request->client,
                'url' => $request->url,
            ]);
    
            $notification = [
                'message' => 'nature Updated without image Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route("list.nature")->with($notification);
        }
    }
    
    

    public function DeleteNature($id){
        Nature::find($id)->delete();
        $notification= array(
            'message'=> 'Nature Deleted Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route("list.nature")->with($notification);
    }

    

}
