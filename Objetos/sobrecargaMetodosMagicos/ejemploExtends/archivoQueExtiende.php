<?php

/**
 * @author Carlos Neira Sanchez
 * @mail arj.123@hotmail.es
 * @telefono ""
 * @nameAndExt archivoQueExtiende.php
 * @fecha 02-may-2016
 */

require_once 'claseAbstract.php';
require_once'suelto.php';

class Prueba extends claseAbstract{
    
    protected $miArray = array(
        "primero" => '',   
        "segundo" => ''
            );
    protected $años = 5;
    protected $altura = 1.50;
    
    function getMiArray() {
        return $this->miArray;
    }

    function getAños() {
        return $this->años;
    }

    function getAltura() {
        return $this->altura;
    }

    function setMiArray($miArray) {
        $this->miArray = $miArray;
    }

    function setAños($años) {
        $this->años = $años;
    }

    function setAltura($altura) {
        $this->altura = $altura;
    }

     //fin clase
}

  
    $obj = new Prueba(array("tercero" => "3", "segundo" => "2", "primero" => "1"),100);
    echo "Mostramos array del objeto: ".var_dump($obj->getMiArray()).'<br>';
    echo 'total '.$obj->getAños(). ' de edad.<br>'.
         'La altura es: '.$obj->getAltura(). ' de altura.<br>';
    
    echo'<br><br>';
    
    $obj2 = new Prueba(array("sexto" => "6", "quinto" => "5", "cuarto" => "4"),-100);
    echo "Mostramos array del objeto: ".var_dump($obj->getMiArray()).'<br>';
    echo 'total '.$obj->getAños(). ' de edad.<br>'.
         'La altura es: '.$obj->getAltura(). ' de altura.<br>';
    
        saludo();
        echo $despedida;