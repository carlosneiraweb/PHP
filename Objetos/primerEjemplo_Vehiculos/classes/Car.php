<?php

/* 
    Created on : 20-mar-2016, 17:26:43
    Author     : carlos
    Nombre Archivo : Car.php
    Email: arj.123@hotmail.es 
*/
require_once("Vehicle.php");
class Car extends Vehicle{
    const  WHEEL = 4;
    private $seats = 0;

    /**
     * Nos devuelve el rendimiento del vehiculo
     * Método static
     * @param type $km
     * @param type $litros
     * @return type
     */
    public static function rendimiento($km, $litros){
        return $km / $litros;
    }
    /**
     * Devuelve número de asientos
     * @return type
     */
    public function getSeats(){
       return  $this->seats;
    } 
    /**
     * Introducimos número de asientos
     * @param type $x
     */
    public function setSeats($x){
        $this->seats + $x;
    }
    /**
     * Devuelve la rama de vehiculo
     * @return type
     */
    public function getBranch(){
        return $this->branch;
    }
    /**
     * Introducimos el tipo de rama de vehiculo
     * @param type $x
     */
    public function setBranch($x){
        $this->branch = $x;
    }
   
}

