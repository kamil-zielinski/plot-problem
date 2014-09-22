<?php

use Problem2\Input;
use Problem2\PlotCalculator;

class PlotCalculatorTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \Exception
     */
    public function testEmptyInputThrowsException()
    {
        $calculator = new PlotCalculator();
        $calculator->calculate();
    }

    public function testSeparateResultsSameAsArray()
    {
        $input = new Input(3, [-1, 6, 1]);
        $calculator = new PlotCalculator($input);
        $calculator->calculate();
        $this->assertEquals([
                $calculator->getFirstPlot(),
                $calculator->getLastPlot(),
                $calculator->getProfitability()
            ],
            $calculator->getResultAsArray());
    }

    public function testOnePlot()
    {
        $this->assertCalculationOk(1, [1], [1, 1, 1]);
    }

    public function testTwoPlotsOneResult()
    {
        $this->assertCalculationOk(2, [1, -1], [1, 1, 1]);
    }

    public function testTwoPlotsTwoResult()
    {
        $this->assertCalculationOk(2, [1, 6], [1, 2, 7]);
    }

    public function testThreePlots()
    {
        $this->assertCalculationOk(3, [-1, 6, 1], [2, 3, 7]);
    }

    public function testThreePlotsWithZero()
    {
        $this->assertCalculationOk(3, [-1, 6, 0], [2, 2, 6]);
    }

    public function testFivePlotsOneResult()
    {
        $this->assertCalculationOk(5, [-1, 4, -4, 0, 5], [5, 5, 5]);
    }

    public function testFivePlotsTwoResult()
    {
        $this->assertCalculationOk(5, [-1, 6, 4, 0, -5], [2, 3, 10]);
    }

    public function testFivePlotsAllResult()
    {
        $this->assertCalculationOk(5, [1, 6, 4, -1, 5], [1, 5, 15]);
    }

    public function testTwoSameResults()
    {
        $this->assertCalculationOk(7, [-1, 6, 4, -99, 7, 3, -3], [2, 3, 10]);
    }

    public function testTwoSameFirstShorter()
    {
        $this->assertCalculationOk(7, [-1, 6, 4, -99, 6, 1, 3, -3], [2, 3, 10]);
    }

    public function testManyZeros()
    {
        $this->assertCalculationOk(7, [0, 0, 4, -4, 0, 0, 5, 0], [7, 7, 5]);
    }

    public function testManyZerosTwoNumbers()
    {
        $this->assertCalculationOk(8, [0, 0, 4, -4, 0, 0, 5, 5, 0], [7, 8, 10]);
    }

    protected function assertCalculationOk($plotNumber, $profitabilities, $result)
    {
        $input = new Input($plotNumber, $profitabilities);
        $calculator = new PlotCalculator($input);
        $calculator->calculate();
        $this->assertEquals($result, $calculator->getResultAsArray());
    }
}