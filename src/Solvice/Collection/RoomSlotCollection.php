<?php

namespace Solvice\Collection;

use Solvice\Entity\RoomSlot;

/**
 * Class RoomSlotCollection
 *
 * @package Solvice
 */
class RoomSlotCollection extends Collection
{
    /**
     * @param RoomSlot $item
     *
     * @return bool
     */
    public function add($item)
    {
        if (!($item instanceof RoomSlot)) {
            throw new \InvalidArgumentException('Not a RoomSlot: ' . get_class($item));
        }

        return parent::add($item);
    }
}