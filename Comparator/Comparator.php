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

    // Comparison function
    protected function cmp2($a, $b) {
        if ($a == $b) {
            return 0;
        }
        return ($a > $b) ? -1 : 1;
    }


    public function minExecution(array $functionResults)  {
        $sortAndTrimmed = [];
        foreach ($functionResults as $key =>$value)   {
            sort($value,SORT_NUMERIC);
            $sortAndTrimmed[$key] = $value[0];
        }

        uasort($sortAndTrimmed,array($this,"cmp"));
//        dump($sortAndTrimmed);
//        dump($functionResults);
        return $sortAndTrimmed;
    }

    public function maxExecution(array $functionResults)  {
        $sortAndTrimmed = [];
        foreach ($functionResults as $key =>$value)   {
            rsort($value,SORT_NUMERIC);
            $sortAndTrimmed[$key] = $value[0];
        }

        uasort($sortAndTrimmed,array($this,"cmp2"));
//        dump($sortAndTrimmed);
//        dump($functionResults);
        return $sortAndTrimmed;
    }

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
}