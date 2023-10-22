# Elevator Challenge

## Objective

Create a program that will navigate the requested set floors per the rules below.

## Requirements

- For each `t`, as shown in the table below, all the floors in the respective `t` need to be navigated prior to moving to the next `t` element.
- For each `t`, the elevator must exhaust all the floors in the same direction sequentially, prior to switching directions. I.e., if the elevator is currently going up, it must navigate to all the higher floors prior to switching to a downward direction.
- After all `t` elements have been navigated, the application should produce an output describing the path it took.
- After all `t` elements have been navigated, the application should calculate the total number of times a direction change occurred.

## Expected Outcome

### Exact Expected Output

- For starting at floor 1, going up:
  ```
  1,3,5,16,18
  19,[change],12,5,4,2
  2,1,[change],7,9,20
  [change],17,12,8,4,4
  ```
- Total number of direction changes: 3

## Sample Code

```php
<?php
$t1 = [1, 18, 5, 3, 16];
$t2 = [4, 12, 19, 2, 5];
$t3 = [2, 7, 20, 9, 1];
$t4 = [4, 17, 12, 4, 8];
$t = [$t1, $t2, $t3, $t4];

class Elevator
{
  public function __construct($t)
  {
    // Implementation here
  }
}
?>
```

## My Solution

I solved this problem by encapsulating the elevator logic within a class named `Elevator`. The class takes care of navigating the floors based on the rules and requirements, and it also calculates the number of direction changes. The solution is implemented in PHP and can be found in the file `Elevator.php`.
