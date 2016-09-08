<?php

namespace Solvice\Collection;

use Solvice\Entity\Slot;

/**
 * Class SlotCollection
 *
 * @package Solvice
 */
class SlotCollection extends Collection
{
    /**
     * @param Slot $item
     *
     * @return bool
     */
    public function add($item)
    {
        if (!($item instanceof Slot)) {
            throw new \InvalidArgumentException('Not a slot: ' . get_class($item));
        }

        return parent::add($item);
    }
}