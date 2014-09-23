<?php

namespace Problem2;

/**
 * Input implementation for PlotCalculator
 * By default it reads data from STDIN
 */
class Input implements InputInterface
{
    private $plotNumber;
    private $profitabilities;

    /**
     * Reads plot number and profitabilities from STDIN if not provided as params
     *
     * @param $plotNumber
     * @param $profitabilities
     */
    public function __construct($plotNumber = null, array $profitabilities = null)
    {
        if (!empty($plotNumber) && !empty($profitabilities)){
            $this->plotNumber = $plotNumber;
            $this->profitabilities = $profitabilities;
        } else {
            //input is always valid, no need to do this
            //$this->validateInput();
            $stdin = fopen("php://stdin","r");
            $this->plotNumber = trim(fgets($stdin));
            $this->profitabilities = explode(' ', trim(fgets($stdin)));
            fclose($stdin);
        }
    }

    public function getPlotNumber()
    {
        return $this->plotNumber;
    }

    public function getProfitabilities()
    {
        return $this->profitabilities;
    }

    public function setPlotNumber($plotNumber)
    {
        $this->plotNumber = $plotNumber;
    }

    public function setProfitabilities($profitabilities)
    {
        $this->profitabilities = $profitabilities;
    }
}
