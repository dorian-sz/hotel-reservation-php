<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Services\ReservationDetails;
use App\Services\ReservationService;
use App\Services\RoomService;

class ReservationController extends Controller
{
    public function __construct(private readonly ReservationService $reservationService,
                                private readonly RoomService $roomService,
                                private readonly ReservationDetails $reservationDetails)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->reservationService->getAll();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        $data = $request->validated();
        $rooms = [];
        foreach ($data["room_ids"] as $id){
            $room = $this->roomService->get($id);
            $rooms[] = $room;
        }
        $total_cost = $this->reservationDetails->calcTotal($rooms);
        $data["total_cost"] = $total_cost;
        return $this->reservationService->add($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $user)
    {
        return $this->reservationService->get($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $room)
    {
        $data = $request->validated();
        return $this->reservationService->update($data,$room);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $room)
    {
        return $this->reservationService->delete($room);
    }
}
