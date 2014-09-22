<?php

class InputTest extends \PHPUnit_Framework_TestCase
{
    public function testInputRead()
    {
        $input = new \Problem2\Input;
        $this->assertEquals('', $input->getPlotNumber());
        $this->assertEquals([''], $input->getProfitabilities());
    }
}
 