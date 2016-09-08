<?php

namespace Solvice\Collection;

use Solvice\Entity\Entity;

/**
 * Class EntityCollection
 *
 * @package Solvice
 */
class EntityCollection extends Collection
{
    /**
     * @param Entity $entity
     *
     * @return bool
     */
    public function add($entity)
    {
        if (!$entity instanceof Entity) {
            throw new \InvalidArgumentException('Not an entity');
        }

        return parent::add($entity);
    }

    /**
     * @param $data
     *
     * @return static
     */
    public static function fromArray($data)
    {
        $collection = new static;
        foreach ($data['entities'] as $entity) {
            $collection->add(Entity::make(
                $entity['name'],
                $entity['cluster_type']
            ));
        }
        return $collection;
    }
}