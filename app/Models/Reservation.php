<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $fillable = ['user_id', 'land_id','reservation_date','reservation_time'];

    public function user()
    {
        return $this->belongsTo(Farm::class, 'user_id', 'id');
    }
    

    public function land()
    {
        return $this->belongsTo(Land::class, 'land_id');
    }
}
