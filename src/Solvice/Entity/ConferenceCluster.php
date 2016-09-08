<?php

namespace Solvice\Entity;

use Solvice\Collection\AttributeCollection;
use Solvice\Collection\PresenterCollection;

/**
 * Class ConferenceCluster
 *
 * @package Solvice
 */
class ConferenceCluster
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
     * @var
     */
    private $population;

    /**
     * @var PresenterCollection
     */
    private $presenters;

    /**
     * @var AttributeCollection
     */
    private $attributes;

    /**
     * @param $name
     * @param $clusterType
     * @param $population
     * @param $presenters
     * @param $attributes
     *
     * @return static
     */
    public static function make(
        $name,
        $clusterType,
        $population,
        $presenters,
        $attributes
    ) {
        return new static($name, $clusterType, $population, $presenters,
            $attributes);
    }


    /**
     * ConferenceCluster constructor.
     *
     * @param                          $name
     * @param                          $clusterType
     * @param                          $population
     * @param PresenterCollection|null $presenters
     * @param AttributeCollection|null $attributes
     */
    public function __construct(
        $name,
        $clusterType,
        $population,
        PresenterCollection $presenters = null,
        AttributeCollection $attributes = null
    ) {
        $this->name = $name;
        $this->clusterType = $clusterType;
        $this->population = $population;
        $this->presenters = $presenters ?: new PresenterCollection();
        $this->attributes = $attributes ?: new AttributeCollection();
    }

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param mixed $attributes
     *
     * @return ConferenceCluster
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * @param Attribute $attribute
     *
     * @return $this
     */
    public function addAttribute(Attribute $attribute)
    {
        $this->attributes->add($attribute);

        return $this;
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
     *
     * @return Cluster
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
     *
     * @return Cluster
     */
    public function setClusterType($clusterType)
    {
        $this->clusterType = $clusterType;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * @param mixed $population
     *
     * @return ConferenceCluster
     */
    public function setPopulation($population)
    {
        $this->population = $population;

        return $this;
    }

    /**
     * @return PresenterCollection
     */
    public function getPresenters()
    {
        return $this->presenters;
    }

    /**
     * @param PresenterCollection $presenters
     *
     * @return ConferenceCluster
     */
    public function setPresenters(PresenterCollection $presenters)
    {
        $this->presenters = $presenters;

        return $this;
    }

    /**
     * @param Presenter $presenter
     *
     * @return $this
     */
    public function addPresenter(Presenter $presenter)
    {
        $this->presenters->add($presenter);

        return $this;
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
            $array['population'],
            PresenterCollection::fromArray($array['presenters']),
            AttributeCollection::fromArray($array['attributes'])
        );
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'cluster_type' => $this->getClusterType(),
            'population' => $this->getPopulation(),
            'presenters' => $this->getPresenters()->toArray(),
            'attributes' => $this->getAttributes()->toArray(),
        ];
    }
}