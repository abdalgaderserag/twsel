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
        $user = $this->belongsTo(User::class);
        if ($user->isStore())
            return $user;
        else {
            Log::info(var_dump($this) . ' dont belong to a store.');
        }
    }

    public function getStatusAttribute($status)
    {
        if ($status == 1){
            return 'waiting';
        }
        elseif ($status == 2){
            return 'on the way';
        }
        elseif ($status == 3){
            return 'delayed';
        }
        elseif ($status == 4){
            return 'done';
        }
        elseif ($status == 5){
            return 'canceled';
        }
    }
}
