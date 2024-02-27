<?php

namespace App\Services;

use App\Http\Resources\RoomResource;
use App\Interfaces\IService;
use App\Models\Room;
use App\Traits\GetRoomsById;
use App\Traits\RoomDetails;

class RoomService implements IService
{
    use GetRoomsById;
    use RoomDetails;
    /**
     * @inheritDoc
     */
    public function add($entity)
    {
        return Room::query()->create([
            'cost' => $entity['cost'],
            'size_id' => $entity['size_id'],
            'available' => $entity['available'],
        ]);
    }

    /**
     * @param array $entities
     * @inheritDoc
     */
    public function get(array $entities)
    {
        if (isset($entities["id"])){
            return Room::query()->find($entities["id"]);
        }else if (isset($entities["entity"])){
            return new RoomResource($entities["entity"]);
        }
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getAll()
    {
        return RoomResource::collection(Room::all());
    }

    /**
     * @param Room $id
     * @param Room $entity
     * @inheritDoc
     */
    public function update($updated, $entity)
    {
        $entity->update($updated);
        return new RoomResource($entity);
    }

    /**
     * @param Room $entity
     * @inheritDoc
     */
    public function delete($entity)
    {
        return $entity->delete();
    }
}
