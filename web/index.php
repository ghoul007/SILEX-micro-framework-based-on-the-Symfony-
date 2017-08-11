<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();
$app = new DI\Bridge\Silex\Application();

$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__ . '/development.log',
));

$app->get('/hello/{name}', function ($name, Greeter $greeter,  \Silex\Application $app) {
    $app['monolog']->info(sprintf("Hello '%s' .", $name));
    return $greeter->greet($name);
});

$app->run();


class Greeter
{
//    private $logger;
//    public function __construct(\Psr\Log\LoggerInterface $logger)
//    {
//        $this->logger = $logger;
//    }

    public function greet($name)
    {
        return "hello $name";
    }

}