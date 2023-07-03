<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'name',
    //     'mode',
    //     'gst',
    //     'pan',
    //     'brand',
    //     'establishment',
    //     'anualsale_start',
    //     'anualsale_end',
    //     'anualsale_unit',
    //     'total_distributors',
    //     'space',
    //     'logo',
    //     'address',
    //     'city',
    //     'state',
    //     'zip',
    //     'about',
    //     'type_distributorship'
    // ];

    protected $guarded = ['id'];

    // protected function type_distributorship(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => json_decode($value, true),
    //         set: fn ($value) => json_encode($value),
    //     );
    // } 
}
