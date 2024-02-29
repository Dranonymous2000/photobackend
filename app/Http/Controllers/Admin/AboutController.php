<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\About;

class AboutController extends Controller
{
    public function SelectAllAbout(){
        $result = About::all();
        return $result;
    }

    public function SelectContact(){
        $result= About::select("city","email","phone","about_intro")->get();
        return $result;

    }

    public function AllAbout(){
        $result = About::all();
        return view('backend.about.list_about',compact('result'));
    }   

    public function AddAbout(){
        return view ('backend.about.add_about');
    }
    public function StoreAbout(Request $request){

        $request->validate([
            'about_title'=>'required',
            'about_description'=>'required',
            'about_intro'=>'required',
            'about_image'=>'required',
            'birthday'=>'required',
            'age'=>'required',
            'website'=>'required',
            'degree'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'city'=>'required',
            'freelance'=>'required',
            'about_longdescription'=>'required'
        ],[

            'about_title.required' => 'Please enter about title',
            'about_description.required' => 'Please enter about description',
            'about_intro.required' => 'Please enter about intro',
            'about_image.required' => 'Please enter about image',
            'birthday.required' => 'Please enter birthday',
            'age.required' => 'Please enter age',
            'website.required' => 'Please enter website',
            'degree.required' => 'Please enter degree',
            'email.required' => 'Please enter email',
            'phone.required' => 'Please enter phone',
            'city.required' => 'Please enter city',
            'freelance.required' => 'Please enter freelance',
            'about_longdescription.required' => 'Please enter about long description'
           
        ]);
        
        $about_img=$request->file('about_image');
        $img_name=hexdec(uniqid()). "."  .$about_img->getClientOriginalExtension();
        $location='upload/about/';
        $final_file='http://127.0.0.1:8000/upload/about/'.$img_name;
        $about_img->move($location,$img_name);

        About::insert([
            'about_title'=>$request['about_title'],
            'about_description'=>$request['about_description'],
            'about_intro'=>$request['about_intro'],
            'about_image'=>$final_file,
            'birthday'=>$request['birthday'],
            'age'=>$request['age'],
            'website'=>$request['website'],
            'degree'=>$request['degree'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],
            'city'=>$request['city'],
            'freelance'=>$request['freelance'],
            'about_longdescription'=>$request['about_longdescription']
            
        ]);
        $notification= array(
            'message'=> 'Information Inserted Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route("list.about")->with($notification);
    }

    public function EditAbout($id){
        $result = About::find($id);
        return view('backend.about.edit_about',compact('result'));
    }

    public function UpdateAbout(Request $request,$id){

        $request->validate([
            'about_title'=>'required',
            'about_description'=>'required',
            'about_intro'=>'required',
            'about_image'=>'required',
            'birthday'=>'required',
            'age'=>'required',
            'website'=>'required',
            'degree'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'city'=>'required',
            'freelance'=>'required',
            'about_longdescription'=>'required'
        ],[

            'about_title.required' => 'Please enter about title',
            'about_description.required' => 'Please enter about description',
            'about_intro.required' => 'Please enter about intro',
            'about_image.required' => 'Please enter about image',
            'birthday.required' => 'Please enter birthday',
            'age.required' => 'Please enter age',
            'website.required' => 'Please enter website',
            'degree.required' => 'Please enter degree',
            'email.required' => 'Please enter email',
            'phone.required' => 'Please enter phone',
            'city.required' => 'Please enter city',
            'freelance.required' => 'Please enter freelance',
            'about_longdescription.required' => 'Please enter about long description'
           
        ]);
        
        $about_img=$request->file('about_image');
        if($about_img){
            
            $img_name=hexdec(uniqid()). "."  .$about_img->getClientOriginalExtension();
            $location='upload/about/';
            $final_file='http://127.0.0.1:8000/upload/about/'.$img_name;
            $about_img->move($location,$img_name);
            
            About::find($id)->update([
                'about_title'=>$request['about_title'],
                'about_description'=>$request['about_description'],
                'about_intro'=>$request['about_intro'],
                'about_image'=>$final_file,
                'birthday'=>$request['birthday'],
                'age'=>$request['age'],
                'website'=>$request['website'],
                'degree'=>$request['degree'],
                'email'=>$request['email'],
                'phone'=>$request['phone'],
                'city'=>$request['city'],
                'freelance'=>$request['freelance'],
                'about_longdescription'=>$request['about_longdescription']
            ]);
            $notification= array(
                'message'=> 'Information Updated Succesfully',
                'alert-type' => 'success'
            );
            return redirect()->route("list.about")->with($notification);
        }else{
            About::find($id)->update([
                'about_title'=>$request['about_title'],
                'about_description'=>$request['about_description'],
                'about_intro'=>$request['about_intro'],
                'birthday'=>$request['birthday'],
                'age'=>$request['age'],
                'website'=>$request['website'],
                'degree'=>$request['degree'],
                'email'=>$request['email'],
                'phone'=>$request['phone'],
                'city'=>$request['city'],
                'freelance'=>$request['freelance'],
                'about_longdescription'=>$request['about_longdescription']
            ]);
            $notification= array(
                'message'=> 'Information Updated Succesfully',
                'alert-type' => 'success'
            );
            return redirect()->route("list.about")->with($notification);
        }
    }

    public function DeleteAbout($id){
        About::find($id)->delete();
        $notification= array(
            'message'=> 'Information Deleted Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route("list.about")->with($notification);
    }
}
