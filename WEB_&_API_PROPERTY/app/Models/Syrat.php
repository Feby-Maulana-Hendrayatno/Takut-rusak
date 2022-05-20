<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syrat extends Model
{
    use HasFactory;
    protected $table = "syarat";
    protected $guarded = [""];

    public $timestamps = false;
}
