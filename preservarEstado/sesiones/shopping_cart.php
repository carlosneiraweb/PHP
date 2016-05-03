<?php
    session_start();

    class Product{
        private $productId;
        private $productName;
        private $price;
        
        public function __construct($productId, $productName, $price) {
            $this->productId = $productId;
            $this->productName = $productName;
            $this->price = $price;
        }
        
        function getProductId() {
            return $this->productId;
        }

        function getProductName() {
            return $this->productName;
        }

        function getPrice() {
            return $this->price;
        }
   
   //class     
    }

    
    $products = array(
        1=> new product(1, "superWidget", 19.99),
        2=> new product(2, "megaWidget", 29.99),
        3=> new product(3, 'wonderWidget', 39.99)
        
    );
    
    if(!isset($_SESSION["cart"])){
        $_SESSION["cart"] = array();
    }
    
    if(isset($_GET["action"]) and $_GET["action"] == "addItem"){
        addItem();
    }elseif(isset($_GET["action"]) and $_GET["action"] == "removeItem"){
        removeItem();
    }else{
        displayCart();
    }
    
    
    function addItem(){
        global $products;
        if(isset($_GET["productId"]) and $_GET["productId"] >= 1 and $_GET["product"] <= 3 ){
            $productId = (int) $_GET["productId"];
            if(!isset($_SESSION["cart"][$productId])){
                $_SESSION["cart"][$productId] = $products[$productId];
            }
        }
        
        session_write_close();
        header("Location: shopping_cart.php");
    }

    
    function removeItem(){
        global $products;
        if(isset($_GET["productId"]) and $_GET["productId"] >= 1 and $_GET["productId"] <= 3){
            $productId = (int) $_GET["productId"];
       
            if(isset($_SESSION["cart"][$productId])){
                unset($_SESSION["cart"][$productId]);
            }
        }
        
        session_write_close();
        header("Location: shopping_cart.php");
    }
    
    
    function displayCart(){
        global $products;
    
        
    ?>

<!DOCTYPE html>
<!--
 author Carlos Neira Sanchez
 mail arj.123@hotmail.es
 telefono ""
 nameAndExt shopping_car.php
 fecha 21-abr-2016
-->

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../common.css"/>
        <title></title>
    </head>
    <body>
        <h1>Your shopping cart</h1>
        <dl>
        <?php
         //echo 'datos: '.ini_get("session.save_path").'<br>';
        include_once('../../class.stoper.php');
         $s = new Stoper();
         $s->Start();
         $totalPrice = 0;
         foreach($_SESSION["cart"] as $product){
            
             $totalPrice += $product->getPrice();
         
        
            echo '<dt>'.$product->getProductName().'</dt>';
            echo '<dd>'.number_format($product->getPrice(), 2).'<a href="shopping_cart.php?action=removeItem&productId='.$product->getProductId().'">Remove</a></dd>';
         }
            echo'<dt>Cart Total:</dt>';
            echo'<dd><strong>$'.number_format($totalPrice, 2).'</strong></dd>';
            echo'</dl>';
            
            echo'<h1>Product list</h1>';
            echo'<dl>';
            
            foreach($products as $product){
                echo'<dt>'.$product->getProductName().'</dt>';
                echo'<dd>'.number_format($product->getPrice(), 2).'<a href="shopping_cart.php?action=addItem&amp;productId='.$product->getProductId().'">Add Item</a></dd>';
                echo '</dl>';
            }
            
            
            
            
            
         echo'<br>';
         echo'<br>';
         echo "Total: ".$s->ShowResult();
    }
    
    //eliminamos la sesion, datos de sesion y cookie de sesion+
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time() -3600, "/");
    }
    
    $_SESSION = array();
    session_destroy();
        ?>
    </body>
</html>
