<?php

namespace Solvice\Entity;

/**
 * Class Score
 *
 * @package Solvice\Entity
 */
class Score
{
    /**
     * @var
     */
    private $hardScore;

    /**
     * @var
     */
    private $softScore;

    /**
     * @var
     */
    private $mediumScore;

    /**
     * @var
     */
    private $feasible;

    /**
     * @param $hardScore
     * @param $mediumScore
     * @param $softScore
     * @param $feasible
     *
     * @return static
     */
    public static function make($hardScore, $mediumScore, $softScore, $feasible)
    {
        return new static($hardScore, $mediumScore, $softScore, $feasible);
    }

    /**
     * @param $array
     *
     * @return mixed
     */
    public static function fromArray($array)
    {
        return new static(
            $array['hardScore'] ? $array['hardScore']: 0,
            isset($array['mediumScore']) ? $array['mediumScore']: 0,
            $array['softScore'] ? $array['softScore']: 0,
            $array['feasible']
        );
    }

    /**
     * Score constructor.
     *
     * @param $hardScore
     * @param $mediumScore
     * @param $softScore
     * @param $feasible
     */
    public function __construct($hardScore, $mediumScore, $softScore, $feasible)
    {
        $this->hardScore = $hardScore;
        $this->softScore = $softScore;
        $this->mediumScore = $mediumScore;
        $this->feasible = $feasible;
    }

    /**
     * @return mixed
     */
    public function getHardScore()
    {
        return $this->hardScore;
    }

    /**
     * @param mixed $hardScore
     *
     * @return Score
     */
    public function setHardScore($hardScore)
    {
        $this->hardScore = $hardScore;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSoftScore()
    {
        return $this->softScore;
    }

    /**
     * @param mixed $softScore
     *
     * @return Score
     */
    public function setSoftScore($softScore)
    {
        $this->softScore = $softScore;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMediumScore()
    {
        return $this->mediumScore;
    }

    /**
     * @param mixed $mediumScore
     *
     * @return Score
     */
    public function setMediumScore($mediumScore)
    {
        $this->mediumScore = $mediumScore;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFeasible()
    {
        return $this->feasible;
    }

    /**
     * @return mixed
     */
    public function isFeasible()
    {
        return $this->feasible;
    }

    /**
     * @param mixed $feasible
     *
     * @return Score
     */
    public function setFeasible($feasible)
    {
        $this->feasible = $feasible;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'softScore' => $this->getSoftScore(),
            'mediumScore' => $this->getMediumScore(),
            'hardScore' => $this->getHardScore(),
            'feasible' => $this->getFeasible(),
        ];
    }
}