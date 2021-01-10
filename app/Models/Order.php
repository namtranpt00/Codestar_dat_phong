<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_id', 'user_id', 'time_start','time_end','status','note'
    ];
    protected $casts = [
        'time_start' => 'datetime',
        'time_end' => 'datetime'
    ];
    public function room(){
        return $this->belongsTo('Room','room_id');
    }

    public function user(){
        return $this->hasOne('User','id','user_id');
    }

    public function services()
    {
        return $this->belongsToMany('Service','order_details','order_id','service_id')->withTimestamps();
    }

    public function orderDetails()
    {
        return $this->hasMany('OrderDetail','order_id','id');
    }
}
