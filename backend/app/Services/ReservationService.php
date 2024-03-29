<?php

namespace App\Services;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Interfaces\IService;
use App\Models\Reservation;
use App\Traits\ReservationDetails;

class ReservationService implements IService
{
    use ReservationDetails;
    public function __construct(private readonly RoomService $roomService)
    {
    }

    /**
     * @param StoreReservationRequest $entity
     * @inheritDoc
     */
    public function add($entity)
    {
        $reservation = Reservation::query()->create([
            'total_cost' => $entity["total_cost"],
            'user_id' => $entity['user_id'],
        ]);
        $reservation->rooms()->saveMany($entity["rooms"]);

        return $reservation;
    }

    /**
     * @param array $entities
     * @inheritDoc
     */
    public function get(array $entities)
    {
        if (isset($entities["id"])){
            return new ReservationResource(Reservation::query()->find($entities["id"]));
        }
        if (isset($entities["entity"])){
            return new ReservationResource($entities["entity"]);
        }
        return null;
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
