<?php

namespace Solvice\Collection;

use Solvice\Entity\Assignment\ClusterAssignment;

/**
 * Class ClusterAssignmentsCollection
 *
 * @package Solvice
 */
class ClusterAssignmentsCollection extends AssignmentsCollection
{
    /**
     * @param Assignment $assignment
     *
     * @return bool
     */
    public function add($assignment)
    {
        if (!$assignment instanceof ClusterAssignment) {
            throw new \InvalidArgumentException('Not a ClusterAssignment');
        }

        return parent::add($assignment);
    }

    /**
     * @param $assignments
     *
     * @return static
     */
    public static function fromArray($assignments)
    {
        $collection = new static;

        foreach ($assignments as $assignment) {
            $collection->add(ClusterAssignment::fromArray($assignment));
        }

        return $collection;
    }

}