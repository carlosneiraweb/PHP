<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        class CleverString{
            
            private $_theString = "";
            private static $__allowedFunctions = array("strlen","strtoupper", "strpos");
            
            public function setString($stringVal){
                $this->_theString = $stringVal;
            }
            public function getString(){
                return $this->_theString;
            }
            
            /**
             * Este método es llamado automaticamente cuando se intenta acceder
             * a un método inexistente o privado
             * @param type $methodName
             * @param type $arguments
             * @return type
             */
            public function __call($methodName, $arguments){
                //Comprobamos  que el método existe en el array
                if(in_array($methodName, CleverString::$__allowedFunctions)){
                    //Añadimos el valor de _theString al principio de la tabla $arguments
                    //aqui $arguments se convierte en tabla
                    array_unshift($arguments, $this->_theString);
                    //Ejemplo de llamada a strpos, este es el único método 
                    //que espera un parametro
                    //strpos($this->_theString, 'e');
                    return call_user_func_array($methodName, $arguments);
                } else{
                    die("<p>Method 'CleverString::$methodName' doesn't exists.</p>");
                }
            }
            
       //clase     
        }
        
        $myString = new CleverString();
        $myString->setString("Hello!");
        echo "<p>The string is: ". $myString->getString(). "</p>";
        echo "<p>The length of the string is: ".$myString->strlen()."</p>";
        echo "<p>The string in uppercase is: ".$myString->strtoupper()."</p>";
        echo "<p>The letter 'e' occurs at position: ".$myString->strpos("e")."</p>";
        $myString->madeUpMethod();
        
        
        
        ?>
    </body>
</html>
