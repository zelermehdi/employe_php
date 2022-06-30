<?php

// require_once('employe.php');


class Director extends Employe
{


public function getAnnualBonus() {
    $hiringYears = $this->embaucheTime();
    $baseBonus = $this->salaire  * 0.07;
    $seniorityBonus = $hiringYears * ($this->salaire *0.03);
    $annualBonus = $baseBonus + $seniorityBonus;
    return $annualBonus;
}
}