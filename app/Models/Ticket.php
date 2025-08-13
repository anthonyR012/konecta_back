<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['user_id','flight_id','locator','seats','status'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function flight(){
        return $this->belongsTo(Flight::class);
    }
}
