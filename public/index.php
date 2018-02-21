<?php

use app\src\Parsers\ParserFilmix;
use app\src\Scrapper;
use app\src\Transporters\CurlTransport;

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

//$t = new CurlTransport();
//$p = new ParserFilmix();

$scrapper = new Scrapper(new CurlTransport(), new ParserFilmix());

$film = $scrapper->get('https://filmix.me/real_tv/104350-discovery-ulichnye-gonki.html');

?>

<h1><?php echo $film->title ?></h1>
<img src="<? echo $film->poster ?>"/>
<p><? echo $film->description ?></p>

</body>
</html>





