<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Services\RoomDetails;
use Illuminate\Http\Request;

class RoomDetailsController extends Controller
{
    public function __construct(private readonly RoomDetails $roomDetails)
    {
    }

    public function availableRooms()
    {
        return $this->roomDetails->getAvailableRooms();
    }

    public function getRoomCost(Room $room)
    {
        return $this->roomDetails->getRoomCost($room);
    }

    public function getRoomSize(Room $room)
    {
        return $this->roomDetails->getRoomCost($room);
    }

}
