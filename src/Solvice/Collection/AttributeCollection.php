<?php

namespace Solvice\Collection;

use Solvice\Entity\Attribute;

/**
 * Class AttributeCollection.
 */
class AttributeCollection extends Collection
{
    /**
     * @param Attribute $item
     *
     * @return bool
     */
    public function add($item)
    {
        if (!($item instanceof Attribute)) {
            throw new \InvalidArgumentException('Not an attribute: '.get_class($item));
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
        $collection = new static();
        foreach ($items as $item) {
            $collection->add(Attribute::make($item));
        }

        return $collection;
    }
}
