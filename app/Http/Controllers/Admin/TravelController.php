<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Travel;

class TravelController extends Controller
{
    public function SelectAllTravel(){
        $result = Travel::all();
        return $result;
    }
    public function onSelectDetails($travelId){
        $result = Travel::where('id', $travelId)->get();
        return $result;
    }
    public function SelectThreeImage()
    {
        try {
            $travelImages = Travel::take(3)->pluck('travel_image')->all();
    
            return $travelImages;
        } catch (\Exception $e) {
            // Log or handle the exception as needed
            return "An error occurred while fetching travel images.";
        }
    }

    public function AllTravel(){
        $result = Travel::all();
        return view('backend.travel.list_travel',compact('result'));
    }

    public function AddTravel(){
        return view('backend.travel.add_travel');
    }

    public function StoreTravel(Request $request){

        $request->validate([
            "image_name" => "required",
            "short_desc" => "required",
            "long_title" => "required",
            "long_desc" => "required",
            "date" => "required",
            "client" => "required",
            "url" => "required",
            "travel_image" => "mimes:jpg,jpeg,png",
            "travel_image2" => "mimes:jpg,jpeg,png",
        ],[
            "travel_image.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            "travel_image2.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            'image_name.required' => 'Please enter image name',
            'short_desc.required' => 'Please enter short description',
            'long_title.required' => 'Please enter long title',
            'long_desc.required' => 'Please enter long description',
            'date.required' => 'Please enter date',
            'client.required' => 'Please enter client',
            'url.required' => 'Please enter url',
        ]);

        $travel_img=$request->file('travel_image');
        $img_name=hexdec(uniqid()). "."  .$travel_img->getClientOriginalExtension();
        $location='upload/travel/';
        $final_file1='http://127.0.0.1:8000/upload/travel/'.$img_name;
        $travel_img->move($location,$img_name);
    
        $travel_img2=$request->file('travel_image2');
        $img_name1=hexdec(uniqid()). "."  .$travel_img2->getClientOriginalExtension();
        $location2='upload/travel/'; // Use a different variable name for the second image location
        $final_file2='http://127.0.0.1:8000/upload/travel/'.$img_name1;
        $travel_img2->move($location2,$img_name1);
    
        Travel::insert([    
           'travel_image'=>$final_file1,
           'image_name'=>$request->image_name,
           'short_desc'=>$request->short_desc,
            'long_title'=>$request->long_title,
            'long_desc'=>$request->long_desc,
            'travel_image2'=>$final_file2,
            'date'=>$request->date,
            'client'=>$request->client,
            'url'=>$request->url,
       ]);
       $notification= array(
        'message'=> 'Travel Inserted Successfully',
        'alert-type' => 'success'
       );
       return redirect()->route("list.travel")->with($notification);
    }
    

    public function EditTravel($id){
        $result = Travel::find($id);
        return view('backend.travel.edit_travel',compact('result'));
    }

    public function UpdateTravel(Request $request, $id)
    {

        $request->validate([
            "image_name" => "required",
            "short_desc" => "required",
            "long_title" => "required",
            "long_desc" => "required",
            "date" => "required",
            "client" => "required",
            "url" => "required",
            "travel_image" => "mimes:jpg,jpeg,png",
            "travel_image2" => "mimes:jpg,jpeg,png",
        ], [
            "travel_image.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            "travel_image2.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            'image_name.required' => 'Please enter image name',
            'short_desc.required' => 'Please enter short description',
            'long_title.required' => 'Please enter long title',
            'long_desc.required' => 'Please enter long description',
            'date.required' => 'Please enter date',
            'client.required' => 'Please enter client',
            'url.required' => 'Please enter url',
        ]);

        if ($request->file('travel_image') || $request->file('travel_image2')) {
            $project_img = $request->file('travel_image');
            $img_name1 = hexdec(uniqid()) . "." . $project_img->getClientOriginalExtension();
            $location1 = 'upload/travel/'; // Use a different variable name for the first image location
            $final_file1 = 'http://127.0.0.1:8000/upload/travel/' . $img_name1;
            $project_img->move($location1, $img_name1);
    
            $project_img2 = $request->file('travel_image2');
            $img_name2 = hexdec(uniqid()) . "." . $project_img2->getClientOriginalExtension();
            $location2 = 'upload/travel/'; // Use a different variable name for the second image location
            $final_file2 = 'http://127.0.0.1:8000/upload/travel/' . $img_name2;
            $project_img2->move($location2, $img_name2);
    
            Travel::findOrFail($id)->update([
                'travel_image' => $final_file1,
                'image_name' => $request->image_name,
                'short_desc' => $request->short_desc,
                'long_title' => $request->long_title,
                'long_desc' => $request->long_desc,
                'travel_image2' => $final_file2,
                'date' => $request->date,
                'client' => $request->client,
                'url' => $request->url,
            ]);
    
            $notification = [
                'message' => 'Travel Updated Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route("list.travel")->with($notification);
        } else {
            Travel::findOrFail($id)->update([
                'image_name' => $request->image_name,
                'short_desc' => $request->short_desc,
                'long_title' => $request->long_title,
                'long_desc' => $request->long_desc,
                'travel_image2' => $request->travel_image2,
                'date' => $request->date,
                'client' => $request->client,
                'url' => $request->url,
            ]);
    
            $notification = [
                'message' => 'Travel Updated without image Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route("list.travel")->with($notification);
        }
    }
    

    // public function UpdateTravel(Request $request,$id){

    //     $travel_img=$request->file('travel_image');
    //     $travel_img2=$request->file('travel_image2');

    //     if($travel_img || $travel_img2){

    //         $img_name=hexdec(uniqid()). "."  .$travel_img->getClientOriginalExtension();
    //         $location='upload/travel/';
    //         $final_file1='http://127.0.0:8000/upload/travel/'.$img_name;
    //         $travel_img->move($location,$img_name);

    //         $img_name1=hexdec(uniqid()). "."  .$travel_img2->getClientOriginalExtension();
    //         $location='upload/travel/';
    //         $final_file2='http://127.0.0:8000/upload/travel/'.$img_name1;
    //         $travel_img2->move($location,$img_name);
            
    //         Travel::find($id)->update([
    //             'travel_image'=>$final_file1,
    //             'image_name'=>$request->image_name,
    //             'short_desc'=>$request->short_desc,
    //             'long_title'=>$request->long_title,
    //             'long_desc'=>$request->long_desc,
    //             'travel_image2'=>$final_file2,
    //             'date'=>$request->date,
    //             'client'=>$request->client,
    //             'url'=>$request->url,
    //         ]);
    //         $notification= array(
    //             'message'=> 'travel Updated Succesfully',
    //             'alert-type' => 'success'
    //         );
    //         return redirect()->route("list.travel")->with($notification);
        
    //     }else{
    //         Travel::find($id)->update([
    //             'image_name'=>$request->image_name,
    //             'short_desc'=>$request->short_desc,
    //             'long_title'=>$request->long_title,
    //             'long_desc'=>$request->long_desc,
    //             'date'=>$request->date,
    //             'client'=>$request->client,
    //             'url'=>$request->url,
    //         ]);
    //         $notification= array(
    //             'message'=> 'Travel Updated Succesfully',
    //             'alert-type' => 'success'
    //         );
    //         return redirect()->route("list.travel")->with($notification);
    //     }
    // }

    public function DeleteTravel($id){
        Travel::find($id)->delete();
        $notification= array(
            'message'=> 'Travel Deleted Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route("list.travel")->with($notification);
    }
}
