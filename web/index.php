<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app = new DI\Bridge\Silex\Application();

$app->get('/hello/{name}', function ($name, Greeter $greeter) {
    return $greeter->greet($name);
});

$app->run();


class Greeter{

    public function greet($name){

        return "hello $name";
    }
}