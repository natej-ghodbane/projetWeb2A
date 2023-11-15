<?php
class reclamation
{
    private  $nom;
    private  $prenom;
    private  $ville;
    private  $sujet;

    public function __construct( $n, $p, $v, $s)
    {
        $this->nom = $n;
        $this->prenom = $p;
        $this->ville = $v;
        $this->sujet = $s;
    }

   
   
    public function getnom()
    {
        return $this->nom;
    }

    
    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

   
    public function getprenom()
    {
        return $this->prenom;
    }

  
    public function setprenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

   
    public function getville()
    {
        return $this->ville;
    }

    
    public function setville($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    
    public function getsujet()
    {
        return $this->sujet;
    }

   

    public function setsujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }
}
