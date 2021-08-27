<?php
namespace App;
class Cart{
    public $products = null;
    public $tonggia=0;
    public $tongsl=0;
    public function  __construct($cart){
        if($cart){
            $this->products=$cart->products;
            $this->tonggia=$cart->tonggia;
            $this->tongsl=$cart->tongsl;
        }
    }
   
    public function  AddCart($product,$id) {
        $newProduct =['quantity' => 0,'price'=>$product->price,'productinfo'=>$product];
        if($this->products){
            if(array_key_exists($id,$this->products)){
                $newProduct=$this->products[$id];
            }

        }
        $newProduct['quantity'] ++;
      
        $newProduct['price'] =$newProduct['quantity ']=$product->price;
        $this->products[$id]=$newProduct;
        $this->tonggia +=$product->price;
        $this->tongsl ++;
        
    }
    public function DeleteItemCart($id){
        $this->tongsl -=$this->products[$id]['quantity'];
        $this->tonggia -=$this->products[$id]['price'];
        unset($this->products[$id]);
    }
    public function UpdateCart($id,$quantity){
        $this->tongsl -=$this->products[$id]['quantity'];
        $this->tonggia -=$this->products[$id]['price'];
        $this->products[$id]['quantity'] = $quantity;
        $this->products[$id]['price']=$quantity *$this->products[$id]['productinfo']->price;
        $this->tongsl +=$this->products[$id]['quantity'];
        $this->tonggia +=$this->products[$id]['price'];
    }

}
?>