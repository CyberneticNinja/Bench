<?php
/**
 * Created by PhpStorm.
 * User: abrokwahs
 * Date: 11/7/18
 * Time: 4:07 PM
 */
    require('vendor/autoload.php');
    use Benchmark\Benchmark as bench;

    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();

    echo bench::helloWorld();
