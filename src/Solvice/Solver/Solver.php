<?php

namespace Solvice\Solver;

use Solvice\Exception\InvalidSolverException;

/**
 * Class Solver.
 */
abstract class Solver
{
    const CLUST = 'CLUST';
    const CONF = 'CONF';

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
     */
    abstract public function verify();

    /**
     * @return mixed
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

    /**
     * @return mixed
     */
    public function toPrettyJson()
    {
        return json_encode($this->toArray(), JSON_PRETTY_PRINT);
    }
}
