<?php
$ablakcim = array(
    'cim' => '-= Pancser BT =-',
);

$fejlec = array(
    'kepforras' => 'logo.png',
    'kepalt' => 'logo',
	'cim' => 'Pancser BT',
	'motto' => '"...jóvanazúgy"'
);

$lablec = array(
    'copyright' => 'Copyright '.date("Y").'.',
    'ceg' => 'Pancser BT.',
    'legal' => 'legal: Az oldal teljes tartalma fiktív és non-profit! <br> Az oldal célja egy iskolai beadandó feladat megvalósítása.'
);

$oldalak = array(
	'/' => array('fajl' => 'cimlap', 'szoveg' => 'Főoldal', 'menun' => array(1,1)),
    'galeria' => array('fajl' => 'galeria', 'szoveg' => 'Galéria', 'menun' => array(1,1)),
	'kapcsolat' => array('fajl' => 'kapcsolat', 'szoveg' => 'Kapcsolat', 'menun' => array(1,1)),
    'belepes' => array('fajl' => 'belepes', 'szoveg' => 'Belépés', 'menun' => array(1,0)),
    'kilepes' => array('fajl' => 'kilepes', 'szoveg' => 'Kilépés', 'menun' => array(0,1)),
    'belep' => array('fajl' => 'belep', 'szoveg' => '', 'menun' => array(0,0)),
    'regisztral' => array('fajl' => 'regisztral', 'szoveg' => '', 'menun' => array(0,0)),
    'message' => array('fajl' => 'message', 'szoveg' => '', 'menun' => array(1,1)),
    'allmessages' => array('fajl' => 'allmessages', 'szoveg' => 'Üzenetek', 'menun' => array(1,1))
);

$hiba_oldal = array ('fajl' => '404', 'szoveg' => 'A keresett oldal nem található!');


try{
$dbh = new PDO('mysql:host=localhost;dbname=webprog', 'root', '',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
    $errormessage = "Hiba: ".$e->getMessage();
}
?>