<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory;
    use Notifiable;
    protected $guarded = [];
    public function categories()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function costomers()
    {
        return $this->belongsTo(Costomer::class, 'costomer_id');
    }
}
