<?php

namespace App\Http\Resources;

use App\Models\Reservation;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'size' => new SizeResource(Size::query()->find($this->size_id)),
            'cost' => $this->cost,
            'available' => (boolean)$this->available,
            'reservation_id' => $this->reservation_id
        ];
    }
}
