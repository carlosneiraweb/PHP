<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of claseAbstract
 *
 * @author Carlos Neira Sanchez
 */
abstract class claseAbstract {
  
    protected  $miArray = array();//Este array se va inicilizar sin constructor
    protected $años = 1000;//es sobrescrita como de esperar
    public function __construct($arr,$edad){
         $this->mostrarDatos();
        echo 'Mostramos datos despues instanciar un objeto.'.'<br>';    
        foreach ($arr as $k => $v){
            echo 'key: '.$k. ' valor: '.$v.'<br>';
            if(array_key_exists($k, $this->miArray)){
                $this->miArray[$k] = $v;
                
            }
        $this->años=$edad;//No haria falta, la sobrescribe
        }
        
       
       
    }
    
    
     private function mostrarDatos(){
         echo 'Mostramos datos antes de instanciar un objeto.<br>';
         foreach($this->miArray as $x => $y){
                echo 'Clave: '.$x.'Valor: '.$y.'<br>';
            }
            echo 'La edad es: '.$this->años.'<br>';
            echo'<br><br>';
     }    

//fin clase    
}

