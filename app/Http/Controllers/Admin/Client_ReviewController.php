<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client_Review;

class Client_ReviewController extends Controller
{
    public function SelectAllClientReview(){
        $result = Client_Review::all();
        return $result;
    }

    public function AllClientReview(){
        $result = Client_Review::all();
        return view('backend.client_review.list_review',compact('result'));
    }

    public function AddClientReview(){
        return view('backend.client_review.add_review');
    }

    public function StoreClientReview(Request $request){

        $request->validate([
            "client_name" => "required",
            "client_description" => "required",
            "client_image" => "mimes:jpg,jpeg,png",
            
        ],[
            "client_name.required" => "Client Name is required",
            "client_description.required" => "Client Description is required",
            "client_image.mimes" => "Client Image must be jpg,jpeg,png",
        ]);

        $review_img=$request->file('client_image');
        $img_name=hexdec(uniqid()). "."  .$review_img->getClientOriginalExtension();
        $location='upload/review/';
        $final_file1='http://127.0.0.1:8000/upload/review/'.$img_name;
        $review_img->move($location,$img_name);
    
    
        Client_Review::insert([    
           
            "client_name" => $request->client_name,
            "client_description" => $request->client_description,
            "client_image" => $final_file1,
         
       ]);
       $notification= array(
        'message'=> 'Review Inserted Successfully',
        'alert-type' => 'success'
       );
       return redirect()->route("list.review")->with($notification);
    }

    public function EditClientReview($id){
        $result = Client_Review::find($id);
        return view('backend.client_review.edit_review',compact('result'));
    }


    public function UpdateClientReview(Request $request,$id){

        $request->validate([
            "client_name" => "required",
            "client_description" => "required",
            "client_image" => "mimes:jpg,jpeg,png",
            
        ],[
            "client_name.required" => "Client Name is required",
            "client_description.required" => "Client Description is required",
            "client_image.mimes" => "Client Image must be jpg,jpeg,png",
        ]);

        if ($request->file('client_image')) {
        $review_img=$request->file('client_image');
        $img_name=hexdec(uniqid()). "."  .$review_img->getClientOriginalExtension();
        $location='upload/review/';
        $final_file1='http://127.0.0.1:8000/upload/review/'.$img_name;
        $review_img->move($location,$img_name);


        Client_Review::findOrFail($id)->update([
            "client_name" => $request->client_name,
            "client_description" => $request->client_description,
            "client_image" => $final_file1,
         
            ]);
    
            $notification = [
                'message' => 'Review Updated Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route("list.review")->with($notification);
        } else {
            Client_Review::findOrFail($id)->update([
                "client_name" => $request->client_name,
                "client_description" => $request->client_description,
            ]);
    
            $notification = [
                'message' => 'Review Updated without image Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route("list.review")->with($notification);
        }
    }

    public function DeleteClientReview($id){
        Client_Review::findOrFail($id)->delete();

        $notification = [
            'message' => 'Review Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route("list.review")->with($notification);
    }
    




    


}
