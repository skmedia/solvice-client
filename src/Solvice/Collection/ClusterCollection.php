<?php

namespace Solvice\Collection;

use Solvice\Entity\Cluster;

/**
 * Class ClusterCollection.
 */
class ClusterCollection extends Collection
{
    /**
     * @param Cluster $cluster
     *
     * @return bool
     */
    public function add($cluster)
    {
        if (!$cluster instanceof Cluster) {
            throw new \InvalidArgumentException('Not a cluster');
        }

        return parent::add($cluster);
    }

    /**
     * @param $data
     *
     * @return static
     */
    public static function fromArray($data)
    {
        $collection = new static();
        foreach ($data['clusters'] as $cluster) {
            $collection->add(Cluster::make(
                $cluster['name'],
                $cluster['cluster_type'],
                $cluster['size']
            ));
        }

        return $collection;
    }
}
