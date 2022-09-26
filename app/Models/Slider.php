<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'key',
        'image',
    ];
    public $timestamps = false;
    protected $table = 'sliders';
}
