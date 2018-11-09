<?php
/**
 * Created by PhpStorm.
 * User: abrokwahs
 * Date: 11/6/18
 * Time: 11:41 AM
 */

namespace Benchmark;


class Benchmark
{

    /**
     * Benchmark constructor.
     */
    public function __construct()
    {
    }

    //storedResults = stores functions
    protected $storedResults = [];

    //getMicroTime() returns timestamp in microseconds
    protected function getMicroTime()  {
        return microtime(true);
    }

    //runBenchmark(callable $func,$runNumber,array $parameters),
    public function runBenchmark(callable $func,$runNumber,array $parameters) {

        $resultSet = [];
        for($count = 0;$count <$runNumber;$count++) {
            $start = $this->getMicroTime();
            call_user_func_array($func,$parameters);
            $end = $this->getMicroTime();

//            $roundedResult = round($end-$start,8);
            $roundedResult = $end-$start;
            $resultSet[] = $roundedResult;
        }
        $this->storedResults[(string)$func ] = $resultSet;
//        dump($this->storedResults);
    }

    //returns all the benchmarks
    public function getstoredResults()  {
        return $this->storedResults;
    }
}