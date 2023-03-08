<?php

require __DIR__ . '/vendor/autoload.php';
use Cocur\Slugify\Slugify; //name space

$slugify = new Slugify();
echo $slugify->slugify('The sky is blue, and the greass is green!!!');
