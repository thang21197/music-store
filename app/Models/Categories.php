<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Categories extends Model
{ 
    protected $fillable = [
        'name',
    ];
    public $timestamps = false;
    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
