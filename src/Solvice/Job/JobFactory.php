<?php

namespace Solvice\Job;

use Solvice\Collection\ClusterAssignmentsCollection;
use Solvice\Collection\ConferenceAssignmentsCollection;
use Solvice\Collection\UnresolvedItemCollection;
use Solvice\Entity\Score;
use Solvice\Solver\Solver;

/**
 * Class JobFactory
 *
 * @package Solvice\Job
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
        if ($type === Solver::CLUST) {
            return new ClusterJob(
                $job['id'],
                $job['status'],
                Score::fromArray($job['score']),
                UnresolvedItemCollection::fromArray($job['unresolved']),
                ClusterAssignmentsCollection::fromArray($job['assignments'])
            );
        }

        if ($type === Solver::CONF) {
            return new ConferenceJob(
                $job['id'],
                $job['status'],
                Score::fromArray($job['score']),
                UnresolvedItemCollection::fromArray($job['unresolved']),
                ConferenceAssignmentsCollection::fromArray($job['assignments'])
            );
        }
    }
}