<?php

namespace App\Services;

use App\Interfaces\IReservationDetails;

class ReservationDetails implements IReservationDetails
{

    public function calcTotal($rooms)
    {
        $total = 0;
        foreach ($rooms as $room){
            $total += $room['cost'];
        }

        return $total;
    }
}
