<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Costomer extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guarded = [];
    public function orders()
    {
        return $this->hasMany(Order::class, 'costomer_id');
    }
}
