# Solvice client
---

```
use Solvice\Http\Client as SolviceClient
use Solvice\Collection as SolviceCollection;
use Solvice\Entity as SolviceEntity;
use Solvice\Solver as SolviceSolver;

$solviceClient = new SolviceClient('https://api.solvice.io', 'username', 'password');

$clusterSolver = new SolviceSolver\ClusterSolver();

$clusterSolver->addCluster(SolviceEntity\Cluster::make('Cluster 1', 'single_paper', 3));
$clusterSolver->addCluster(SolviceEntity\Cluster::make('Cluster 2', 'single_paper', 1));

$clusterSolver->addEntity(
    SolviceEntity\Entity::make(
        'Single Paper 1',
        'single_paper',
        SolviceCollection\KeywordCollection::make(
            SolviceEntity\Keyword::make('sig_1'),
            SolviceEntity\Keyword::make('sig_2')
        )
    )
);

$clusterSolver->addEntity(
    SolviceEntity\Entity::make(
        'Single Paper 2',
        'single_paper',
        SolviceCollection\KeywordCollection::make(
            SolviceEntity\Keyword::make('sig_1'),
            SolviceEntity\Keyword::make('sig_2')
        )
    )
);

$clusterSolver->addEntity(
    SolviceEntity\Entity::make(
        'Single Paper 3',
        'single_paper',
        SolviceCollection\KeywordCollection::make(
            SolviceEntity\Keyword::make('sig_1'),
            SolviceEntity\Keyword::make('sig_2')
        )
    )
);

$clusterSolver->addEntity(
    SolviceEntity\Entity::make(
        'Single Paper 4',
        'single_paper',
        SolviceCollection\KeywordCollection::make(
            SolviceEntity\Keyword::make('sig_5'),
            SolviceEntity\Keyword::make('sig_6')
        )
    )
);

$response = $solviceClient->solve($clusterSolver)
$job = $solviceClient->fetchJob($response->getId());

if ($job->isSolving()) {
    // Job is not done yet -> requeue
}

if ($job->isSolved()) {
    
}

```

```
if ($job->isSolved()) {

    $response->getScore()->isFeasible();
    
    // Error messages (hard and soft constraints)
    echo $response->getUnresolvedItems()
        ->byLevel(SolviceEntity\UnresolvedItemLevel::HARD)
        ->joinBy('name');
    
    echo $response->getUnresolvedItems()
        ->byLevel(SolviceEntity\UnresolvedItemLevel::SOFT)
        ->joinBy('name');
    
    foreach ($response->getAssignments() as $assignment) {
        if ($assignment->hasRoomSlot()) {
            echo $assignment->getCluster()->getName()
                . ' is assigned to '
                . $assignment->getRoomSlot()->getRoom()->getName();
        }
    }
}
```