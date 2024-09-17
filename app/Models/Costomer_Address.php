<?php

namespace App\Models;

// use Laravel\Cashier\Billable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costomer_Address extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function countries()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function states()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
    public function cities()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function costomers()
    {
        return $this->belongsTo(Costomer::class, 'costomer_id');
    }
}
