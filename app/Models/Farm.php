<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Farm extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = ['name', 'tel', 'email', 'address', 'password'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'user_id', 'id');
    }
    

    public function postedLands()
    {
        return $this->hasMany(Land::class, 'user_id');
    }

    
}

