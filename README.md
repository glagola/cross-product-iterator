# Cross product of provided iterators

Required php version at least `5.1`

## Installation
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require "glagola/cross-product-iterator" "*"
```

or add

```json
"glagola/cross-product-iterator" : "*"
```

to the require section of your application's `composer.json` file.

## Example

### Code
```php
<?php

use Glagola\CrossProductIterator;

function aa() {
    yield 'x1';
    yield 'x2';
    yield 'x3';
}

$iterator = new CrossProductIterator([
    aa(),
    new ArrayIterator(['y1']),
    new ArrayIterator(['z1', 'z2', 'z3']),
    new ArrayIterator(['f1', 'f2', 'f3']),
]);

foreach ($iterator as $items) {
    echo "['", implode("', '", $items), "']", PHP_EOL;
}
```

### Output
```
['x1', 'y1', 'z1', 'f1']
['x1', 'y1', 'z1', 'f2']
['x1', 'y1', 'z1', 'f3']
['x1', 'y1', 'z2', 'f1']
['x1', 'y1', 'z2', 'f2']
['x1', 'y1', 'z2', 'f3']
['x1', 'y1', 'z3', 'f1']
['x1', 'y1', 'z3', 'f2']
['x1', 'y1', 'z3', 'f3']
['x2', 'y1', 'z1', 'f1']
['x2', 'y1', 'z1', 'f2']
['x2', 'y1', 'z1', 'f3']
['x2', 'y1', 'z2', 'f1']
['x2', 'y1', 'z2', 'f2']
['x2', 'y1', 'z2', 'f3']
['x2', 'y1', 'z3', 'f1']
['x2', 'y1', 'z3', 'f2']
['x2', 'y1', 'z3', 'f3']
['x3', 'y1', 'z1', 'f1']
['x3', 'y1', 'z1', 'f2']
['x3', 'y1', 'z1', 'f3']
['x3', 'y1', 'z2', 'f1']
['x3', 'y1', 'z2', 'f2']
['x3', 'y1', 'z2', 'f3']
['x3', 'y1', 'z3', 'f1']
['x3', 'y1', 'z3', 'f2']
['x3', 'y1', 'z3', 'f3']
```