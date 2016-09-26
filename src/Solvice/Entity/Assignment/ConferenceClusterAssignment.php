<?php

namespace Solvice\Entity\Assignment;

use Solvice\Entity\Cluster;
use Solvice\Entity\Chair;
use Solvice\Entity\ConferenceCluster;
use Solvice\Entity\RoomSlot;

/**
 * Class ConferenceClusterAssignment.
 */
class ConferenceClusterAssignment
{
    /**
     * @var
     */
    private $id;

    /**
     * @var ConferenceCluster
     */
    private $cluster;

    /**
     * @var
     */
    private $isLocked;

    /**
     * @var
     */
    private $isReserved;

    /**
     * @var RoomSlot
     */
    private $roomSlot;

    /**
     * @var Chair
     */
    private $chair;

    /**
     * ConferenceClusterAssignment constructor.
     *
     * @param                   $id
     * @param ConferenceCluster $cluster
     * @param Chair             $chair
     * @param                   $isLocked
     * @param                   $isReserved
     * @param RoomSlot          $roomSlot
     */
    public function __construct(
        $id,
        ConferenceCluster $cluster,
        Chair $chair,
        $isLocked,
        $isReserved,
        RoomSlot $roomSlot = null
    ) {
        $this->id = $id;
        $this->cluster = $cluster;
        $this->chair = $chair;
        $this->isLocked = $isLocked;
        $this->isReserved = $isReserved;
        $this->roomSlot = $roomSlot;
    }

    /**
     * @return mixed
     */
    public function getIsLocked()
    {
        return $this->isLocked;
    }

    /**
     * @param mixed $isLocked
     *
     * @return ConferenceClusterAssignment
     */
    public function setIsLocked($isLocked)
    {
        $this->isLocked = $isLocked;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsReserved()
    {
        return $this->isReserved;
    }

    /**
     * @param mixed $isReserved
     *
     * @return ConferenceClusterAssignment
     */
    public function setIsReserved($isReserved)
    {
        $this->isReserved = $isReserved;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasRoomSlot()
    {
        return $this->roomSlot ? true : false;
    }

    /**
     * @return RoomSlot
     */
    public function getRoomSlot()
    {
        return $this->roomSlot;
    }

    /**
     * @param RoomSlot $roomSlot
     *
     * @return ConferenceClusterAssignment
     */
    public function setRoomSlot($roomSlot)
    {
        $this->roomSlot = $roomSlot;

        return $this;
    }

    /**
     * @param                   $id
     * @param ConferenceCluster $cluster
     * @param Chair             $chair
     * @param                   $isLocked
     * @param                   $isReserved
     * @param RoomSlot|null     $roomSlot
     *
     * @return static
     */
    public static function make(
        $id,
        ConferenceCluster $cluster,
        Chair $chair,
        $isLocked,
        $isReserved,
        RoomSlot $roomSlot = null
    ) {
        return new static($id, $cluster, $chair, $isLocked, $isReserved, $roomSlot);
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
            ConferenceCluster::fromArray($array['cluster']),
            Chair::fromArray($array['chair']),
            $array['is_locked'],
            $array['is_reserved'],
            RoomSlot::fromArray($array['room_slot']
        ));
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
     * @return ConferenceCluster
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
     * @return Chair
     */
    public function getChair()
    {
        return $this->chair;
    }

    /**
     * @param Chair $chair
     *
     * @return $this
     */
    public function setChair($chair)
    {
        $this->chair = $chair;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'chair' => $this->getChair() ? $this->getChair()->toArrayWithKeys() : [],
            'cluster' => $this->getCluster()->toArray(),
            'is_locked' => $this->getIsLocked(),
            'is_reserved' => $this->getIsReserved(),
            'room_slot' => $this->getRoomSlot() ? $this->getRoomSlot()->toFullArray() : [],
        ];
    }
}
