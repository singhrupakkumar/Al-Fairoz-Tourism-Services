<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'duration',
        'price',
        'tour_type',
        'tour_category_id',
        'description',
    ];
    protected $dates = ['deleted_at'];
}