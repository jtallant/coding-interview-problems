# Find the area of two intersecting rectangles
* Rectangle 1: C1 = (x => 2, y => 1), C2 = (x => 5, y => 5)
* Rectangle 2: C1 = (x => 3, y => 2), C2 = (x => 5, y => 7)
* Find where they intersect
* Calculate that area
* Return false if they don't intersect

We could use subtraction and calculate the area but instead
we will caclulate the coordinates of the intersecting rectangle
and then return the area of that rectangle.

* C1 = (x, y)
* C2 = (x, y)
* Intersecting R = [(x,y), (x,y)]

```
C1x = 3 = The largest smallest x value of the two rectangles
C1y = 2 = The largest smallest y value of the two rectangles
C2x = 5 = The smallest largest x value of the two rectangles
C2y = 5 = The smallest largest y value of the two rectangles
```

```
// Using an object to make a new rectangle to get the area
$rect = new Rectangle(C1, C2);
$intersectingArea = $rect->area();

// Using subtraction
Rectangle = (3,2), (5, 5)
Area = (5 - 3) x (5 - 2) = 2 x 3 = 6
```

``
Largest Smallest X Value (largest intersecting starting point)
First get the smallest x value of both
R1.smallestX = min(r1.c1.x, r1.c2.x) = 2
R2.smallestX = min(r2.c2.x, r2.c2.x) = 3

Largest starting point of the two rectangles = 3

Smallest Largest X Value (largest intersecting/shared ending point) = 5

if 5 - 3 is not greater than 0, they don't intersect.
```