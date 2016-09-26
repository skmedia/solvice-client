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

        $score = isset($job['score'])
            ? Score::fromArray($job['score'])
            : null;

        $unresolvedItemCollection = isset($job['unresolved'])
            ? UnresolvedItemCollection::fromArray($job['unresolved'])
            : new UnresolvedItemCollection;

        if ($type === Solver::CLUST) {
            $assignments = isset($job['unresolved'])
                ? ClusterAssignmentsCollection::fromArray($job['assignments'])
                : new ClusterAssignmentsCollection;

            return new ClusterJob($id, $status, $score, $unresolvedItemCollection, $assignments);
        }

        if ($type === Solver::CONF) {
            $assignments = isset($job['unresolved'])
                ? ConferenceAssignmentsCollection::fromArray($job['assignments'])
                : new ClusterAssignmentsCollection;

            return new ConferenceJob($id, $status, $score, $unresolvedItemCollection, $assignments);
        }
    }
}
