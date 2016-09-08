<?php

namespace SolviceTest\Support;

use Solvice\Collection as SolviceCollection;
use Solvice\Collection\AttributeCollection;
use Solvice\Collection\KeywordCollection;
use Solvice\Collection\PresenterCollection;
use Solvice\Entity as SolviceEntity;
use Solvice\Solver as SolviceSolver;

/**
 * Class Builder
 *
 * @package SolviceTest\Support
 */
trait Builder
{
    /**
     * @param $name
     * @param $type
     * @param $population
     * @param $presenters
     * @param $attributes
     *
     * @return static
     */
    protected function createConferenceCluster($name, $type, $population, $presenters, $attributes)
    {
        $presenterCollection = PresenterCollection::fromArrayValues($presenters);
        $attributeCollection = AttributeCollection::fromArray($attributes);

        return SolviceEntity\ConferenceCluster::make(
            $name,
            $type,
            $population,
            $presenterCollection,
            $attributeCollection
        );
    }

    /**
     * @param $name
     * @param $type
     * @param $size
     *
     * @return static
     */
    protected function createCluster($name, $type, $size)
    {
        return SolviceEntity\Cluster::make($name, $type, $size);
    }

    /**
     * @param       $name
     * @param       $type
     * @param array $keywords
     *
     * @return static
     */
    protected function createEntity($name, $type, Array $keywords = [])
    {
        $keywordCollection = KeywordCollection::fromValues($keywords);

        return SolviceEntity\Entity::make($name, $type, $keywordCollection);
    }
}