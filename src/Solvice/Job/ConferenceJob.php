<?php

namespace Solvice\Job;

use Solvice\Collection\ConferenceAssignmentsCollection;
use Solvice\Collection\EntityCollection;
use Solvice\Collection\UnresolvedItemCollection;
use Solvice\Entity\Assignment\ClusterAssignment;
use Solvice\Entity\Score;

/**
 * Class ConferenceJob
 *
 * @package Solvice\Job
 */
class ConferenceJob extends Job
{
    /**
     * ClusterJob constructor.
     *
     * @param                                   $id
     * @param                                   $status
     * @param Score                             $score
     * @param UnresolvedItemCollection          $unresolvedItems
     * @param ConferenceAssignmentsCollection|null $assignments
     */
    public function __construct(
        $id,
        $status,
        Score $score,
        UnresolvedItemCollection $unresolvedItems,
        ConferenceAssignmentsCollection $assignments = null
    ) {
        $this->id = $id;
        $this->status = $status;
        $this->score = $score;
        $this->unresolvedItems = $unresolvedItems;
        $this->assignments = $assignments;
    }
}