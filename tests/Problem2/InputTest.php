<?php

class InputTest extends \PHPUnit_Framework_TestCase
{
    public function testInputRead()
    {
        $input = new \Problem2\Input;
        $this->assertEquals('', $input->getPlotNumber());
        $this->assertEquals([''], $input->getProfitabilities());
    }

    public function testInputSet()
    {
        $plotNumber = 3;
        $profitabilities = [-1, 2, 3];
        $input = new \Problem2\Input($plotNumber, $profitabilities);
        $this->assertEquals($plotNumber, $input->getPlotNumber());
        $this->assertEquals($profitabilities, $input->getProfitabilities());
    }
}
 