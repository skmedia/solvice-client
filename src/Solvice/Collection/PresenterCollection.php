<?php

namespace Solvice\Collection;

use Solvice\Entity\Presenter;

/**
 * Class PresenterCollection
 *
 * @package Solvice
 */
class PresenterCollection extends Collection
{
    /**
     * @param Presenter $item
     *
     * @return bool
     */
    public function add($item)
    {
        if (!($item instanceof Presenter)) {
            throw new \InvalidArgumentException('Not an Presenter: ' . get_class($item));
        }

        return parent::add($item);
    }

    /**
     * @param $items
     *
     * @return static
     */
    public static function fromArray($items)
    {
        $collection = new static;
        foreach ($items as $item) {
            $collection->add(Presenter::make($item['name']));
        }

        return $collection;
    }

    /**
     * @param $items
     *
     * @return static
     */
    public static function fromArrayValues($items)
    {
        $collection = new static;
        foreach ($items as $item) {
            $collection->add(Presenter::make($item));
        }

        return $collection;
    }

    /**
     * @return array
     */
    public function toArrayWithKeys()
    {
        $items = [];
        foreach ($this as $item) {
            $items[] = $item->toArrayWithKeys();
        }
        return $items;
    }
}