<?php

namespace Solvice\Solver;

use Solvice\Exception\InvalidSolverException;

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
     * @return array
     */
    abstract public function toArray();

    /**
     * @throws InvalidSolverException
     *
     * @return void
     */
    abstract public function verify();

    /**
     * @return mixed
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }
}