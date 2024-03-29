<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomResource;
use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Services\RoomService;

class RoomController extends Controller
{

    public function __construct(private readonly RoomService $roomService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->roomService->getAll();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        $room = $request->validated();
        return $this->roomService->add($room);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        $entities["entity"] = $room;
        return $this->roomService->get($entities);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        $data = $request->validated();
        return $this->roomService->update($data,$room);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        return $this->roomService->delete($room);
    }

    public function availableRooms()
    {
        return $this->roomService->getAvailableRooms();
    }

    public function getRoomCost(Room $room)
    {
        return $this->roomService->getRoomCost($room);
    }

    public function getRoomSize(Room $room)
    {
        return $this->roomService->getRoomCost($room);
    }
}
