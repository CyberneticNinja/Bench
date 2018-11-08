<?php
/**
 * Created by PhpStorm.
 * User: abrokwahs
 * Date: 11/7/18
 * Time: 4:07 PM
 */
    require('vendor/autoload.php');
    use Benchmark\Benchmark;

    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();

    function hi(){
        sleep(5);
        echo 'hello world'."<br/>";
    }

    function tired(){
        echo ' I am tired let me sleep a bit <br/>';
        sleep(6);
        echo ' I am awake now <br/>';
    }

    function favorite($movie){
        sleep(7);
        echo "My favorite movie is $movie ".'<br/>';
    }

    $bench = new Benchmark();

    $bench->runBenchmark("tired",3,[]);
    $bench->runBenchmark("favorite",3,["The Godfather:Part II"]);
    $bench->runBenchmark("hi" ,5,[]);

