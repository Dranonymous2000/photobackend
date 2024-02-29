<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Price;

class PriceController extends Controller
{
    public function SelectPrice(){
        $result = Price::all();
        return $result;
    }
    public function SelectSix(){
        $result = Price::limit(6)->get();
        return $result;
    }
    public function AllPrice(){
        $result = Price::all();
        return view('backend.price.list_price',compact('result'));
    }
    public function AddPrice(){
        return view ('backend.price.add_price');
    }

    public function StorePrice(Request $request){

        $request->validate([
            'price_amount'=>'required',
            'price_description'=>'required',
        ],[
            'price_amount.required' => 'Please enter price amount',
            'price_description.required' => 'Please enter price description',
        ]);

        Price::insert([
            'price_amount'=>$request['price_amount'], 
            'price_description'=>$request['price_description'],
            
        ]);
        
        $notification= array(
            'message'=> 'Price Inserted Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route("list.price")->with($notification);
    }
    public function EditPrice($id){
        $result = Price::find($id);
        return view('backend.price.edit_price',compact('result'));
    }

    public function UpdatePrice(Request $request,$id){

        $request->validate([
            'price_amount'=>'required',
            'price_description'=>'required',
        ],[
            'price_amount.required' => 'Please enter price amount',
            'price_description.required' => 'Please enter price description',
        ]);
        
        Price::find($id)->update([
            'price_amount'=>$request['price_amount'], 
            'price_description'=>$request['price_description'],
        ]);
        $notification= array(
            'message'=> 'Price Updated Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route("list.price")->with($notification);
    }

    public function DeletePrice($id){
        Price::find($id)->delete();
        $notification= array(
            'message'=> 'Price Deleted Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route("list.price")->with($notification);
    }

}
