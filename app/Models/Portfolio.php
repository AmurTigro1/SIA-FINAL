<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{

    protected $fillable = ['name','description','imageUrl', 'status', 'rating'];
    use HasFactory;
}
