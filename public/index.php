<?php

use app\src\ScrapperFactory;

require '../vendor/autoload.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php

$factory = new ScrapperFactory();

$filmixPage = $factory->create('filmix')->get('https://filmix.me/real_tv/104350-discovery-ulichnye-gonki.html');

$kinohdPage = $factory->create('kinokrad')->get('http://kinokrad.co/315898-moy-malenkiy-poni.html');

?>

<h1><?= $filmixPage->getTitle() ?></h1>
<img src="<?= $filmixPage->getPoster() ?>"/>
<p><?= $filmixPage->getDescription() ?></p>

<h1><?= $kinohdPage->getTitle() ?></h1>
<img src="<?= $kinohdPage->getPoster() ?>"/>
<p><?= $kinohdPage->getDescription() ?></p>

</body>
</html>





