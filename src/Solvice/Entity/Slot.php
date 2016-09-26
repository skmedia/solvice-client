<?php

namespace Solvice\Entity;

/**
 * Class Slot.
 */
class Slot
{
    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $index;

    /**
     * @var
     */
    private $date;

    /**
     * @param $name
     * @param $index
     * @param $date
     *
     * @return static
     */
    public static function make($name, $index, $date)
    {
        return new static($name, $index, $date);
    }

    /**
     * Slot constructor.
     *
     * @param $name
     * @param $index
     * @param $date
     */
    public function __construct($name, $index, $date)
    {
        $this->name = $name;
        $this->index = $index;
        $this->date = $date;
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
     * @return Slot
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @param mixed $index
     *
     * @return Slot
     */
    public function setIndex($index)
    {
        $this->index = $index;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     *
     * @return Slot
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
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
            $array['index'],
            $array['date']
        );
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'index' => $this->getIndex(),
            'date' => $this->getDate(),
        ];
    }
}
