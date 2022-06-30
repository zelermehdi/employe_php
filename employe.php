<?php
class Employe {
    private $name;
	private $lastName;
    private $date;
    private $poste;
    private $salaire; 
    private $service;
    private $agency;
    private $children;

public function __construct( $name, $lastName,$date,$poste,$salaire,$service,$agency, $children) {

$this-> name=$name;
$this-> lastName=$lastName;
$this-> date=$date;
$this-> poste=$poste;
$this-> salaire=$salaire;
$this-> service=$service;
$this-> agency=$agency;
$this-> children=$children;

}
public function getName() 
{
    return $this -> name;
}
public function getlastName() 
{
    return $this -> lastName;
}
public function getDate() 
{
    return $this -> date;
}
public function getPosteme() 
{
    return $this -> poste;
}
public function getSalaire() 
{
    return $this -> salaire;
}
public function getService() 
{
    return $this -> service;
}
public function getAgency() 
{
    return $this -> agency;
}


public function embaucheTime() {
    $embauche = new DateTime($this->date);
    $now = new DateTime();
    $test = $now->diff($embauche);
    return $test->format('%y');
}

public function getAnnualBonus() {
    $hiringYears = $this->embaucheTime();
    $baseBonus = $this->salaire  * 0.05;
    $seniorityBonus = $hiringYears * ($this->salaire *0.02);
    $annualBonus = $baseBonus + $seniorityBonus;
    return $annualBonus;
}

public function verifyVacationVouchers() {
    if($this->embaucheTime() > 1){
        return true;
    }
    else{
        return false;
    }
}

    /**
     * Get the value of children
     */ 
    public function getChildren()
    {
        return $this->children;
    }
    public function noelcheque() {
        if(count($this->children)>0){
            $totalVoucher = 0;
    
            foreach ($this->children as $child) {
                if ($child <= 10) {
                    $totalVoucher += 20;
                }
                else if ($child > 10 && $child <= 15) {
                    $totalVoucher += 30;
                }
                else if ($child > 15 && $child <= 18) {
                    $totalVoucher += 50;
                }
            }
    
            return $totalVoucher == 0 ?  false : $totalVoucher;
        }
        else{
            return false;
        }
    }
}
