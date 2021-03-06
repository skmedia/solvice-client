<?php

namespace Solvice\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Inflector\Inflector;

/**
 * Class Collection.
 */
abstract class Collection extends ArrayCollection
{
    /**
     * @param $items
     *
     * @return static
     */
    public static function make($items)
    {
        if (is_object($items)) {
            $items = func_get_args();
        }

        $collection = new static();
        foreach ($items as $item) {
            $collection->add($item);
        }

        return $collection;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $items = [];
        foreach ($this as $item) {
            $items[] = $item->toArray();
        }

        return $items;
    }

    /**
     * @param        $property
     * @param string $char
     *
     * @return $this
     */
    public function joinBy($property, $char = ', ')
    {
        $collection = $this->map(function ($item) use ($property) {
            $getter = 'get'.Inflector::classify($property);

            return $item->{$getter}();
        });

        return implode($char, $collection->getValues());
    }
}
