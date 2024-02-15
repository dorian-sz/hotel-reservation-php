<?php

namespace App\Services;

use App\Http\Resources\RoomResource;
use App\Interfaces\IService;
use App\Models\Room;

class RoomService implements IService
{

    /**
     * @inheritDoc
     */
    public function add($entity)
    {
        return Room::query()->create([
            'cost' => $entity['cost'],
            'size' => $entity['size'],
            'available' => $entity['available'],
        ]);
    }

    /**
     * @param Room $entity
     * @inheritDoc
     */
    public function get($entity)
    {
        return Room::query()->find($entity);
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
