<?php

namespace App\Services;

use App\Http\Resources\SizeResource;
use App\Interfaces\IService;
use App\Models\Size;

class SizeService implements IService
{

    /**
     * @inheritDoc
     */
    public function add($entity)
    {
        return Size::query()->create([
            'size_name' => $entity['size_name'],
        ]);
    }

    /**
     * @param array $entities
     * @inheritDoc
     */
    public function get(array $entities)
    {
        if (isset($entities["id"])){
            return new SizeResource(Size::query()->find($entities["id"]));
        }
        if (isset($entities["entity"])){
            return new SizeResource($entities["entity"]);
        }
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getAll()
    {
        return SizeResource::collection(Size::all());
    }

    /**
     * @param Size $updated
     * @param Size $entity
     * @inheritDoc
     */
    public function update($updated, $entity)
    {
        $entity->update($updated);
        return new SizeResource($entity);
    }

    /**
     * @param Size $entity
     * @inheritDoc
     */
    public function delete($entity)
    {
        return $entity->delete();
    }
}
