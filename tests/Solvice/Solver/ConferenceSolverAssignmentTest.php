<?php

namespace SolviceTest\Solver;

use PHPUnit_Framework_TestCase;
use Solvice\Collection\AttributeCollection;
use Solvice\Collection\PresenterCollection;
use Solvice\Entity\Assignment\ConferenceClusterAssignment;
use Solvice\Entity\Attribute;
use Solvice\Entity\Chair;
use Solvice\Entity\ConferenceCluster;
use Solvice\Entity\Presenter;
use SolviceTest\Support\Builder;

class ConferenceSolverAssignmentTest extends PHPUnit_Framework_TestCase
{
    use Builder;

    /**
     * @test
     */
    public function it_should_create_a_conference_cluster()
    {
        $conferenceCluster = ConferenceCluster::make(
            'Cluster name 1',
            'single_paper',
            58,
            PresenterCollection::make(Presenter::make('P1')),
            AttributeCollection::make(Attribute::make('Attrib1'))
        );

        $assignment = ConferenceClusterAssignment::make(
            0, $conferenceCluster, Chair::make('Chair person 1'), false, false
        );

        $this->assertEquals(array (
            'id' => 0,
            'chair' => [
                'name' => 'Chair person 1',
            ],
            'cluster' =>
                array (
                    'name' => 'Cluster name 1',
                    'cluster_type' => 'single_paper',
                    'population' => 58,
                    'presenters' =>
                        array (
                            0 => 'P1',
                        ),
                    'attributes' =>
                        array (
                            0 => 'Attrib1',
                        ),
                ),
            'is_locked' => false,
            'is_reserved' => false,
            'room_slot' =>
                array (
                ),
        ), $assignment->toArray());
    }
}
