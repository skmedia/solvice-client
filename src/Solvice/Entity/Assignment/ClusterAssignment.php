<?php

namespace Solvice\Entity\Assignment;

use Solvice\Entity\Cluster;
use Solvice\Entity\Entity;

/**
 * Class ClusterAssignment
 *
 * @package Solvice\Entity\Assignment
 */
class ClusterAssignment
{
    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $indexInCluster;

    /**
     * @var Cluster
     */

    private $cluster;

    /**
     * @var Entity
     */
    private $entity;

    /**
     * ClusterAssignment constructor.
     *
     * @param         $id
     * @param         $indexInCluster
     * @param Cluster $cluster
     * @param Entity  $entity
     */
    public function __construct($id, $indexInCluster, Cluster $cluster, Entity $entity)
    {
        $this->id = $id;
        $this->indexInCluster = $indexInCluster;
        $this->cluster = $cluster;
        $this->entity = $entity;
    }

    /**
     * @param         $id
     * @param         $indexInCluster
     * @param Cluster $cluster
     * @param Entity  $entity
     *
     * @return static
     */
    public static function make($id, $indexInCluster, Cluster $cluster, Entity $entity)
    {
        return new static($id, $indexInCluster, $cluster, $entity);
    }

    /**
     * @param $array
     *
     * @return ClusterAssignment
     */
    public static function fromArray($array)
    {
        return static::make(
            $array['id'],
            $array['indexInCluster'],
            Cluster::fromArray($array['cluster']),
            Entity::fromArray($array['entity'])
        );
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return ClusterAssignment
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIndexInCluster()
    {
        return $this->indexInCluster;
    }

    /**
     * @param mixed $indexInCluster
     *
     * @return ClusterAssignment
     */
    public function setIndexInCluster($indexInCluster)
    {
        $this->indexInCluster = $indexInCluster;

        return $this;
    }

    /**
     * @return Cluster
     */
    public function getCluster()
    {
        return $this->cluster;
    }

    /**
     * @param Cluster $cluster
     *
     * @return ClusterAssignment
     */
    public function setCluster($cluster)
    {
        $this->cluster = $cluster;

        return $this;
    }

    /**
     * @return Entity
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param Entity $entity
     *
     * @return ClusterAssignment
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'indexInCluster' => $this->getIndexInCluster(),
            'cluster' => $this->getCluster()->toArray(),
            'entity' => $this->getEntity()->toArray(),
        ];
    }
}