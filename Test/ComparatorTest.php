<?php
/**
 * Created by PhpStorm.
 * User: abrokwahs
 * Date: 11/7/18
 * Time: 5:17 PM
 */

namespace Test;
use Comparator\Comparator;

class ComparatorTest extends \PHPUnit\Framework\TestCase
{

    public function testFoo()   {
        $foo = true;
        $this->assertTrue($foo);
    }

    public function testMinExec(){
        $x = [
            "tired"=>[  3.0010640621185,3.0004940032959,3.0004200935364],
            "favorite"=>[4.0003950595856,4.0013420581818,4.0010249614716],
            "hi" =>[2.000941991806,2.0004789829254,2.0000360012054,2.000431060791,2.0005791187286],
            "Fibonacci" =>[0.015254020690918,0.017604112625122,0.019544124603271,0.022502183914185,0.015537977218628]
        ];

        $compare = new Comparator();

        //result
        $r = $compare->minExecution($x);
        $this->assertArrayHasKey('Fibonacci',$r);

        $c =0;
        foreach ($r as $key =>$value) {
            if($c === 0)    {
                $this->assertTrue($key ==='Fibonacci');
                $this->assertTrue($value === 0.015254020690918);
            }
            elseif($c === 1)    {
                $this->assertTrue($key ==='hi');
                $this->assertTrue($value === 2.0000360012054);
            }
            elseif($c === 2)    {
                $this->assertTrue($key ==='tired');
                $this->assertTrue($value === 3.0004200935364);
            }
            elseif($c === 3)    {
                $this->assertTrue($key ==='favorite');
                $this->assertTrue($value === 4.0003950595856);
            }
            $c++;
        }

    }

}
