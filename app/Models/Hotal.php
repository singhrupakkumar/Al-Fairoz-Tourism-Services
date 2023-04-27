<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotal extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'hotels'; 
    protected $guarded = [];
    protected $dates = ['deleted_at'];
}