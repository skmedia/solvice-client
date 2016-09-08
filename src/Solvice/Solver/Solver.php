<?php

namespace Solvice\Solver;

/**
 * Class Solver
 *
 * @package Solvice\Solver
 */
abstract class Solver
{
    CONST CLUST = 'CLUST';
    CONST CONF  = 'CONF';

    /**
     * @var
     */
    protected $solver;

    /**
     * @var int
     */
    protected $solveDuration = 0;

    /**
     * @return mixed
     */
    abstract public function toArray();

    /**
     * @return mixed
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }
}