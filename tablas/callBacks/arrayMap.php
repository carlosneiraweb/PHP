<?php

echo"Array_Map devuelve un array después de pasar el array al callback"."<br/>";

function cube($n){
    return($n*$n*$n);
}
$a = array(1,2,3,4,5);
$b = array_map("cube",$a);
print_r($b);

echo "<br>********************<br>";
echo 'Ponemos a minusculas los elementos de un array <br>';
function lowercase($element)
{
    return strtolower($element);
}

    $array = ['Apple', 'BANANA', 'Mango', 'orange', 'GRAPES'];
    $results = array_map('lowercase', $array);
    print_r($results);
    
echo "<br>********************<br>";
echo 'Usando función lambda<br>';

$func = function($valor){
    return $valor * 2;
};

print_r(array_map($func, range(1,5)));

echo "<br>********************<br>";
echo 'Usando más arrays<br>';

function mostrar_en_español($n,$m){
    return("El número $n se llama $m en español");
}

function correspondencia_en_español($n,$m){
    //print_r("$n => $m");
    return(array($n => $m));
}
echo "Si los arrays no tienen la misma longitud se rellena con valor null <br>";
$a1 = array(1,2,3,4);
$b1 = array("uno","dos","tres","cuatro","cinco");

$c1 = array_map("mostrar_en_español",$a1,$b1);
print_r($c1);
echo "<br>";
echo "<br>";
$d1 = array_map("correspondencia_en_español",$a1,$b1);
print_r($d1);
echo "<br>";
echo "Pero deja intactas las arrays originales <br>";
print_r($a1);

echo "<br>********************<br>";
echo 'Crear un array nuevo pasando un null al callback<br>';

$a2 = array(1,2,3,4,5);
$b2 = array("one","two","three","four","five");
$c2 = array("uno","dos","tres","cuatro","cinco");

$d2 = array_map(null,$a2,$b2,$c2);
var_dump($d2);

echo "<br>********************<br>";
echo 'Indices devueltos por array_map <br>';
echo"<br>";
echo "El array devuelto conservará las claves del argumento array si y solo si ".
        " se pasa exactamente un array. "."<br>";
echo "Si se pasa más de un array, el array devuelto tendrá claves secuenciales de tipo integer.  ";

$arr = array("stringlekey" => "value");
$arr2 = array("mmmm"=>"qqqqqqqqqqq");

function cb1($a3){
    return $a3;
}

function cb2($a,$b){
    return array($a,$b);
}
echo '<br>';
echo '<br>';
var_dump(array_map("cb1",$arr));
echo '<br>';
echo '<br>';
var_dump(array_map("cb2",$arr,$arr2));
echo '<br>';
echo '<br>';
var_dump(array_map(null,$arr));
echo '<br>';
echo '<br>';
var_dump(array_map(null,$arr,$arr));
echo '<br>';
echo '<br>';


echo "<br>********************<br>";
echo "Unir varios arrays en uno bidimensional"."<br/>";

$a = array(1,2,3,4);
$b = array("one","two","three");
$c = array("uno","dos","tres","cuatro","cinco");

$d = array_map(null,$a,$b,$c);

print_r($d);



echo "<br>********************<br>";
echo "Unir arrays bidimensionales <br>";

$cola = array(array(
    1,
    2
),array(
    3,
    4
));

$cola2 = array(
    
    $cola,
    
    array(
    "carlos",
    "david"
    
),array(
    "pedro",
    "jose"
));
//var_dump($cola);
echo '<br>';




echo "<br>********************<br>";
echo "Crear multiples instancias de un objeto <br>";

class Employee

{

    public $name;
    public $employee;

    public function __construct($name, $employee)
    {

        $this->name = $name;
        $this->employee = $employee;

    }

}

function createEmployeeObject($name, $email)
{

    return new Employee($name, $email);
}

$employeeNames = ['john', 'mark', 'lisa'];
$employeeEmails = ['john@example.com', 'mark@example.com', 'lisa@example.com'];

$results = array_map('createEmployeeObject', $employeeNames, $employeeEmails);

print_r($results);
