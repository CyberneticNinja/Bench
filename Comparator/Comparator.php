<?php
/**
 * Created by PhpStorm.
 * User: abrokwahs
 * Date: 11/8/18
 * Time: 6:58 AM
 */

namespace Comparator;


class Comparator
{

    /**
     * Comparator constructor.
     */
    public function __construct()
    {
    }

    // Comparison function
    protected function cmp($a, $b) {
        if ($a == $b) {
            return 0;
        }
        return ($a < $b) ? -1 : 1;
    }

    // 2nd Comparison function
    protected function cmp2($a, $b) {
        if ($a == $b) {
            return 0;
        }
        return ($a > $b) ? -1 : 1;
    }


    //minExecution(array $functionResults) returns an array sorted by the fastest execution-time containing the
    //single fastest execution time.
    public function minExecution(array $functionResults)  {
        $sortAndTrimmed = [];
        foreach ($functionResults as $key =>$value)   {
            sort($value,SORT_NUMERIC);
            $sortAndTrimmed[$key] = $value[0];
        }
        uasort($sortAndTrimmed,array($this,"cmp"));
        return $sortAndTrimmed;
    }

    //maxExecution(array $functionResults) returns an array sorted by the slowest execution-time containing the
    //single longest execution time.
    public function maxExecution(array $functionResults)  {
        $sortAndTrimmed = [];
        foreach ($functionResults as $key =>$value)   {
            rsort($value,SORT_NUMERIC);
            $sortAndTrimmed[$key] = $value[0];
        }
        uasort($sortAndTrimmed,array($this,"cmp2"));
        return $sortAndTrimmed;
    }
    //minExecution(array $functionResults) returns an array sorted by the fastest avg execution-time containing the
    //avg execution time.
    public function MeanExecution(array $functionResults)  {
        $results = [];

        foreach ($functionResults as $key =>$value)   {
            $avg = 0;
            for ($c=0;$c <sizeof($value);$c++)  {
                $avg = $avg + $value[$c];
            }
            $avg = $avg/sizeof($value);
            $results[$key] = $avg;
        }
        uasort($results,array($this,"cmp"));
        return $results;
    }

    public function minExecutionDescending(array $functionResults)  {
        $reverse = array_reverse($this->minExecution($functionResults));
        return $reverse;
    }
    public function maxExecutionDescending(array $functionResults)  {
        $reverse = array_reverse($this->maxExecution($functionResults));
        return $reverse;
    }
    public function MeanExecutionDescending(array $functionResults)  {
        $reverse = array_reverse($this->MeanExecution($functionResults));
        return $reverse;
    }
}