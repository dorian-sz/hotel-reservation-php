<?php

namespace App\Services;

use App\Http\Resources\RoomResource;
use App\Interfaces\IRoomDetails;
use App\Models\Room;
use App\Models\Size;

class RoomDetails implements IRoomDetails
{
    /**
     * @param Room $entity
     * @inheritDoc
     */
    public function getRoomCost($room)
    {
        $roomResource = new RoomResource($room);
        return $roomResource["cost"];
    }

    /**
     * @param Room $entity
     * @inheritDoc
     */
    public function getRoomSize($room)
    {
        return Size::query()->find($room->size_id);
    }

    public function getAvailableRooms()
    {
        return RoomResource::collection(Room::all()->where("available", "=", 1));
    }
}
