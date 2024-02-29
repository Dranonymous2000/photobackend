<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery_Details;

class Gallery_DetailsController extends Controller
{
    public function SelectAllGallery_Details(){
        $result = Gallery_Details::all();
        return $result;
    }
}
