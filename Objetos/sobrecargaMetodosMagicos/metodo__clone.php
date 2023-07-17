<?php

/* 
    Created on : 20-mar-2016, 20:15:34
    Author     : carlos
    Nombre Archivo : metodo__clone.php
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
    //Siempre debe estar definido en la clase
    function __clone(){
        $this->id = ++$this->id;
    }
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getEmail() {
        return $this->email;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEmail($email) {
        $this->email = $email;
    }  
//clase    
}
$obj = new Objeto(1, "objeto1", "example@gmail.com");
$x = clone $obj;
echo $x->getId();