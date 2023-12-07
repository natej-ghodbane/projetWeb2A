<?php

class Livreur
{
    private ?int $IdLivreur= null;
    private ?string $nomLivreur = null;
    private ?string $numero_tel = null;
    private ?string $StatutLivreur = null;
    private ?string $idlivraison = null;
  

    public function __construct( $id,$n, $nt, $s,$idl )
    {
        $this->IdLivreur = $id;
        $this->nomLivreur = $n;
        $this->numero_tel= $nt;
        $this->StatutLivreur = $s;
        $this->idlivraison=$idl;
    }


    public function getIdLivreur()
    {
        return $this->IdLivreur;
    }

    public function getIdLivraison()
    {
        return $this->idlivraison;
    }
    
    public function setidluvraison($idlivraison)
    {
        $this->idlivraison= $idlivraison;

        return $this;
    }


      function getNomLivreur()
    {
        return $this->nomLivreur;
    }

    public function getnumerotel()
    {
        return $this->numero_tel;
    }
    public function getStatutLivreur()
    {
        return $this->StatutLivreur;
    }

    public function setID($IdLivreur)
    {
        $this->IdLivreur= $IdLivreur;

        return $this;
    }

    public function setnom($nomLivreur)
    {
        $this->nomLivreur= $nomLivreur;

        return $this;
    }

    public function setnumero($numero_tel)
    {
        $this->$numero_tel= $numero_tel;

        return $this;
    }

    public function setstatut($StatutLivreur)
    {
        $this->StatutLivreur= $StatutLivreur;

        return $this;
    }
}
