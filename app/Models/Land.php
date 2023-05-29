<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    use HasFactory;

    protected $table = 'farms';

    protected $fillable = ['name', 'address', 'area', 'way' , 'user_id', 'image'];

    public function reservations()
{
    return $this->hasMany(Reservation::class);
}

}
