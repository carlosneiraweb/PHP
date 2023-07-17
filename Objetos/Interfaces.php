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
        
        echo '<h2>Interfaces</h2>';
        echo'<h5>Las interfaces declaran métodos que las clases que las implementan deben implementar.'.
            ' Las clases abstractas tienen una relación padre-hijo, <br>'.
             'mientras las interfaces no.<br>'.
            ' Por lo que una interfaz puede ser implementada por multitud de clases de muchos tipos de objetos.'.
            ' Una clase puede implementar más de una interfaz, pero los métodos deben ser publicos.</h5> ';
        
        interface Sellable{
            public function addStock($numItems);
            public function sellItem();
            public function getStockLevel();        
        }
        
        class Tv implements Sellable{
            private $screenSize;
            private $stockLevel;
            
            function getScreenSize() {
                return $this->screenSize;
            }

            function setScreenSize($screenSize) {
                $this->screenSize = $screenSize;
            }

            public function addStock($numItems) {
              $this->screenSize += $numItems;
            }

            public function getStockLevel() {
                return $this->stockLevel;
            }

            public function sellItem() {
                if($this->stockLevel > 0){
                    $this->stockLevel--;
                    return true;
                } else{
                    return false;
                }
            }
//clase    
        }
        
        class Tennis implements Sellable{
            private $color;
            private $ballsLeft;
            
            function getColor() {
                return $this->color;
            }

            function setColor($color) {
                $this->color = $color;
            }

            public function addStock($numItems) {
                $this->ballsLeft += $numItems;
            }

            public function getStockLevel() {
                return $this->ballsLeft;
            }

            public function sellItem() {
                if($this->ballsLeft > 0){
                    $this->ballsLeft--;
                    return true;
                }else{
                    return false;
                }
            }
       //clase     
        }
        
        class StoreManager{
            private $productList = array();
            //Se utiliza indicación de tipo para asegurar que todos los
            //objetos que se pasan tienen implementada la interfaz Sellable.
            //Se podría poner nombre de clase pero esto limitaría el tipo de objeto.
            
            public function addProduct(Sellable $product){
                $this->productList[] = $product;
            }
            
            public function stockUp(){
                foreach ($this->productList as $product){
                    $product->addStock(100);
                }
            }      
        //class    
        }
        
        $tv = new Tv;
        $tv->setScreenSize(42);
        $ball = new Tennis();
        $ball->setColor("yelow");
        $manager = new StoreManager();
        $manager->addProduct($tv);
        $manager->addProduct($ball);
        $manager->stockUp();
        
        echo'<p>There are '.$tv->getStockLevel()." of ".$tv->getScreenSize();
        echo "-inch televisions and ".$ball->getStockLevel(). " ".
        $ball->getColor();
        echo 'tennis balls in stock.</p>';
        echo"<p>Selling a televisions ...</p>";
        $tv->sellItem();
        echo"<p>Selling two tennis balls...</p>";
        $ball->sellItem();
        $ball->sellItem();
        echo "<p>There are now ".$tv->getStockLevel()." ".$tv->getScreenSize();
        echo "-inch televisions and " .$ball->getStockLevel(). " ".
                $ball->getColor();
        echo"tennis balls in stock.</p>";
        
        ?>
    </body>
</html>
