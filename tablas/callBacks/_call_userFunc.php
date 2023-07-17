<?php
namespace Foobar;

$saludo = function($nombre)
{
    printf("Hola %s\r\n", $nombre);
    echo '<br>';
};

$saludo('Carlos'); // Devuelve Hola Carlos
call_user_func($saludo, "PHP"); // Devuelve Hola PHP



//Observe que los parámetros para call_user_func() 
//no son pasados por referencia. 

function saludar(&$s){
    
   $s++; 
}
    
    

$s = 0;
call_user_func('saludar',$s);
echo "s vale ".$s.'<br>';
call_user_func_array('saludar', array(&$s));
echo "s vale ".$s.'<br>';

print "<br> ******************************* <br>";
echo 'Acceder a metodos de clase con NAMESPACE'.'<br>';

class Foo{
    
    static public function prueba(){
        print "hola mundo \n";
    }
        
//fin Foo
}

call_user_func(__NAMESPACE__."\Foo::prueba");
call_user_func(array(__NAMESPACE__."Foo","prueba"));

print "<br> ******************************* <br>";

class miClase{
    
     static function saludar(){
        echo 'metodo de clase estatico <br>';
    }
      
//fin miClase    
}

$nombreclase = "miClase";

call_user_func(array($nombreclase,'saludar'));
call_user_func($nombreclase."::saludar");
$miObjeto = new miClase();
call_user_func(array($miObjeto, "saludar"));

print "<br> ******************************* <br>";

echo "funcion lambda <br>";
call_user_func(function($arg){print"[$arg]\n";},'prueba');

print "<br> ******************************* <br>";
echo "llamar a metodos de clase padre";

class A{
    public static function quien(){
        echo "A\n";
    }
}

class B extends A{
    public static function quien(){
        echo "B\n";
    }
}

call_user_func(array("B","parent::quien"));


?>