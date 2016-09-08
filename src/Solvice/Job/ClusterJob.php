<?php

namespace Solvice\Job;

use Solvice\Collection\ClusterAssignmentsCollection;
use Solvice\Collection\EntityCollection;
use Solvice\Collection\UnresolvedItemCollection;
use Solvice\Entity\Assignment\ClusterAssignment;
use Solvice\Entity\Score;

/**
 * Class ClusterJob
 *
 * @package Solvice\Job
 */
class ClusterJob extends Job
{
    /**
     * ClusterJob constructor.
     *
     * @param                                   $id
     * @param                                   $status
     * @param Score                             $score
     * @param UnresolvedItemCollection          $unresolvedItems
     * @param ClusterAssignmentsCollection|null $assignments
     */
    public function __construct(
        $id,
        $status,
        Score $score,
        UnresolvedItemCollection $unresolvedItems,
        ClusterAssignmentsCollection $assignments = null
    ) {
        $this->id = $id;
        $this->status = $status;
        $this->score = $score;
        $this->unresolvedItems = $unresolvedItems;
        $this->assignments = $assignments;
    }

    /**
     * Return all clusters with their assigned entities
     */
    public function assignmentOverview()
    {
        $summary = [];
        /** @var ClusterAssignment $item */
        foreach ($this->assignments as $item) {
            $key = $item->getCluster()->getName();
            if (empty($summary[$key])) {
                $summary[$key]['cluster'] = $item->getCluster();
                $summary[$key]['entities'] = new EntityCollection();
            }
            $summary[$key]['entities']->set($item->getIndexInCluster(),
                $item->getEntity());
        }

        return $summary;
    }
}