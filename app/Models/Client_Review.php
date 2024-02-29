<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_name',
        'client_description',
        'client_image',
    ];
}
