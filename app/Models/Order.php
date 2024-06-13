<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'item', 'name', 'location', 'contact', 'user_id', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deliver()
    {
        return $this->hasOne(Deliver::class);
    }

//    public function getStatusAttribute($status)
//    {
//        if ($status == 1){
//            return 'waiting';
//        }
//        elseif ($status == 2){
//            return 'on the way';
//        }
//        elseif ($status == 3){
//            return 'delayed';
//        }
//        elseif ($status == 4){
//            return 'done';
//        }
//        elseif ($status == 5){
//            return 'canceled';
//        }
//    }
}
