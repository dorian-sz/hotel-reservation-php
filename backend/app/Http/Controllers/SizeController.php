<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use App\Services\SizeService;

class SizeController extends Controller
{
    public function __construct(private readonly SizeService $sizeService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sizeService->getAll();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSizeRequest $request)
    {
        $room = $request->validated();
        return $this->sizeService->add($room);
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        return $this->sizeService->get($size);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSizeRequest $request, Size $size)
    {
        $data = $request->validated();
        return $this->sizeService->update($data,$size);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        return $this->sizeService->delete($size);
    }
}
