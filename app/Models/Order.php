<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory,HasUuids;
    protected $fillable=[
        'item', 'pickup', 'location', 'contact', 'user_id', 'status'
    ];

    protected $guarded = [
        'token'
    ];

    public function createToken()
    {
        $token = fake()->sha256();
        if (DB::table('orders')->where('token', '=', $token)->exists()){
            $this->createToken();
        }
        return $token;
    }

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
