<?php

namespace Solvice\Solver;

use Doctrine\Common\Collections\ArrayCollection;
use Solvice\Collection\ClusterCollection;
use Solvice\Collection\EntityCollection;
use Solvice\Entity\Cluster;
use Solvice\Entity\Entity;
use Solvice\Exception\InvalidSolverException;

/**
 * Class ClusterSolver.
 */
class ClusterSolver extends Solver
{
    /**
     * @var ClusterCollection
     */
    private $clusters;

    /**
     * @var EntityCollection
     */
    private $entities;

    /**
     * ClusterSolver constructor.
     *
     * @param ClusterCollection|null $clusters
     * @param EntityCollection|null  $entities
     */
    public function __construct(
        ClusterCollection $clusters = null,
        EntityCollection $entities = null
    ) {
        $this->solver = Solver::CLUST;

        $this->clusters = $clusters ?: new ClusterCollection();
        $this->entities = $entities ?: new EntityCollection();
    }

    /**
     * @param $solver
     *
     * @return static
     */
    public static function fromArray($solver)
    {
        return new static(
            ClusterCollection::fromArray($solver['clusters']),
            EntityCollection::fromArray($solver['entities'])
        );
    }

    /**
     * @return ArrayCollection
     */
    public function getClusters()
    {
        return $this->clusters;
    }

    /**
     * @return ArrayCollection
     */
    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * @param Cluster $cluster
     */
    public function addCluster(Cluster $cluster)
    {
        $this->clusters->add($cluster);
    }

    /**
     * @param Entity $entity
     */
    public function addEntity(Entity $entity)
    {
        $this->entities->add($entity);
    }

    /**
     * @param EntityCollection $entities
     *
     * @return ConferenceSolver
     */
    public function setPresenters(EntityCollection $entities)
    {
        $this->entities = $entities;

        return $this;
    }

    /**
     * @param ClusterCollection $clusters
     *
     * @return ConferenceSolver
     */
    public function setClusters(ClusterCollection $clusters)
    {
        $this->clusters = $clusters;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'solver' => $this->solver,
            'solve_duration' => $this->solveDuration,
            'clusters' => $this->clusters->toArray(),
            'entities' => $this->entities->toArray(),
        ];
    }

    public function verify()
    {
        $this->verifyClusterTypes();
        $this->verifyClusterCount();
    }

    /**
     * @return mixed
     */
    public function getSolver()
    {
        return $this->solver;
    }

    /**
     * @param mixed $solver
     */
    public function setSolver($solver)
    {
        $this->solver = $solver;
    }

    /**
     * @return int
     */
    public function getSolveDuration()
    {
        return $this->solveDuration;
    }

    /**
     * @param int $solveDuration
     */
    public function setSolveDuration($solveDuration)
    {
        $this->solveDuration = $solveDuration;
    }

    /**
     * @throws InvalidSolverException
     */
    private function verifyClusterCount()
    {
        $entityCount = $this->entities->count();

        $clusterSizeCount = array_sum(
            $this->clusters
                ->map(function (Cluster $cluster) {
                    return $cluster->getSize();
                })->getValues()
            );

        if ($entityCount !== $clusterSizeCount) {
            $msg = sprintf('Invalid cluster count, entities: %s, cluster size sum: %s', $entityCount, $clusterSizeCount);
            throw new InvalidSolverException($msg);
        }
    }

    private function verifyClusterTypes()
    {
        $uniqueEntityClusterTypes = array_unique(
            $this->entities
                ->map(function (Entity $entity) {
                    return $entity->getClusterType();
                })
                ->getValues()
        );

        $uniqueClusterClusterTypes = array_unique(
            $this->clusters
                ->map(function (Cluster $cluster) {
                    return $cluster->getClusterType();
                })
                ->getValues()
        );

        $r = array_diff($uniqueEntityClusterTypes, $uniqueClusterClusterTypes);
        if ($r) {
            throw new InvalidSolverException(
                'The following cluster types are defined in the entities but not in the clusters: '.implode(', ', $r)
            );
        }

        $r = array_diff($uniqueClusterClusterTypes, $uniqueEntityClusterTypes);
        if ($r) {
            throw new InvalidSolverException(
                'The following cluster types are defined in the clusters but not in the entities: '.implode(', ', $r)
            );
        }
    }
}
