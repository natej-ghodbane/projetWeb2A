<?php 
    class Produit{
        private ?int $id;
        private string $nom;
        private string $description;
        private string $categorie;
        private float $prix;
        private int $stock;
        private string $fournisseur;
        private DateTime $date_ajout;
        private $image;

        public function __construct (?int $id = NULL, string $nom, string $description, string $categorie, float $prix, int $stock, string $fournisseur, DateTime $date_ajout, $image){
            $this->id = $id;
            $this->nom = $nom;
            $this->description = $description;
            $this->categorie = $categorie;
            $this->prix = $prix;
            $this->stock = $stock;
            $this->fournisseur = $fournisseur;
            $this->date_ajout = $date_ajout;
            $this->image = $image;
        }

        public function getId(){
            return $this->id;
        } 
        public function setId(int $id){
            $this->id = $id;
        }
        public function getNom(){
            return $this->nom;
        } 
        public function setNom(string $nom){
            $this->nom = $nom;
        }
        public function getDescription(){
            return $this->description;
        } 
        public function setDescription(string $description){
            $this->description = $description;
        }
        public function getCategorie(){
            return $this->categorie;
        } 
        public function setCategorie(string $categorie){
            $this->categorie = $categorie;
        }
        public function getPrix(){
            return $this->prix;
        } 
        public function setPrix(float $prix){
            $this->prix = $prix;
        }
        public function getStock(){
            return $this->stock;
        } 
        public function setStock(int $stock){
            $this->stock = $stock;
        }
        public function getFournisseur(){
            return $this->fournisseur;
        } 
        public function setFournisseur(string $fournisseur){
            $this->fournisseur = $fournisseur;
        }
        public function getDateAjout(){
            return $this->date_ajout;
        } 
        public function setDateAjout(DateTime $date_ajout){
            $this->date_ajout = $date_ajout;
        }
        public function getImage(){
            return $this->image;
        } 
        public function setImage($image){
            $this->image = $image;
        }
    }
?>