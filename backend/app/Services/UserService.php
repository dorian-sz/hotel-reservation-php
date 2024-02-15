<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Interfaces\IService;
use App\Models\User;

class UserService implements IService
{

    /**
     * @param User $entity
     * @inheritDoc
     */
    public function add($entity)
    {
        return User::query()->create([
            'first_name' => $entity['first_name'],
            'last_name' => $entity['last_name'],
            'email' => $entity['email'],
            'password' => bcrypt($entity['password'])
        ]);
    }

    /**
     * @param User $entity
     * @inheritDoc
     */
    public function get($entity)
    {
        return new UserResource($entity);
    }

    /**
     * @inheritDoc
     */
    public function getAll()
    {
        return UserResource::collection(User::all());
    }

    /**
     * @param int $id
     * @param User $entity
     * @inheritDoc
     */
    public function update($updated, $entity)
    {
        $entity->update($updated);
        return new UserResource($entity);
    }

    /**
     * @param User $entity
     * @inheritDoc
     */
    public function delete($entity)
    {
        return $entity->delete();
    }
}
