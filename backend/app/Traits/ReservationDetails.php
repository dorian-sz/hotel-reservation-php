<?php

namespace App\Traits;

use App\Http\Resources\ReservationResource;
use App\Models\User;

trait ReservationDetails
{
    public function calcTotal($rooms)
    {
        $total = 0;
        foreach ($rooms as $room){
            $total += $room['cost'];
        }

        return $total;
    }

    public function getUserReservations($user)
    {
        return ReservationResource::collection($user->reservations);
    }
}
