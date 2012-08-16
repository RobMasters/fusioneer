<?php

require_once __DIR__.'/../vendor/autoload.php';

use Fusioneer\Grid\Grid;
use Fusioneer\Populator\RandomLetterPopulator;

$app = new Silex\Application();

$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/views',
    'twig.options' => array('debug' => true)
));
$app['twig']->addExtension(new Twig_Extensions_Extension_Debug());


$app->get('/hello', function() {
    return 'Hello!';
});


$app->get('/', function() use ($app) {
    $grid = new Grid();
    $grid
        ->setWidth(5)
        ->setHeight(5)
        ->setPopulator(new RandomLetterPopulator())
    ;

    return $app['twig']->render('index.html.twig', array('grid' => $grid));
});

$app->run();
