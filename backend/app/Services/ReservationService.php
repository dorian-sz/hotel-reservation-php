<?php

namespace App\Services;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Interfaces\IService;
use App\Models\Reservation;

class ReservationService implements IService
{

    public function __construct(private readonly RoomService $roomService)
    {
    }

    /**
     * @param StoreReservationRequest $entity
     * @inheritDoc
     */
    public function add($entity)
    {
        return Reservation::query()->create([
            'total_cost' => $entity["total_cost"],
            'user_id' => $entity['user_id'],
        ]);
    }

    /**
     * @param Reservation $entity
     * @inheritDoc
     */
    public function get($entity)
    {
        return new Reservation($entity);
    }

    /**
     * @inheritDoc
     */
    public function getAll()
    {
        return ReservationResource::collection(Reservation::all());
    }

    /**
     * @param Reservation $id
     * @param Reservation $entity
     * @inheritDoc
     */
    public function update($updated, $entity)
    {
        $entity->update($updated);
        return new ReservationResource($entity);
    }

    /**
     * @param Reservation $entity
     * @inheritDoc
     */
    public function delete($entity)
    {
        return $entity->delete();
    }
}
