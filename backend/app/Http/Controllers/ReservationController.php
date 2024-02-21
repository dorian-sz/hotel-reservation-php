<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Services\ReservationDetails;
use App\Services\ReservationService;
use App\Services\RoomService;
use App\Services\UserService;

class ReservationController extends Controller
{
    public function __construct(private readonly ReservationService $reservationService,
                                private readonly RoomService $roomService,
                                private readonly ReservationDetails $reservationDetails,
                                private readonly UserService $userService
    )
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

        $user = $this->userService->get(["id" =>$data['user_id']]);

        if (!$user){
            return response('User not found', 404);
        }

        foreach ($data["room_ids"] as $id){
            $room = $this->roomService->get(["id" => $id]);
            $room->update(["available"=>0]);
            $data["rooms"][] = $room;
        }
        $total_cost = $this->reservationDetails->calcTotal($data["rooms"]);
        $data["total_cost"] = $total_cost;

        return $this->reservationService->add($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return $this->reservationService->get($reservation);
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
    public function destroy(Reservation $reservation)
    {
        foreach ($reservation->rooms as $room){
            $room->update(["available"=>1]);
        }
        return $this->reservationService->delete($reservation);
    }
}
