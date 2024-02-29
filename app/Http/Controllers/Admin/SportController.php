<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sport;

class SportController extends Controller
{
    public function SelectAllSport(){
        $result = Sport::all();
        return $result;
    }
    public function onSelectDetails($sportId){
        $result = Sport::where('id', $sportId)->get();
        return $result;
    }
    public function SelectThreeImage()
    {
        try {
            $sportImages = Sport::take(3)->pluck('sport_image')->all();
    
            return $sportImages;
        } catch (\Exception $e) {
            // Log or handle the exception as needed
            return "An error occurred while fetching sport images.";
        }
    }

    public function AllSport(){
        $result = Sport::all();
        return view('backend.sport.list_sport',compact('result'));
    }

    public function AddSport(){
        return view('backend.sport.add_sport');
    }

    public function StoreSport(Request $request){

        $request->validate([
            "image_name" => "required",
            "short_desc" => "required",
            "long_title" => "required",
            "long_desc" => "required",
            "date" => "required",
            "client" => "required",
            "url" => "required",
            "sport_image" => "mimes:jpg,jpeg,png",
            "sport_image2" => "mimes:jpg,jpeg,png",
        ],[
            "sport_image.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            "sport_image2.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            'image_name.required' => 'Please enter image name',
            'short_desc.required' => 'Please enter short description',
            'long_title.required' => 'Please enter long title',
            'long_desc.required' => 'Please enter long description',
            'date.required' => 'Please enter date',
            'client.required' => 'Please enter client',
            'url.required' => 'Please enter url',
        ]);
        

        $sport_img=$request->file('sport_image');
        $img_name=hexdec(uniqid()). "."  .$sport_img->getClientOriginalExtension();
        $location='upload/sport/';
        $final_file1='http://127.0.0.1:8000/upload/sport/'.$img_name;
        $sport_img->move($location,$img_name);
    
        $sport_img2=$request->file('sport_image2');
        $img_name1=hexdec(uniqid()). "."  .$sport_img2->getClientOriginalExtension();
        $location2='upload/sport/'; // Use a different variable name for the second image location
        $final_file2='http://127.0.0.1:8000/upload/sport/'.$img_name1;
        $sport_img2->move($location2,$img_name1);
    
        Sport::insert([    
           'sport_image'=>$final_file1,
           'image_name'=>$request->image_name,
           'short_desc'=>$request->short_desc,
            'long_title'=>$request->long_title,
            'long_desc'=>$request->long_desc,
            'sport_image2'=>$final_file2,
            'date'=>$request->date,
            'client'=>$request->client,
            'url'=>$request->url,
       ]);
       $notification= array(
        'message'=> 'sport Inserted Successfully',
        'alert-type' => 'success'
       );
       return redirect()->route("list.sport")->with($notification);
    }

    public function EditSport($id){
        $result = Sport::find($id);
        return view('backend.sport.edit_sport',compact('result'));
    }

    public function UpdateSport(Request $request, $id)
    {
        $request->validate([
            "image_name" => "required",
            "short_desc" => "required",
            "long_title" => "required",
            "long_desc" => "required",
            "date" => "required",
            "client" => "required",
            "url" => "required",
            "sport_image" => "mimes:jpg,jpeg,png",
            "sport_image2" => "mimes:jpg,jpeg,png",
        ],[
            "sport_image.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            "sport_image2.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            'image_name.required' => 'Please enter image name',
            'short_desc.required' => 'Please enter short description',
            'long_title.required' => 'Please enter long title',
            'long_desc.required' => 'Please enter long description',
            'date.required' => 'Please enter date',
            'client.required' => 'Please enter client',
            'url.required' => 'Please enter url',
        ]);

        if ($request->file('sport_image') || $request->file('sport_image2')) {
            $project_img = $request->file('sport_image');
            $img_name1 = hexdec(uniqid()) . "." . $project_img->getClientOriginalExtension();
            $location1 = 'upload/sport/'; // Use a different variable name for the first image location
            $final_file1 = 'http://127.0.0.1:8000/upload/sport/' . $img_name1;
            $project_img->move($location1, $img_name1);
    
            $project_img2 = $request->file('sport_image2');
            $img_name2 = hexdec(uniqid()) . "." . $project_img2->getClientOriginalExtension();
            $location2 = 'upload/sport/'; // Use a different variable name for the second image location
            $final_file2 = 'http://127.0.0.1:8000/upload/sport/' . $img_name2;
            $project_img2->move($location2, $img_name2);
    
            Sport::findOrFail($id)->update([
                'sport_image' => $final_file1,
                'image_name' => $request->image_name,
                'short_desc' => $request->short_desc,
                'long_title' => $request->long_title,
                'long_desc' => $request->long_desc,
                'sport_image2' => $final_file2,
                'date' => $request->date,
                'client' => $request->client,
                'url' => $request->url,
            ]);
    
            $notification = [
                'message' => 'sport Updated Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route("list.sport")->with($notification);
        } else {
            Sport::findOrFail($id)->update([
                'image_name' => $request->image_name,
                'short_desc' => $request->short_desc,
                'long_title' => $request->long_title,
                'long_desc' => $request->long_desc,
                'sport_image2' => $request->sport_image2,
                'date' => $request->date,
                'client' => $request->client,
                'url' => $request->url,
            ]);
    
            $notification = [
                'message' => 'sport Updated without image Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route("list.sport")->with($notification);
        }
    }
}
