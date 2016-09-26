<?php

namespace Solvice\Job;

use Solvice\Collection\ConferenceAssignmentsCollection;
use Solvice\Collection\UnresolvedItemCollection;
use Solvice\Entity\Score;

/**
 * Class ConferenceJob.
 */
class ConferenceJob extends Job
{
    /**
     * ClusterJob constructor.
     *
     * @param                                      $id
     * @param                                      $status
     * @param Score                                $score
     * @param UnresolvedItemCollection             $unresolvedItems
     * @param ConferenceAssignmentsCollection|null $assignments
     */
    public function __construct(
        $id,
        $status,
        Score $score,
        UnresolvedItemCollection $unresolvedItems = null,
        ConferenceAssignmentsCollection $assignments = null
    ) {
        $this->id = $id;
        $this->status = $status;
        $this->score = $score;
        $this->unresolvedItems = $unresolvedItems ?: new UnresolvedItemCollection();
        $this->assignments = $assignments ?: new ConferenceAssignmentsCollection();
    }
}
