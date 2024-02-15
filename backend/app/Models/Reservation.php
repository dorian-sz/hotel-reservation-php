<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['total_cost', 'user_id'];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
