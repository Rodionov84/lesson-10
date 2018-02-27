<?php
class BaseClassProduct  {
    public $type;
    public $name;
    public $price;
    public $delivery=300;
    public $weight;
    public $discount=10;
    public $discountBool=false;

    public function getDelivery (){
        if ($this->discountBool==true) {
            echo " delivery is $this->delivery";
        } else {
            $this->delivery= $this->delivery-($this->delivery*1/6);
            echo " delivery is $this->delivery";
        }
    }
}

interface getDiscount  {
    public function getDiscount();
}

class Norm extends BaseClassProduct implements getDiscount {

        public function getDiscount() {
            $this->discountBool=true;
            $getDiscount=$this->price-($this->price*$this->discount)/100;
            echo "$this->name price: $getDiscount for kg";
        }
    }

$potato = new Norm();
    $potato->name = 'Potato ';
    $potato->price = '220';
    $potato->weight = '20';

    echo $potato->getDiscount(), $potato->getDelivery() . '<br>';

$strawberry = new Norm();
    $strawberry->name = 'Strawberry ';
    $strawberry->price = '150';
    $strawberry->weight = '2';

    echo $strawberry->getDiscount(), $strawberry->getDelivery() . '<br>';

class ExtraTen extends BaseClassProduct implements getDiscount {

        public function getDiscount() { //скидка только если вес более 10 кг
             if  (($this->weight) > 10) {
                 $this->discountBool=true;
                 $getDiscount=$this->price-($this->price*$this->discount)/100;
                 echo "$this->name price: $getDiscount for kg";
             } else {
                 $getDiscount=$this->price;
                 echo "$this->name price: $getDiscount for kg";
             }
        }
}

$banana = new ExtraTen();
    $banana->name = 'Banana ';
    $banana->price = '100';
    $banana->weight = '5';

    echo $banana->getDiscount(), $banana->getDelivery() . '<br>';

/**
 * Created by PhpStorm.
 * User: wer1
 * Date: 26.02.2018
 * Time: 18:04
 */