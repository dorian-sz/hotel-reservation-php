<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['cost', 'size_id', 'available', 'reservation_id'];
    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }
    public function size()
    {
        return $this->hasOne(Size::class);
    }
}
