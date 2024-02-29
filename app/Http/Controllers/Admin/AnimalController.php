<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    public function SelectAllAnimal(){
        $result = Animal::all();
        return $result;
    }

   public function onSelectDetails($animalId){
        $result = Animal::where('id', $animalId)->get();
        return $result;
    }  
    public function SelectThreeImage()
    {
        try {
            $animalImages = Animal::take(3)->pluck('animal_image')->all();
    
            return $animalImages;
        } catch (\Exception $e) {
            // Log or handle the exception as needed
            return "An error occurred while fetching animal images.";
        }
    } 

    public function AllAnimal(){
        $result = Animal::all();
        return view('backend.animal.list_animal',compact('result'));
    }

    public function AddAnimal(){
        return view('backend.animal.add_animal');
    }

    public function StoreAnimal(Request $request){


        $request->validate([
            "image_name" => "required",
            "short_desc" => "required",
            "long_title" => "required",
            "long_desc" => "required",
            "date" => "required",
            "client" => "required",
            "url" => "required",
            "animal_image" => "mimes:jpg,jpeg,png",
            "animal_image2" => "mimes:jpg,jpeg,png",
        ],[
            "animal_image.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            "animal_image2.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            'image_name.required' => 'Please enter image name',
            'short_desc.required' => 'Please enter short description',
            'long_title.required' => 'Please enter long title',
            'long_desc.required' => 'Please enter long description',
            'date.required' => 'Please enter date',
            'client.required' => 'Please enter client',
            'url.required' => 'Please enter url',
        ]);

        $animal_img=$request->file('animal_image');
        $img_name=hexdec(uniqid()). "."  .$animal_img->getClientOriginalExtension();
        $location='upload/animal/';
        $final_file1='http://127.0.0.1:8000/upload/animal/'.$img_name;
        $animal_img->move($location,$img_name);

        $animal_img2=$request->file('animal_image2');
        $img_name1=hexdec(uniqid()). "."  .$animal_img2->getClientOriginalExtension();
        $location2='upload/animal/'; // Use a different variable name for the second image location
        $final_file2='http://127.0.0.1:8000/upload/animal/'.$img_name1;
        $animal_img2->move($location2,$img_name1);

        Animal::insert([    
            'animal_image'=>$final_file1,
            'image_name'=>$request->image_name,
            'short_desc'=>$request->short_desc,
             'long_title'=>$request->long_title,
             'long_desc'=>$request->long_desc,
             'animal_image2'=>$final_file2,
             'date'=>$request->date,
             'client'=>$request->client,
             'url'=>$request->url,
        ]);
        $notification= array(
            'message'=> 'Animal Inserted Successfully',
            'alert-type' => 'success'
           );
           return redirect()->route("list.animal")->with($notification);
    }

    public function EditAnimal($id){
        $result = Animal::find($id);
        return view('backend.animal.edit_animal',compact('result'));
    }

    public function UpdateAnimal(Request $request, $id)
    {

        $request->validate([
            "image_name" => "required",
            "short_desc" => "required",
            "long_title" => "required",
            "long_desc" => "required",
            "date" => "required",
            "client" => "required",
            "url" => "required",
            "animal_image" => "mimes:jpg,jpeg,png",
            "animal_image2" => "mimes:jpg,jpeg,png",
        ],[
            "animal_image.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            "animal_image2.mimes" => "The image must be a file of type: jpg, jpeg, png.",
            'image_name.required' => 'Please enter image name',
            'short_desc.required' => 'Please enter short description',
            'long_title.required' => 'Please enter long title',
            'long_desc.required' => 'Please enter long description',
            'date.required' => 'Please enter date',
            'client.required' => 'Please enter client',
            'url.required' => 'Please enter url',
        ]);

        if ($request->file('animal_image') || $request->file('animal_image2')) {
            $project_img = $request->file('animal_image');
            $img_name1 = hexdec(uniqid()) . "." . $project_img->getClientOriginalExtension();
            $location1 = 'upload/animal/'; // Use a different variable name for the first image location
            $final_file1 = 'http://127.0.0.1:8000/upload/animal/' . $img_name1;
            $project_img->move($location1, $img_name1);
    
            $project_img2 = $request->file('animal_image2');
            $img_name2 = hexdec(uniqid()) . "." . $project_img2->getClientOriginalExtension();
            $location2 = 'upload/animal/'; // Use a different variable name for the second image location
            $final_file2 = 'http://127.0.0.1:8000/upload/animal/' . $img_name2;
            $project_img2->move($location2, $img_name2);
    
            Animal::findOrFail($id)->update([
                'animal_image' => $final_file1,
                'image_name' => $request->image_name,
                'short_desc' => $request->short_desc,
                'long_title' => $request->long_title,
                'long_desc' => $request->long_desc,
                'animal_image2' => $final_file2,
                'date' => $request->date,
                'client' => $request->client,
                'url' => $request->url,
            ]);
    
            $notification = [
                'message' => 'animal Updated Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route("list.animal")->with($notification);
        } else {
            Animal::findOrFail($id)->update([
                'image_name' => $request->image_name,
                'short_desc' => $request->short_desc,
                'long_title' => $request->long_title,
                'long_desc' => $request->long_desc,
                'animal_image2' => $request->animal_image2,
                'date' => $request->date,
                'client' => $request->client,
                'url' => $request->url,
            ]);
    
            $notification = [
                'message' => 'animal Updated without image Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route("list.animal")->with($notification);
        }
    }

    public function DeleteAnimal($id){
        Animal::find($id)->delete();
        $notification= array(
            'message'=> 'Animal Deleted Successfully',
            'alert-type' => 'success'
           );
           return redirect()->route("list.animal")->with($notification);
    }

    
    

}
