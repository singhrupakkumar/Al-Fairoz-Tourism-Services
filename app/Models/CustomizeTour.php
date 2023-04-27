<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomizeTour extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tour_customizations';
    protected static $recordEvents = ['created', 'updated'];
    protected static $logFillable = true;
    protected $fillable = [
        'name',
        'email',
        'country',
        'duration_days',
        'no_of_travellers',
        'date_of_arrival',
        'date_of_departure',
        'date_arrival',
        'place_one',
        'created_at',
        'updated_at',
    ];
    protected $dates = ['deleted_at'];
}