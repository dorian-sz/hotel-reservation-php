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
        $total = $this->calculateTotal($entity["room_ids"]);
        return Reservation::query()->create([
            'total_cost' => $total,
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

    private function calculateTotal($room_ids)
    {
        $total = 0;
        foreach ($room_ids as $id){
            $room = $this->roomService->get($id);
            $total = $total + $room["total_cost"];
        }

        return $total;
    }
}
