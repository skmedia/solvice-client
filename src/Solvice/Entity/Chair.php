<?php

namespace Solvice\Entity;

/**
 * Class Chair.
 */
class Chair
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
     * @param $array
     *
     * @return static
     */
    public static function fromArray($array)
    {
        if (!empty($array['name'])) {
            return new static($array['name']);
        }

        return new static('');
    }

    /**
     * Presenter constructor.
     *
     * @param $name
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

    /**
     * @return array
     */
    public function toArrayWithKeys()
    {
        return [
            'name' => $this->getName(),
        ];
    }
}
