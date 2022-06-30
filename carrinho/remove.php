<?php 
  session_start();
  $id=$_GET["id"];
  
  include "./App/entity/cart.php";
  $cart=new Cart();
  $cart->remove($id);
  header("location:view_carrinho.php");
?>