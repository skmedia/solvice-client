<?php

namespace SolviceTest\Solver;

use PHPUnit_Framework_TestCase;
use Solvice\Collection as SolviceCollection;
use Solvice\Entity as SolviceEntity;
use Solvice\Solver as SolviceSolver;
use Solvice\Solver\ConferenceSolver;
use SolviceTest\Support\Builder;

class ConferenceSolverTest extends PHPUnit_Framework_TestCase
{
    use Builder;

    /**
     * @test
     */
    public function it_should_create_an_empty_solver()
    {
        $solver = new ConferenceSolver();
        $this->assertInstanceOf(SolviceSolver\Solver::class, $solver);
    }

    /**
     * @test
     */
    public function it_should_create_a_valid_solver()
    {
        $solver = new ConferenceSolver();

        $room1 = $this->createRoom('Room 1', 10, ['Flipboard']);
        $slot1 = SolviceEntity\Slot::make('9h-10h_2018-09-01', 0, '2018-09-01');

        $solver->setOptions(SolviceEntity\ConferenceSolverOptions::make(2));
        $solver->setClusters(SolviceCollection\ConferenceClusterCollection::make(
            SolviceEntity\ConferenceCluster::make(
                'Session Cluster 1',
                'single_paper',
                10,
                SolviceCollection\PresenterCollection::make(
                    SolviceEntity\Presenter::make('P1')
                ),
                SolviceCollection\AttributeCollection::make(
                    SolviceEntity\Attribute::make('Flipboard', 'Whiteboard')
                )
            )
        ));
        $solver->setPresenters(SolviceCollection\PresenterCollection::make(
            SolviceEntity\Presenter::make('P1'),
            SolviceEntity\Presenter::make('P2'),
            SolviceEntity\Presenter::make('P3')
        ));
        $solver->setRooms(SolviceCollection\RoomCollection::make($room1));
        $solver->setSlots(SolviceCollection\SlotCollection::make($slot1));
        $solver->setRoomSlots(SolviceCollection\RoomSlotCollection::make(SolviceEntity\RoomSlot::make('room_1 9h-10h_2018-09-01', $room1, $slot1)));

        $this->assertCount(3, $solver->getPresenters());
        $this->assertCount(1, $solver->getClusters());
        $this->assertCount(1, $solver->getRooms());
        $this->assertCount(1, $solver->getSlots());
        $this->assertCount(1, $solver->getRoomSlots());
    }
}
