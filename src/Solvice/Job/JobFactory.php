<?php

namespace Solvice\Job;

use Solvice\Collection\ClusterAssignmentsCollection;
use Solvice\Collection\ConferenceAssignmentsCollection;
use Solvice\Collection\UnresolvedItemCollection;
use Solvice\Entity\Score;
use Solvice\Solver\Solver;

/**
 * Class JobFactory.
 */
class JobFactory
{
    /**
     * @param $type
     * @param $job
     *
     * @return ClusterJob
     */
    public function buildJob($type, $job)
    {
        $id = $job['id'];
        $status = $job['status'];
        $score = isset($job['score']) ? $job['score'] : null;
        $unresolvedItemCollection = UnresolvedItemCollection::fromArray($job['unresolved']);

        if ($type === Solver::CLUST) {
            return new ClusterJob(
                $id,
                $status,
                $score,
                $unresolvedItemCollection,
                ClusterAssignmentsCollection::fromArray($job['assignments'])
            );
        }

        if ($type === Solver::CONF) {
            return new ConferenceJob(
                $id,
                $status,
                $score,
                $unresolvedItemCollection,
                ConferenceAssignmentsCollection::fromArray($job['assignments'])
            );
        }
    }
}
