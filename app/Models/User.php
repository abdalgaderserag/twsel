<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'type',
        'contact',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isStore()
    {
        if ($this->attributes['type'] == 1){
            return true;
        }
        return false;
    }

    public function isDriver()
    {
        if ($this->attributes['type'] == 2){
            return true;
        }
        return false;
    }

    public function isAdmin()
    {
        if ($this->attributes['type'] == 3){
            return true;
        }
        return false;
    }


    public function delivers()
    {
        return $this->hasMany(Deliver::class);
    }
}
