<?php
/**
 * Created by PhpStorm.
 * User: abrokwahs
 * Date: 11/7/18
 * Time: 4:07 PM
 */
    require('vendor/autoload.php');
    use Benchmark\Benchmark;
    use Comparator\Comparator;
    use Reporter\Reporter;

    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();

    function hi(){
        sleep(2);
        echo 'hello world'."<br/>";
    }

    function tired(){
        echo ' I am tired let me sleep a bit <br/>';
        sleep(3);
        echo ' I am awake now <br/>';
    }

    function favorite($movie){
        sleep(4);
        echo "My favorite movie is $movie ".'<br/>';
    }

    function Fibonacci($n){

        $num1 = 0;
        $num2 = 1;

        $counter = 0;
        while ($counter < $n){
//            echo ' '.$num1;
            sleep(0.5);
            $num3 = $num2 + $num1;
            $num1 = $num2;
            $num2 = $num3;
            $counter = $counter + 1;
        }
    }

    //Benchmarks
    $bench = new Benchmark();

    $bench->runBenchmark("tired",3,[]);
    $bench->runBenchmark("favorite",3,["The Godfather:Part II"]);
    $bench->runBenchmark("hi" ,5,[]);
    $bench->runBenchmark("Fibonacci" ,5,[25]);

    //Comparison of Benchmark results
    $compare = new Comparator();
    $compare->minExecution($bench->getstoredResults());
    $compare->maxExecution($bench->getstoredResults());
    dump($compare->maxExecution($bench->getstoredResults()));
    dump($compare->maxExecution($bench->getstoredResults()));
//    dump($compare->minExecution($bench->getstoredResults()));
//    $avgMean = $compare->MeanExecution($bench->getstoredResults());
//
    $report = new Reporter('testX','.html');
    $report->add('These are the initial functions and their execution times',$bench->getstoredResults());
////    $report->add('Max execution times',$compare->maxExecution($bench->getstoredResults()));
    $report->add('Longest execution time',$compare->maxExecution($bench->getstoredResults()));
//    $report->add('Quickest execution time',$compare->minExecution($bench->getstoredResults()));
//
//    echo $report->getFormatedPrint();
//
    $report->write();
//
//    $report = new Reporter('test2','.txt');
//    $report->add('These are the initial functions and their execution times',$bench->getstoredResults());
//    //    $report->add('Max execution times',$compare->maxExecution($bench->getstoredResults()));
//    $report->add('Longest execution time',$compare->maxExecution($bench->getstoredResults()));
//    $report->add('Quickest execution time',$compare->minExecution($bench->getstoredResults()));
//
//    echo $report->getFormatedPrint();
//
//    $report->write();
//
//    $report = new Reporter('test3','.pdf');
//    $report->add('These are the initial functions and their execution times',$bench->getstoredResults());
//    $report->add('Longest execution time',$compare->maxExecution($bench->getstoredResults()));
//    $report->add('Quickest execution time',$compare->minExecution($bench->getstoredResults()));
//
//    echo $report->getFormatedPrint();
//
//    $report->write();
