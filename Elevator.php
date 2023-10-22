<?php

class Elevator
{
    private array $elevatorPath = [];
    private int $directionChanges = 0;

    public function __construct(array $t)
    {
        $this->initializeElevatorPath($t);
        $this->outputPath();
        $this->outputDirectionChanges();
    }

    private function initializeElevatorPath(array $t): void
    {
        sort($t[0]);
        $this->elevatorPath = $t[0];
        $direction = 1;

        for ($i = 1; $i < count($t); $i++) {
            $this->processFloors($t[$i], $direction);
            $direction *= -1;
        }
    }

    private function processFloors(array $currentArray, int $direction): void
    {
        $lastFloor = end($this->elevatorPath);
        $sameDirectionFloors = [];
        $oppositeDirectionFloors = [];

        $this->separateFloorsBasedOnDirection($currentArray, $lastFloor, $direction, $sameDirectionFloors, $oppositeDirectionFloors);
        $this->addFloorsToPath($sameDirectionFloors, $direction);
        $this->addDirectionChangeMarker();
        $this->addFloorsToPath($oppositeDirectionFloors, -$direction);
    }

    private function separateFloorsBasedOnDirection(array $currentArray, int $lastFloor, int $direction, array &$sameDirectionFloors, array &$oppositeDirectionFloors): void
    {
        foreach ($currentArray as $floor) {
            if (($direction === 1 && $floor >= $lastFloor) || ($direction === -1 && $floor <= $lastFloor)) {
                $sameDirectionFloors[] = $floor;
            } else {
                $oppositeDirectionFloors[] = $floor;
            }
        }
    }

    private function addFloorsToPath(array $floors, int $direction): void
    {
        if ($direction === 1) {
            sort($floors);
        } else {
            rsort($floors);
        }
        $this->elevatorPath = array_merge($this->elevatorPath, $floors);
    }

    private function addDirectionChangeMarker(): void
    {
        $this->elevatorPath[] = '[change]';
        $this->directionChanges++;
    }

    private function outputPath(): void
    {
        echo implode(',', $this->elevatorPath) . "\n";
    }

    private function outputDirectionChanges(): void
    {
        echo 'Total number of direction changes: ' . $this->directionChanges . "\n";
    }
}

$t1 = [1, 18, 5, 3, 16];
$t2 = [4, 12, 19, 2, 5];
$t3 = [2, 7, 20, 9, 1];
$t4 = [4, 17, 12, 4, 8];
$t = [$t1, $t2, $t3, $t4];

new Elevator($t);

