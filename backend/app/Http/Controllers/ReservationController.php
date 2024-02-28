<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateReservationRequest;
use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Models\User;
use App\Services\ReservationService;
use App\Services\RoomService;
use App\Services\UserService;

class ReservationController extends Controller
{
    public function __construct(private readonly ReservationService $reservationService,
                                private readonly RoomService $roomService,
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

        $rooms = $this->roomService->roomsById($data["room_ids"]);

        foreach ($rooms as $room){
            $room->update(["available"=>0]);
            $data["rooms"][] = $room;
        }

        $total_cost = $this->reservationService->calcTotal($data["rooms"]);
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

    public function showUserReservation(User $user)
    {
        return $this->reservationService->getUserReservations($user);
    }
}
