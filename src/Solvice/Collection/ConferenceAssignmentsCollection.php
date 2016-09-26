<?php

namespace Solvice\Collection;

use Solvice\Entity\Assignment\ConferenceClusterAssignment;

/**
 * Class ConferenceAssignmentsCollection.
 */
class ConferenceAssignmentsCollection extends AssignmentsCollection
{
    /**
     * @param ConferenceClusterAssignment $assignment
     *
     * @return bool
     */
    public function add($assignment)
    {
        if (!$assignment instanceof ConferenceClusterAssignment) {
            throw new \InvalidArgumentException('Not a ConferenceClusterAssignment');
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
        $collection = new static();

        foreach ($assignments as $assignment) {
            $collection->add(ConferenceClusterAssignment::fromArray($assignment));
        }

        return $collection;
    }
}
