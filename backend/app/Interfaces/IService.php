<?php

namespace App\Interfaces;

/**
 * @template T
 */
interface IService
{
    /**
     * @param T $entity
     * @return T
     */
    public function add($entity);
    /**
     * @param array $entities
     * @return ?T
     */
    public function get(array $entities);
    /**
     * @return array
     */
    public function getAll();
    /**
     * @param int $id
     * @param T $entity
     * @return boolean
     */
    public function update($updated, $entity);
    /**
     * @param int $id
     * @return boolean
     */
    public function delete($entity);
}
