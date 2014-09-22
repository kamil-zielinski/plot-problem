<?php

namespace Problem2;

class Input implements InputInterface
{
    private $plotNumber;
    private $profitabilities;

    public function __construct()
    {
        //input is always valid, no need to do this
        //$this->validateInput();
        $stdin = fopen("php://stdin","r");
        $this->plotNumber = trim(fgets($stdin));
        $this->profitabilities = explode(' ', trim(fgets($stdin)));
        fclose($stdin);
    }

    public function getPlotNumber()
    {
        return $this->plotNumber;
    }

    public function getProfitabilities()
    {
        return $this->profitabilities;
    }
}
