<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryDesc;

class GalleryDescController extends Controller
{
    public function SelectAllGalleryDesc(){
        $result = GalleryDesc::all();
        return $result;
    }
}
