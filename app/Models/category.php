<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Category::class, 'category_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'categorie_id');
    }
}
