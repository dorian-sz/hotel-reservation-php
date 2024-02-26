<?php

namespace App\Traits;

use App\Http\Resources\RoomResource;
use App\Models\Room;

trait GetRoomsById
{
    public function roomsById($ids){
        return RoomResource::collection(Room::query()->findMany($ids));
    }
}
