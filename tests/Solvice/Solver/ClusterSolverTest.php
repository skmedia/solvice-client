<?php

namespace SolviceTest\Solver;

use PHPUnit_Framework_TestCase;
use Solvice\Collection as SolviceCollection;
use Solvice\Entity as SolviceEntity;
use Solvice\Solver as SolviceSolver;
use SolviceTest\Support\Builder;

class ClusterSolverTest extends PHPUnit_Framework_TestCase
{
    use Builder;

    /**
     * @test
     */
    public function it_should_create_an_empty_cluster_solver()
    {
        $solver = new \Solvice\Solver\ClusterSolver();
        $this->assertCount(0, $solver->getClusters());
        $this->assertCount(0, $solver->getEntities());
    }

    /**
     * @test
     */
    public function it_should_create_a_valid_cluster_solver()
    {
        $clusterSolver = new \Solvice\Solver\ClusterSolver();

        $clusterSolver->addCluster($this->createCluster('Cluster 1', 'single_paper', 2));
        $clusterSolver->addCluster($this->createCluster('Cluster 2', 'single_paper', 1));
        $clusterSolver->addEntity($this->createEntity('Single Paper 1', 'single_paper', ['kw_1', 'kw_2']));
        $clusterSolver->addEntity($this->createEntity('Single Paper 2', 'single_paper', ['kw_2', 'kw_7']));
        $clusterSolver->addEntity($this->createEntity('Single Paper 3', 'single_paper', ['kw_1', 'kw_9']));

        $clusterSolver->verify();

        $this->assertCount(2, $clusterSolver->getClusters());
        $this->assertCount(3, $clusterSolver->getEntities());
    }

    /**
     * @test
     */
    public function it_should_be_invalid_when_the_cluster_sizes_dont_match()
    {
        $this->expectException(\Solvice\Exception\InvalidSolverException::class);

        $clusterSolver = new \Solvice\Solver\ClusterSolver();

        $clusterSolver->addCluster($this->createCluster('Cluster 1', 'single_paper', 8));
        $clusterSolver->addCluster($this->createCluster('Cluster 2', 'single_paper', 1));
        $clusterSolver->addEntity($this->createEntity('Single Paper 1', 'single_paper', ['kw_1', 'kw_2']));
        $clusterSolver->addEntity($this->createEntity('Single Paper 2', 'single_paper', ['kw_2', 'kw_7']));
        $clusterSolver->addEntity($this->createEntity('Single Paper 3', 'single_paper', ['kw_1', 'kw_9']));

        $clusterSolver->verify();
    }

    /**
     * @test
     */
    public function it_should_be_invalid_when_the_cluster_types_dont_match()
    {
        $this->expectException(\Solvice\Exception\InvalidSolverException::class);

        $clusterSolver = new \Solvice\Solver\ClusterSolver();

        $clusterSolver->addCluster($this->createCluster('Cluster 1', 'single_papers', 2)); // single_papers is invalid
        $clusterSolver->addCluster($this->createCluster('Cluster 2', 'single_paper', 1));
        $clusterSolver->addEntity($this->createEntity('Single Paper 1', 'single_paper', ['kw_1', 'kw_2']));
        $clusterSolver->addEntity($this->createEntity('Single Paper 2', 'single_paper', ['kw_2', 'kw_7']));
        $clusterSolver->addEntity($this->createEntity('Single Paper 3', 'single_paper', ['kw_1', 'kw_9']));

        $clusterSolver->verify();
    }

}
