<?php

namespace Problem2;

/**
 * Finds the solution for the problem of plots profitability.
 */
class PlotCalculator
{
    private $input;
    private $firstPlot;
    private $lastPlot;
    private $profitability;

    public function __construct(InputInterface $input = null)
    {
        $this->input = $input;
    }

    /**
     * Calculates profitability of plots. Main algorithm.
     *
     * @throws \Exception
     */
    public function calculate()
    {
        if (empty($this->input)) {
            throw new \Exception('There\'s no input set. How can I calculate?');
        }

        //Profitabilities could be count
        $plotNumber = $this->input->getPlotNumber();
        $profitabilities = $this->input->getProfitabilities();

        for ($x = 0; $x < $plotNumber; $x++) {
            $maxLength = $plotNumber - $x;
            for ($y = 1; $y <= $maxLength; $y++) {
                $slice = array_slice($profitabilities, $x, $y);
                $sum = array_sum($slice);

                //checking if we have a new record
                if ($sum > $this->profitability ||
                    ($sum == $this->profitability && $y < ($this->lastPlot - $this->firstPlot + 1))
                ) {
                    $this->profitability = $sum;
                    $this->firstPlot = $x + 1;
                    $this->lastPlot = $x + $y;
                }
            }
        }
    }

    public function getInput()
    {
        return $this->input;
    }

    public function setInput(InputInterface $input)
    {
        $this->input = $input;
    }

    public function getfirstPlot()
    {
        return $this->firstPlot;
    }

    public function getLastPlot()
    {
        return $this->lastPlot;
    }

    public function getProfitability()
    {
        return $this->profitability;
    }

    /**
     * Gets result as one array where 0 key is first plot,
     * 1 is last plot, 2 is profitability
     *
     * @return array
     */
    public function getResultAsArray()
    {
        return [
            $this->firstPlot,
            $this->lastPlot,
            $this->profitability
        ];
    }
} 