<?php

namespace Solvice\Entity;

/**
 * Class RoomSlot
 *
 * @package Solvice
 */
/**
 * Class RoomSlot
 *
 * @package Solvice\Entity
 */
class RoomSlot
{
    /**
     * @var
     */
    private $name;

    /**
     * @var Room
     */
    private $room;

    /**
     * @var Slot
     */
    private $slot;

    /**
     * @param      $name
     * @param Room $room
     * @param Slot $slot
     *
     * @return static
     */
    public static function make($name, Room $room, Slot $slot)
    {
        return new static($name, $room, $slot);
    }

    /**
     * RoomSlot constructor.
     *
     * @param      $name
     * @param Room $room
     * @param Slot $slot
     */
    public function __construct($name, Room $room, Slot $slot)
    {
        $this->name = $name;
        $this->room = $room;
        $this->slot = $slot;
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
     * @return Room
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param Room $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }

    /**
     * @return Slot
     */
    public function getSlot()
    {
        return $this->slot;
    }

    /**
     * @param Slot $slot
     */
    public function setSlot($slot)
    {
        $this->slot = $slot;
    }

    /**
     * @return mixed
     */
    public function isLocked()
    {
        return $this->isLocked();
    }

    /**
     * @return mixed
     */
    public function isReserved()
    {
        return $this->isReserved();
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
            Room::fromArray($array['room']),
            Slot::fromArray($array['slot'])
        );
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'room' => $this->getRoom()->getName(),
            'slot' => $this->getSlot()->getName(),
        ];
    }

    /**
     * @return array
     */
    public function toFullArray()
    {
        return [
            'name' => $this->getName(),
            'room' => $this->getRoom()->toArray(),
            'slot' => $this->getSlot()->toArray(),
        ];
    }
}