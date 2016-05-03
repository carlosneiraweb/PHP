<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validate
 *
 * @author Carlos Neira Sanchez
 */
 class Validate implements InterfazValidar{
    private $requeridos = array();
    private $perdidos = array();
    
    public function __construct($req, $miss) {
       
        $tmpReq ="";
        $tmpPer ="";
        
        foreach ($req as $tmpReq){
            array_push($this->requeridos, $tmpReq);
        }
        
        foreach ($miss as $tmpPer){
            array_push($this->perdidos, $tmpPer);
        }
        
    }
    function getRequeridos() {
        return $this->requeridos;
    }

    function getPerdidos() {
        return $this->perdidos;
    }

    function setRequeridos($requeridos) {
        $this->requeridos = $requeridos;
    }

    function setPerdidos($perdidos) {
        $this->perdidos = $perdidos;
    }

        /*
     * Metodo que valida que el campo 
     * recivido no se encuentrar en el array 
     * de elementos obligatorios.
     * retorna un string con class="error"
     * Se define como final para evitar la sobreescritura,
     * medida de seguridad.
     * 
     */
      final  public function validateField($nombreCampo, $camposPerdidos){
            if(in_array($nombreCampo, $camposPerdidos)){
                return 'class="error"';
            }else{
                return;
            }
        }
           
     /**
      * Metodo que recive un parametro $_POST desde el script.
      * si es distinto de null lo devuelve para que se 
      * vuelva a escribir en el formulario
      * @param type $nombreCampo
      */   
    public function setValue($nombreCampo){
            if(isset($_POST[$nombreCampo])){
                return $_POST[$nombreCampo];
            }
        }
    
    /**
     * Metodo para dejar checkeado los campos 
     * que el usuario a checked.
     * Recive el nombre del campo y su valor
     * @param type $nombreCampo
     * @param type $campoValor
     */
    function setChecked($nombreCampo, $campoValor){
            if(isset($_POST[$nombreCampo]) and $_POST[$nombreCampo] == $campoValor){
                //echo 'Valor de $_post= '.$_POST['gender'];
                return 'checked="checked"';
            }
        }
         
    /**
     * Metodo que deja seleccionado el campo elegido en un select
     * Recive como parametro el nombre del campo y su valor
     * @param type $nombreCampo
     * @param type $valorCampo
     */    
    function setSelected($nombreCampo, $valorCampo){
            if(isset($_POST[$nombreCampo]) and $_POST[$nombreCampo] == $valorCampo){
                return 'selected="selected"';
            }
        }
        
    /**
     * Metodo para asegurarnos que el usuario ha aceptado
     * las condiciones. 
     * Se define final para evitar la sobreescritura. 
     */
    final public function comprobarCheck($nombreCampo){
       
        if(isset($_POST[$nombreCampo]) and $_POST[$nombreCampo] != '1'){
            echo '<h3>Tienes que aceptar las condiciones</h3>';
        }  
          
        
    }    
        
        
    /**
     * 
     * Metodo que para mostrar un objeto de la clase
     * @return string
     */
     
    public function __toString()
    {
        $tmpReq ="";
        $tmpMi ="";
        
        foreach ($this->requeridos as $ele){
            $tmpReq .= "Elemento requerido: ".$ele.'<br>';
        }
        
        foreach($this->perdidos as $miss){
            $tmpMi .= "Elemento perdido: ".$miss.'<br>';
        }
        $mostrar = $tmpReq.'<br>'.$tmpMi;
        return $mostrar;
    }
       
   
    
}
