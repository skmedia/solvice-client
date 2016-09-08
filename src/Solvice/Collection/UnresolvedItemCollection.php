<?php

namespace Solvice\Collection;

use Solvice\Entity\UnresolvedItem;

/**
 * Class EntityCollection
 *
 * @package Solvice
 */
class UnresolvedItemCollection extends Collection
{
    /**
     * @param UnresolvedItem $unresolvedItem
     *
     * @return bool
     */
    public function add($unresolvedItem)
    {
        if (!$unresolvedItem instanceof UnresolvedItem) {
            throw new \InvalidArgumentException('Not an UnresolvedItem');
        }

        return parent::add($unresolvedItem);
    }

    /**
     * @param $level
     *
     * @return $this
     */
    public function byLevel($level)
    {
        return $this->filter(function ($item) use ($level) {
            if ($item->getLevel() == $level) {
                return $item;
            }
        });
    }

    /**
     * @param $items
     *
     * @return static
     */
    public static function fromArray($items)
    {
        $collection = new static;
        foreach ($items as $entity) {
            $collection->add(UnresolvedItem::make(
                $entity['name'],
                $entity['value'],
                $entity['level']
            ));
        }
        return $collection;
    }
}