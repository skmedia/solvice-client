<?php

namespace Solvice\Job;

use Solvice\Collection\AssignmentsCollection;
use Solvice\Collection\UnresolvedItemCollection;
use Solvice\Entity\Score;
use Solvice\Entity\UnresolvedItem;

/**
 * Class Job
 *
 * @package Solvice\Job
 */
abstract class Job
{
    /**
     * @var
     */
    protected $id;

    /**
     * @var Score
     */
    protected $score;

    /**
     * @var
     */
    protected $unresolvedItems;

    /**
     * @var
     */
    protected $status;

    /**
     * @var AssignmentsCollection
     */
    protected $assignments;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return ClusterJob
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Score
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param Score $score
     *
     * @return ClusterJob
     */
    public function setScore(Score $score)
    {
        $this->score = $score;

        return $this;
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
     * @return UnresolvedItemCollection
     */
    public function getUnresolvedItems()
    {
        return $this->unresolvedItems;
    }

    /**
     * @param UnresolvedItemCollection $unresolvedItems
     *
     * @return ClusterJob
     */
    public function setUnresolvedItems($unresolvedItems)
    {
        $this->unresolvedItems = $unresolvedItems;

        return $this;
    }

    /**
     *
     */
    public function getMessages()
    {
        return $this->unresolvedItems->map(function($item) {
            return $item->getName();
        });
    }

    /**
     * @return AssignmentsCollection
     */
    public function getAssignments()
    {
        return $this->assignments;
    }

    /**
     * @param AssignmentsCollection $assignments
     *
     * @return ClusterJob
     */
    public function setAssignments(AssignmentsCollection $assignments)
    {
        $this->assignments = $assignments;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSolved()
    {
        return $this->status === JobStatus::SOLVED;
    }

    /**
     * @return bool
     */
    public function isSolving()
    {
        return $this->status === JobStatus::SOLVING;
    }

    /**
     * @return bool
     */
    public function hasError()
    {
        return $this->status === JobStatus::ERROR;
    }
}