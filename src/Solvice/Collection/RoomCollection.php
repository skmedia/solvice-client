<?php

namespace Solvice\Collection;

use Solvice\Entity\Room;

/**
 * Class RoomCollection.
 */
class RoomCollection extends Collection
{
    /**
     * @param Room $item
     *
     * @return bool
     */
    public function add($item)
    {
        if (!($item instanceof Room)) {
            throw new \InvalidArgumentException('Not a Room: '.get_class($item));
        }

        return parent::add($item);
    }
}
