<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsTo(category::class, 'category_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id');
    }
}
