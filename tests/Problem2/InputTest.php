<?php

class InputTest extends \PHPUnit_Framework_TestCase
{
    public function testInputRead()
    {
        $plotNumber = 3;
        $profitabilities = [-1, 2, 5];
        fwrite(STDOUT, $plotNumber."\n".$profitabilities);
        $input = new \Problem2\Input;
        $this->assertEquals($plotNumber, $input->getPlotNumber());
        $this->assertEquals($profitabilities, $input->getProfitabilities());
    }
}
 