<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['cost', 'size', 'available', 'reservation_id'];
    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }
}
