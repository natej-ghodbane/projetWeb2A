<?php

class Livraison
{
    private ?int $IdLivraison= null;
   
    private ?string $AdresseLivraison = null;
    private ?string $StatutLivraison = null;
  

    public function __construct( $id, $a, $s )
    {
        $this->IdLivraison = $id;
    
        $this->AdresseLivraison= $a;
        $this->StatutLivraison = $s;
    }


    public function getIdLivraison()
    {
        return $this->IdLivraison;
    }


   

    public function getAdresseLivraison()
    {
        return $this->AdresseLivraison;
    }
    public function getStatutLivraison()
    {
        return $this->StatutLivraison;
    }

    public function setID($IdLivraison)
    {
        $this->IdLivraison= $IdLivraison;

        return $this;
    }

  
    public function setadresse($AdresseLivraison)
    {
        $this->AdresseLivraison= $AdresseLivraison;

        return $this;
    }

    public function setstatut($StatutLivraison)
    {
        $this->StatutLivraison= $StatutLivraison;

        return $this;
    }
}
