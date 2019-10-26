<?php

function dd($var)
{
    var_dump($var);
    die;
}

class Rectangle
{
    public function __construct(array $a, array $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    function startingX()
    {
        return min($this->a['x'], $this->b['x']);
    }

    function endingX()
    {
        return max($this->a['x'], $this->b['x']);
    }

    function startingY()
    {
        return min($this->a['y'], $this->b['y']);
    }

    function endingY()
    {
        return max($this->a['y'], $this->b['y']);
    }

    function width()
    {
        return $this->endingX() - $this->startingX();
    }

    function height()
    {
        return $this->endingY() - $this->startingY();
    }

    function area()
    {
        return $this->width() * $this->height();
    }
}

$r1 = new Rectangle(
    ['x' => 2, 'y' => 1],
    ['x' => 5, 'y' => 5]
);

$r2 = new Rectangle(
    ['x' => 3, 'y' => 2],
    ['x' => 5, 'y' => 7]
);

function intersectingRectangle(Rectangle $r1, Rectangle $r2)
{
    $largestSmallestXofTheTwo = max([$r1->startingX(), $r2->startingX()]);
    $x1 = $largestSmallestXofTheTwo;

    $largestSmallestYOfTheTwo = max([$r1->startingY(), $r2->startingY()]);
    $y1 = $largestSmallestYOfTheTwo;

    $smallestLargestXOfTheTwo = min([$r1->endingX(), $r2->endingX()]);
    $x2 = $smallestLargestXOfTheTwo;

    $smallestLargestYOfTheTwo = min([$r1->endingY(), $r2->endingY()]);
    $y2 = $smallestLargestYOfTheTwo;

    if (false === ($smallestLargestXOfTheTwo - $largestSmallestXofTheTwo) > 0) {
        return false;
    }

    if (false === ($smallestLargestYOfTheTwo - $largestSmallestYOfTheTwo) > 0) {
        return false;
    }

    $intersect = new Rectangle(
        ['x' => $x1, 'y' => $y1],
        ['x' => $x2, 'y' => $y2]
    );

    return $intersect;
}

$test1 = 6 == intersectingRectangle($r1, $r2)->area();

$r1 = new Rectangle(['x' => -3, 'y' => 7], ['x' => 0, 'y' => -4]);
$r2 = new Rectangle(['x' => -2, 'y' => 5], ['x' => 2, 'y' => -2]);

$test2 = 14 == intersectingRectangle($r1, $r2)->area();

$r1 = new Rectangle(['x' => -2, 'y' => 2], ['x' => 0, 'y' => 2]);
$r2 = new Rectangle(['x' => 2, 'y' => 2], ['x' => 4, 'y' => 2]);

$test3 = false === intersectingRectangle($r1, $r2);

$r1 = new Rectangle(['x' => 0, 'y' => 0], ['x' => 4, 'y' => 4]);
$r2 = new Rectangle(['x' => 0, 'y' => -4], ['x' => 4, 'y' => -4]);

$test4 = false === intersectingRectangle($r1, $r2);

if ($test1 && $test1 && $test3 && $test4) {
    dd('Success');
}

dd('Fail');