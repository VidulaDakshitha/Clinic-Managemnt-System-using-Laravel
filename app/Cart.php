<?php

namespace App;



class Cart
{
    public $items=null;
    public $totalQty=0;
    public $totalPrice=0;


     public function __construct($oldCart)
    {
        if($oldCart){
            $this->items=$oldCart->items;
            $this->totalQty=$oldCart->totalQty;
            $this->totalPrice=$oldCart->totalPrice;
        }
    }

    public function add($item,$id){

        $storedItem=['qty'=>0,'price'=>$item->selling_price,'item'=>$item];
        if($this->items){
            if(array_key_exists($id,$this->items)){
                $storedItem=$this->items[$id];
            }
        }



        $storedItem['qty']= $storedItem['qty']+1;
        $storedItem['price']=$item->selling_price*$storedItem['qty'];
        $this->items[$id]=$storedItem;
        $this->totalQty++;
        $this->totalPrice+=$item->selling_price;


    }

    public function removeitembyone($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['price']-= $this->items[$id]['item']['selling_price'];
        $this->totalQty--;
        $this->totalPrice-=$this->items[$id]['item']['selling_price'];
    }




}
