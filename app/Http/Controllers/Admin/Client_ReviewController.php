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
}
