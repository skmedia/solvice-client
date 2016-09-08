<?php

namespace Solvice\Collection;

use Solvice\Entity\ConferenceCluster;

/**
 * Class ConferenceClusterCollection
 *
 * @package Solvice
 */
class ConferenceClusterCollection extends Collection
{
    /**
     * @param ConferenceCluster $ConferenceCluster
     *
     * @return bool
     */
    public function add($ConferenceCluster)
    {
        if (!$ConferenceCluster instanceof ConferenceCluster) {
            throw new \InvalidArgumentException('Not a ConferenceCluster');
        }

        return parent::add($ConferenceCluster);
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
}