<?php

namespace Solvice\Entity;

use Solvice\Collection\AttributeCollection;

/**
 * Class Room
 *
 * @package Solvice
 */
class Room
{
    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $capacity;

    /**
     * @var AttributeCollection
     */
    private $attributes;

    /**
     * @param                   $name
     * @param                   $capacity
     * @param AttributeCollection $attributes
     *
     * @return static
     */
    public static function make($name, $capacity, AttributeCollection $attributes)
    {
        return new static($name, $capacity, $attributes);
    }

    /**
     * Room constructor.
     *
     * @param                     $name
     * @param                     $capacity
     * @param AttributeCollection $attributes
     */
    public function __construct($name, $capacity, AttributeCollection $attributes)
    {
        $this->name = $name;
        $this->capacity = $capacity;
        $this->attributes = $attributes;
    }

    /**
     * @return mixed
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @param mixed $capacity
     *
     * @return Room
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * @return AttributeCollection
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param AttributeCollection $attributes
     *
     * @return Room
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;

        return $this;
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
     */
    public function setName($name)
    {
        $this->name = $name;
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
            $array['capacity'],
            AttributeCollection::fromArray($array['attributes'])
        );
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'capacity' => $this->getCapacity(),
            'attributes' => $this->getAttributes()->toArray(),
        ];
    }
}