<?php

namespace Solvice\Entity;

use Solvice\Collection\KeywordCollection;

/**
 * Class Entity
 *
 * @package Solvice\Entity
 */
class Entity
{
    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $clusterType;

    /**
     * @var KeywordCollection
     */
    private $keywords;

    /**
     * @param                   $name
     * @param                   $clusterType
     * @param KeywordCollection $keywordCollection
     *
     * @return static
     */
    public static function make($name, $clusterType, KeywordCollection $keywordCollection = null)
    {
        return new static($name, $clusterType, $keywordCollection);
    }

    /**
     * @param $array
     *
     * @return static
     */
    public static function fromArray($array)
    {
        return new static(
            $array['name'],
            $array['cluster_type'],
            KeywordCollection::fromArray($array['keywords'])
        );
    }

    /**
     * Entity constructor.
     *
     * @param                   $name
     * @param                   $clusterType
     * @param KeywordCollection $keywordCollection
     */
    public function __construct($name, $clusterType, KeywordCollection $keywordCollection = null)
    {
        $this->name = $name;
        $this->clusterType = $clusterType;
        $this->keywords = $keywordCollection ?: new KeywordCollection;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getClusterType()
    {
        return $this->clusterType;
    }

    /**
     * @param mixed $clusterType
     */
    public function setClusterType($clusterType)
    {
        $this->clusterType = $clusterType;
    }

    /**
     * @param Keyword $keyword
     */
    public function addKeyword(Keyword $keyword)
    {
        $this->keywords->addKeyword($keyword);
    }

    /**
     * @return KeywordCollection
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'cluster_type' => $this->getClusterType(),
            'keywords' => $this->getKeywords()->toArray(),
        ];
    }
}