<?php
class Client
{
    private ?int $id = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?int $Motdepasse = null;
    private ?string $Adresse = null;
    private ?string $Email = null;
    private ?DateTimstring $Occupation = null;

    public function __construct($id = null, $n, $p, $m,$e,$a, $o)
    {
        $this->id = $id;
        $this->nom = $n;
        $this->prenom = $p;
        $this->Motdepasse = $m;
        $this->Email = $e;
        $this->Adresse = $a;
        $this->Occupation = $o;
      
    }

    /**
     * Get the value of idClient
     */
    public function getIdClient()
    {
        return $this->id;
    }

    /**
     * Get the value of lastName
     */
    public function getLastName()
    {
        return $this->nom;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setLastName($nom)
    {
        $this->lastName = $nom;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getFirstName()
    {
        return $this->prenom;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setFirstName($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

     /**
     * Get the value of password
     */
    public function getMotdepasse()
    {
        return $this->Motdepasse;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setMotdepasse($Motdepasse)
    {
        $this->Motdepasse = $Motdepasse;

        return $this;
    }


 /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;

        return $this;
    }


    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->Adresse;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setAddress($Adresse)
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    /**
     * Get the value of Occupation
     */
    public function getDob()
    {
        return $this->Occupation;
    }

    /**
     * Set the value of Occupation
     *
     * @return  self
     */
    public function setDob($Occupation)
    {
        $this->Occupation = $Occupation;

        return $this;
    }
}
