<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\People;

class PeopleController extends Controller
{
    public function SelectAllPeople(){
        $result = People::all();
        return $result;
    }
    public function onSelectDetails($peopleId){
        $result = People::where('id', $peopleId)->get();
        return $result;
    }
    public function SelectThreeImage()
    {
        try {
            $peopleImages = People::take(3)->pluck('people_image')->all();
    
            return $peopleImages;
        } catch (\Exception $e) {
            // Log or handle the exception as needed
            return "An error occurred while fetching people images.";
        }
    }

    public function AllPeople(){
        $result = People::all();
        return view('backend.people.list_people',compact('result'));
    }

    public function AddPeople(){
        return view('backend.people.add_people');
    }

    public function StorePeople(Request $request){

        $request->validate([
            "image_name" => "required",
            "short_desc" => "required",
            "long_title" => "required",
            "long_desc" => "required",
            "date" => "required",
            "client" => "required",
            "url" => "required",
            "people_image" => "mimes:jpg,jpeg,png",
            "people_image2" => "mimes:jpg,jpeg,png",
        ],[
            "people_image.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            "people_image2.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            'image_name.required' => 'Please enter image name',
            'short_desc.required' => 'Please enter short description',
            'long_title.required' => 'Please enter long title',
            'long_desc.required' => 'Please enter long description',
            'date.required' => 'Please enter date',
            'client.required' => 'Please enter client',
            'url.required' => 'Please enter url',
        ]);

        $people_img=$request->file('people_image');
        $img_name=hexdec(uniqid()). "."  .$people_img->getClientOriginalExtension();
        $location='upload/people/';
        $final_file1='http://127.0.0.1:8000/upload/people/'.$img_name;
        $people_img->move($location,$img_name);
    
        $people_img2=$request->file('people_image2');
        $img_name1=hexdec(uniqid()). "."  .$people_img2->getClientOriginalExtension();
        $location2='upload/people/'; // Use a different variable name for the second image location
        $final_file2='http://127.0.0.1:8000/upload/people/'.$img_name1;
        $people_img2->move($location2,$img_name1);
    
        People::insert([    
           'people_image'=>$final_file1,
           'image_name'=>$request->image_name,
           'short_desc'=>$request->short_desc,
            'long_title'=>$request->long_title,
            'long_desc'=>$request->long_desc,
            'people_image2'=>$final_file2,
            'date'=>$request->date,
            'client'=>$request->client,
            'url'=>$request->url,
       ]);
       $notification= array(
        'message'=> 'people Inserted Successfully',
        'alert-type' => 'success'
       );
       return redirect()->route("list.people")->with($notification);
    }

    public function EditPeople($id){
        $result = People::find($id);
        return view('backend.people.edit_people',compact('result'));
    }

    public function UpdatePeople(Request $request, $id)
    {

        $request->validate([
            "image_name" => "required",
            "short_desc" => "required",
            "long_title" => "required",
            "long_desc" => "required",
            "date" => "required",
            "client" => "required",
            "url" => "required",
            "people_image" => "mimes:jpg,jpeg,png",
            "people_image2" => "mimes:jpg,jpeg,png",
        ],[
            "people_image.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            "people_image2.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            'image_name.required' => 'Please enter image name',
            'short_desc.required' => 'Please enter short description',
            'long_title.required' => 'Please enter long title',
            'long_desc.required' => 'Please enter long description',
            'date.required' => 'Please enter date',
            'client.required' => 'Please enter client',
            'url.required' => 'Please enter url',
        ]);

        
        if ($request->file('people_image') || $request->file('people_image2')) {
            $project_img = $request->file('people_image');
            $img_name1 = hexdec(uniqid()) . "." . $project_img->getClientOriginalExtension();
            $location1 = 'upload/people/'; // Use a different variable name for the first image location
            $final_file1 = 'http://127.0.0.1:8000/upload/people/' . $img_name1;
            $project_img->move($location1, $img_name1);
    
            $project_img2 = $request->file('people_image2');
            $img_name2 = hexdec(uniqid()) . "." . $project_img2->getClientOriginalExtension();
            $location2 = 'upload/people/'; // Use a different variable name for the second image location
            $final_file2 = 'http://127.0.0.1:8000/upload/people/' . $img_name2;
            $project_img2->move($location2, $img_name2);
    
            People::findOrFail($id)->update([
                'people_image' => $final_file1,
                'image_name' => $request->image_name,
                'short_desc' => $request->short_desc,
                'long_title' => $request->long_title,
                'long_desc' => $request->long_desc,
                'people_image2' => $final_file2,
                'date' => $request->date,
                'client' => $request->client,
                'url' => $request->url,
            ]);
    
            $notification = [
                'message' => 'people Updated Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route("list.people")->with($notification);
        } else {
            People::findOrFail($id)->update([
                'image_name' => $request->image_name,
                'short_desc' => $request->short_desc,
                'long_title' => $request->long_title,
                'long_desc' => $request->long_desc,
                'people_image2' => $request->people_image2,
                'date' => $request->date,
                'client' => $request->client,
                'url' => $request->url,
            ]);
    
            $notification = [
                'message' => 'people Updated without image Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route("list.people")->with($notification);
        }
    }

        public function DeletePeople($id){
            People::findOrFail($id)->delete();
            $notification = [
                'message' => 'people Deleted Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route("list.people")->with($notification);
        }
    
    }

    


