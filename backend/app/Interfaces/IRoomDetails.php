<?php

namespace App\Interfaces;

interface IRoomDetails
{
    public function getRoomCost($room);
    public function getRoomSize($room);
    public function getAvailableRooms();
}
