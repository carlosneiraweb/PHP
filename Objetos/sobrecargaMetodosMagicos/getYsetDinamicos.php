<?php

/* 
    Created on : 20-mar-2016, 20:25:15
    Author     : carlos
    Nombre Archivo : getYsetDinamicos.php
    Email: arj.123@hotmail.es 
*/
class Objeto{
    private $id;
    private $nombre;
    private $email;
    
    function __construct($id, $nombre, $email) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
    }
    
    function __clone(){
        
    }      
    public function __set($var, $valor){
        
        if(property_exists(__CLASS__, $var)){
            $this->$var = $valor;
        } else{
            echo "No existe el atributo $var";
        }
    
    }
    
    public function __get($var){
        if(property_exists(__CLASS__, $var)){
            return $this->$var;
        } else {
            return  null;
        }
    }
    
    public function __toString() {
        return  'EL id es: '.$this->id.'<br>'.
                'El nombre es: '.$this->nombre.'<br>'.
                 'El email es: '.$this->email.'<br>';
    }
    
//clase    
}

$obj = new Objeto(null, null, null);
$p = clone $obj;
echo $p->nombre = 'carlos';
echo $p;