<?php
// by abdelah nsila
class Aeroport{
    private  $NomAeroport; 
    private  $Latitude;
    private  $Longitude;
    
    function __construct($NomAeroport ,$Latitude ,$Longitude){
        $this->NomAeroport=$NomAeroport;
        $this->Latitude = $Latitude;
        $this->Longitude = $Longitude;
    }
    function distance($a,$b){
        $lat1 = $a->get_Latitude();
        $lat2 = $b->get_Latitude();
        $long1 = $a->get_Longitude();
        $long2 = $b->get_Longitude();
        $d = acos(sin($lat1)*sin($lat2)+cos($lat1)*cos($lat2)*cos($long1-$long2)); 
        return $d;
    }
    function get_NomAeroport(){
        return $this->NomAeroport;
    }
    function get_Latitude(){
        return $this->Latitude;
    }
    function get_Longitude(){
        return $this->Longitude;
    }
    
}
$rabat = new Aeroport('Rabat',34.036182,-6.748793);
$casablanca = new Aeroport('Casablanca',34.076182,-7.248793);
$dis =  $rabat -> distance($rabat, $casablanca);
echo "$dis";


?>