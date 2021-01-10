<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'type', 'number_of_seats', 'address', 'images'
    ];
    public function services(){
        return $this->belongsToMany('Service','room_services');
    }
    public function orders(){
        return $this->hasMany('Order');
    }

}
