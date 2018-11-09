<?php
/**
 * Created by PhpStorm.
 * User: abrokwahs
 * Date: 11/9/18
 * Time: 10:07 AM
 */

namespace Test;
use Reporter\Reporter;

class ReporterTest extends \PHPUnit\Framework\TestCase
{
    public function testConstruc()  {
        $report = new Reporter('test','.pdf');

        $this->assertEquals($report->getFileName(),'test');
        $this->assertEquals($report->getFileType(),'.pdf');
        $this->assertNotEquals($report->getFileName(),'.html');
    }
}