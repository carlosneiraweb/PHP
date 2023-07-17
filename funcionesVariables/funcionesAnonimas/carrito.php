<?php

class Carrito {

    const PRECIO_MANTEQUILLA = 1.00;
    const PRECIO_LECHE = 3.00;
    const PRECIO_HUEVOS = 6.95;

    protected $productos = array();

    public function anadir($producto, $cantidad) {
        $this->productos[$producto] = $cantidad;
        
        
    }

    public function obtenerCantidad($producto) {
        return isset($this->productos[$producto]) ? $this->productos[$producto] : FALSE;
    }

    public function obtenerTotal($impuesto) {

        $total = 0.00;

        $llamadaDeRetorno = function($cantidad, $producto) use ($impuesto, &$total) {
            //echo $cantidad." + ".$producto;
            //echo __CLASS__." ::PRECIO_ ".strtoupper($producto);
            $precioUnidad = constant(__CLASS__ ."::PRECIO_".strtoupper($producto));
           
            $total += ($precioUnidad * $cantidad) * ($impuesto + 1.0);
        };

        array_walk($this->productos, $llamadaDeRetorno);
        return round($total, 2);
    }

    //fin Carrito
}

$mi_carro = new Carrito;
$mi_carro->anadir('mantequilla', 1);
$mi_carro->anadir('leche', 3);
$mi_carro->anadir('huevos', 6);

print $mi_carro->obtenerTotal(0.05) . "\n";



