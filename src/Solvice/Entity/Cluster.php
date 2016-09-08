<?php

namespace Solvice\Entity;

/**
 * Class Cluster
 *
 * @package Solvice\Entity
 */
class Cluster
{
    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $clusterType;

    /**
     * @var
     */
    private $size;

    /**
     * @param $name
     * @param $clusterType
     * @param $size
     *
     * @return static
     */
    public static function make($name, $clusterType, $size)
    {
        return new static($name, $clusterType, $size);
    }

    /**
     * @param $array
     *
     * @return static
     */
    public static function fromArray($array)
    {
        return new static(
            $array['name'],
            $array['cluster_type'],
            $array['size']
        );
    }

    /**
     * Cluster constructor.
     *
     * @param $name
     * @param $clusterType
     * @param $size
     */
    public function __construct($name, $clusterType, $size)
    {
        $this->name = $name;
        $this->clusterType = $clusterType;
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return Cluster
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getClusterType()
    {
        return $this->clusterType;
    }

    /**
     * @param mixed $clusterType
     *
     * @return Cluster
     */
    public function setClusterType($clusterType)
    {
        $this->clusterType = $clusterType;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     *
     * @return Cluster
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'cluster_type' => $this->getClusterType(),
            'size' => $this->getSize(),
        ];
    }
}