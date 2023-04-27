<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookTour extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'bookings_tour'; 
    protected $dates = ['deleted_at'];
    protected $fillable = ['user_id'];
}