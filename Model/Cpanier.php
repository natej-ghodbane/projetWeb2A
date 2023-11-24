<?php
class panierM
{
    private ?int $id ;
    private ?string $user_id;
    private ?int $product_id ;
    private ?int $price;
    private ?int $qty ;

    public function __construct($id = null, $a, $b, $c, $d)
    {
        $this->id = $id;
        $this->user_id = $a;
        $this->product_id = $b;
        $this->price = $c;
        $this->qty = $d;
    }

    public function getId()
    {
        return $this->id;
    }


    public function getidu()
    {
        return $this->user_id;
    }


    public function setidu($id)
    {
        $this->user_id= $id;

        return $this;
    }
    public function getpi()
    {
        return $this->product_id;
    }
    public function setpi($pi)
    {
        $this->product_id= $pi;

        return $this;
    }
    public function getprice()
    {
        return $this->price;
    }
    public function setprice($prix)
    {
        $this->price= $prix;

        return $this;
    }
    public function getqty()
    {
        return $this->qty;
    }
    public function setqty($q)
    {
        $this->qty= $q;

        return $this;
    }
}