<?php
class commandeM
{
    private ?int $id ;
    private ?string $user_id ;
    private ?string $name ;
    private ?int $number ;
    private ?string $email ;
    private ?string $adresse ;
    private ?string $adresse_type ;
    private ?string $method ;
    private ?int $product_id ;
    private ?int $price ;
    private ?int $qty ;
    private ?DateTime $date ;
    private ?string $status;
    private ?int $idpan;
    


    public function __construct($id = null, $a, $b, $c, $d,$e, $f, $g, $k,$l,$m,$n,$o,$p)
    {
        $this->id = $id;
        $this->user_id = $a;
        $this->name = $b;
        $this->number = $c;
        $this->email = $d;
        $this->adresse = $e;
        $this->adresse_type = $f;
        $this->method = $g;
        $this->product_id = $k;
        $this->price = $l;
        $this->qty = $m;
        $this->date = $n;
        $this->status = $o;
        $this->idpan = $p;
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
    public function getnom()
    {
        return $this->name;
    }
    public function setNom($name)
    {
        $this->name= $name;

        return $this;
    }
    public function getnumber()
    {
        return $this->number;
    }
    public function setNumber($name)
    {
        $this->number= $number;

        return $this;
    }
    public function getemail()
    {
        return $this->email;
    }
    public function setemail($name)
    {
        $this->email= $email;

        return $this;
    }
    public function getadresse()
    {
        return $this->adresse;
    }
    public function setadresse($adresse)
    {
        $this->adresse= $adresse;

        return $this;
    }
    public function getadresset()
    {
        return $this->adresse_type;
    }
    public function setadresset($adresset)
    {
        $this->adresse_type= $adresset;

        return $this;
    }
    public function getmethod()
    {
        return $this->method;
    }
    public function setmethod($methode)
    {
        $this->method= $methode;

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
    public function setprice($price)
    {
        $this->price= $price;

        return $this;
    }
    public function getqty()
    {
        return $this->qty;
    }
    public function setqty($qty)
    {
        $this->qty= $qty;

        return $this;
    }
    public function getdate()
    {
        return $this->date;
    }
    public function setdate($date)
    {
        $this->date= $date;

        return $this;
    }
    public function getstatus()
    {
        return $this->status;
    }
    public function setstatus($status)
    {
        $this->status= $status;

        return $this;
    }
    public function getidp()
    {
        return $this->idpan;
    }
    public function setidp($idp)
    {
        $this->idpan= $idp;

        return $this;
    }

}
