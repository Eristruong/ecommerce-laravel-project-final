<?php

namespace App;

class Cart{
  public $products = null;
  public $totalPrice = 0;
  public $totalQuanty = 0;

  public function __construct($cart)
  {
    if($cart)
    {
      $this->products = $cart->products;
      $this->totalPrice = $cart->totalPrice;
      $this->totalQuanty = $cart->totalQuanty;
    }
  }

  
  public function AddCart($product, $productID)
  {

    $newProduct = ['quanty' => 0, 'price'=>$product->listPrice, 'productInfo' => $product];
    if($this->products){
        if(array_key_exists($productID, $this->products)){
            $newProduct = $this->products[$productID];
        }
    }
    $newProduct['quanty']++;
    $newProduct['price'] = $newProduct['quanty'] * $product->listPrice;
    $this->products[$productID] = $newProduct;
    $this->totalPrice += $product->listPrice;
    $this->totalQuanty++;
  }
  public function DeleteItemCart($productID)
  {
    $this->totalQuanty -= $this->products[$productID]['quanty'];
    $this->totalPrice -= $this->products[$productID]['price'];
    unset($this->products[$productID]);
  }
  public function UpdateItemCart($productID, $quanty)
  {
    $this->totalQuanty -= $this->products[$productID]['quanty'];
    $this->totalPrice -= $this->products[$productID]['price'];
    $this->products[$productID]['quanty'] = $quanty;
    $this->products[$productID]['price'] = $quanty * $this->products[$productID]['productInfo']->listPrice;

    $this->totalQuanty += $this->products[$productID]['quanty'];
    $this->totalPrice += $this->products[$productID]['price'];
  }
}
?>
