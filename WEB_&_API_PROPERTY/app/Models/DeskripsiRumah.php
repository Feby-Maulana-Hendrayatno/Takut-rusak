<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeskripsiRumah extends Model
{
    use HasFactory;

    protected $table = "deskripsi_rumah";

    protected $guarded = [''];

    public $timestamps = false;
}
