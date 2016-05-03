<?php

/* 
    Created on : 20-mar-2016, 18:03:19
    Author     : carlos
    Nombre Archivo : Vehicle.php
    Email: arj.123@hotmail.es 
*/

//Public => Se puede acceder tanto si el código llamante esta dentro de la clase o fuera
//Private => Sólo se puede acceder por código dentro de la clase. Las clases que herdan tampoco
//Protected => Igual que private pero las clases que heredan si tienen acceso
//Propiedaes static, se accede: Car::$miPropiedad. Preservan el valor durante la vida del objeto
//Constantes de clase=> Se declaran const MICONSTANTE = 10; Se accede Car::MICONSTANTE, Su valor no varía nunca.
//Métodos tiene el mismo comportamiento
class Vehicle{
    
    const COUNTRY = 'spaish';
    public static $total = 0;
   
    
    public $year;
    public $manufacturer;
    private $type;
    private $speed =0;
    protected $branch;
    
    /**
     * Este método acelera el vehiculo
     * @return boolean
     */
   public function accelerate(){
       if ($this->speed >= 100) return false;
       $this->speed += 10;
       return true;
   }
   /**
    * Este método frena el vehiculo
    * @return boolean
    */
   public function brake(){
       if($this->speed <= 0) return false;
       $this->speed -= 10;
       return true;
   }
   /**
    * Este método devuelve la velocidad
    * @return type
    */
   public function getSpeed(){
       return $this->speed;
   }
   /**
    * 
    * @return type
    */
   public function getType(){
       return $this->type;
   }
   /**
    * Introducimos el tipo de vehiculo
    * @param type $x
    */
   public function setType($x){
       $this->type = $x;
   }
}

