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
     * @param int $id
     * @return T
     */
    public function get($entity);
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
