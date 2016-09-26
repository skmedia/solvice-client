<?php

namespace Solvice\Collection;

use Solvice\Entity\Keyword;

/**
 * Class KeywordCollection.
 */
class KeywordCollection extends Collection
{
    /**
     * @param Keyword $keyword
     *
     * @return bool
     */
    public function add($keyword)
    {
        if (!($keyword instanceof Keyword)) {
            throw new \InvalidArgumentException('Not a keyword: '.get_class($keyword));
        }

        return parent::add($keyword);
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
            $collection->add(Keyword::make($item['name'], $item['priority']));
        }

        return $collection;
    }

    /**
     * @param $items
     *
     * @return static
     */
    public static function fromValues($items)
    {
        $collection = new static();
        foreach ($items as $item) {
            $collection->add(Keyword::make($item));
        }

        return $collection;
    }
}
