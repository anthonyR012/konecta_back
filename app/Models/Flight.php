<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = [
        'code', 'origin', 'destination', 'departure_at','seats_total','seats_available','price'
    ];
    protected $casts = ['departure_at' => 'datetime'];

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
