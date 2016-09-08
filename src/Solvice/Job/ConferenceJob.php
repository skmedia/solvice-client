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
     * @var ConferenceAssignmentsCollection
     */
    protected $assignments;

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

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     *
     * @return ClusterJob
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return ConferenceAssignmentsCollection
     */
    public function getAssignments()
    {
        return $this->assignments;
    }

    /**
     * @param ConferenceAssignmentsCollection $assignments
     *
     * @return ClusterJob
     */
    public function setAssignments(ConferenceAssignmentsCollection $assignments)
    {
        $this->assignments = $assignments;

        return $this;
    }
}