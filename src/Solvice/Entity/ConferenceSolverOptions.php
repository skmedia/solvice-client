<?php

namespace Solvice\Entity;

/**
 * Class ConferenceSolverOptions.
 */
class ConferenceSolverOptions
{
    /**
     * @var
     */
    private $maxChair;

    /**
     * @param $maxChair
     *
     * @return static
     */
    public static function make($maxChair)
    {
        return new static($maxChair);
    }

    /**
     * ConferenceSolverOptions constructor.
     *
     * @param $maxChair
     */
    public function __construct($maxChair)
    {
        $this->maxChair = $maxChair;
    }

    /**
     * @return mixed
     */
    public function getMaxChair()
    {
        return $this->maxChair;
    }

    /**
     * @param mixed $maxChair
     *
     * @return ConferenceSolverOptions
     */
    public function setMaxChair($maxChair)
    {
        $this->maxChair = $maxChair;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'max_chair' => $this->getMaxChair(),
        ];
    }
}
