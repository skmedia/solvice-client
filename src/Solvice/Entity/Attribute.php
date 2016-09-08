<?php

namespace Solvice\Entity;

class Attribute
{
    /**
     * @var
     */
    private $name;

    /**
     * @param $name
     *
     * @return static
     */
    public static function make($name)
    {
        return new static($name);
    }

    /**
     * Entity constructor.
     *
     * @param                   $name
     */
    public function __construct($name)
    {
        $this->name = $name;
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
     * @return Keyword
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->getName();
    }
}