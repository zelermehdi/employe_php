<?php 
require_once('employe.php');
require_once('agency.php');
require_once('directeur.php');

$agency1 = new Agency('Agency 1', 'Address 1', '76000', 'Rouen', 'Restaurant');
$agency2 = new Agency('Agency 2', 'Address 1', '75000', 'Paris', 'Tickets restaurants');


$directeur= new Director("Mehdi", "Doe", "5/09/2019", "Direction", 12000, "Administration", $agency1,[20,5,10]);
$employe1 = new Employe("Martin", "Roger", "2/10/2000", "Commercial", 25000, "Commercial", $agency1, [25,10,5]);
$employe2 = new Employe("Lafond", "Bruce", "6/18/2015", "Comptable", 18000, "Comptabilité", $agency1, [0]);
$employe3 = new Employe("Colin", "Maxence", "11/28/2010", "Commercial", 22000, "Commercial", $agency2, [8,2]);
$employe4 = new Employe("Colin", "Arthur", "5/12/2022", "Directeur RH", 35000, "Administration", $agency1, [35,28,19]);
$employe5 = new Employe("Bordeaux", "Sidney", "12/30/2008", "Gardien de nuit", 15000, "Securité", $agency2, [16,14,5,5,2]);
var_dump($directeur);

$tablEmployee=array($employe1,$employe2,$employe3,$employe4,$employe5);
// print_r($tablEmployee);
$names=array();
foreach ($tablEmployee as $employe) {
// print_r("L'employé a été embauché il y a " .$date->embaucheTime(). " ans ". "</br>");
    $names[]=$employe->getlastName();
    $lastnames[]=$employe->getName();
    $services[]=$employe->getService();
}

print_r($names);
sendBonus($tablEmployee);
function sendBonus($tablEmployee){
    $today = new DateTime();
    if($today->format('d/m') == "28/06"){
        foreach ($tablEmployee as  $employe) {
            var_dump("\n[VIREMENT BANCAIRE] " .$employe->getAnnualBonus(). "€ vers " .$employe->getname()." " .$employe->getlastname());
        }
    }
    else {
        var_dump("\nCe n'est pas le jour des primes");
    }
}

// <!-- question4 -->
// QUESTION 4
// Afficher nombre employés
// print_r("Il y a actuellement ".count($tablEmployee)." employés dans l'entreprise");

// Afficher employés triés par nom puis par prénom
array_multisort($services, SORT_ASC, $names, SORT_ASC,$lastnames, SORT_ASC, $tablEmployee);
var_dump($tablEmployee);
//  Affiche masse salariale totale
$totalWages = 0;
foreach ($tablEmployee as $employe) {
    $employeeWage =  $employe->getAnnualBonus() + $employe->getSalaire();
    print_r("\n".$employeeWage);
    $totalWages += $employeeWage;
}
print_r("\n----------\nTotal de la masse salariale de l'entreprise cette année : ".$totalWages."€");
// QUESTION 6
foreach ($tablEmployee as $employe) {
            print_r("\nLe mode de restauration de l'agence de ".$employe->getName()." " .$employe->getlastName(). " est " . $employe->getagency()->getRestaurationType(). "\n");
}

// QUESTION 7
foreach ($tablEmployee as $key => $employe) {
    $employe->verifyVacationVouchers() 
    ? 
    print_r("\n".$employe->getName()." " .$employe->getlastName(). " a le droit aux chèques vacances.")
    :
    print_r("\n".$employe->getName()." " .$employe->getlastName(). " n'a pas le droit aux chèques vacances.");
}

// QUESTION 8
foreach ($tablEmployee as $employe) {
    $totalVoucher = $employe->noelcheque() ;
    $totalVoucher
    ? 
    print_r("\n".$employe->getName()." " .$employe->getlastName(). " a le droit aux chèques Noël pour un motant de ". $totalVoucher."€.")
    :
    print_r("\n".$employe->getName()." " .$employe->getlastName(). " n'a pas le droit aux chèques Noël.");
}
// QUESTION 9

// FONCTION POUR DIRECTEUR SEUL MAIS AUSSI IMPLEMENTE A LA QUESTION 2
sendBonuus($directeur);
function sendBonuus($directeur){
    $today = new DateTime();
    if($today->format('d/m') == "28/06"){
            print_r("\n[VIREMENT BANCAIRE] " .$directeur->getAnnualBonus(). "€ vers " .$directeur->getName()." " .$directeur->getlastName());
    }
    else {
        print_r("\nCe n'est pas le jour des primes");
    }
}
