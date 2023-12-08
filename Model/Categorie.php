<?php
    class Categorie {
        private string $nom_c;
        private string $description_c;

        public function __construct(string $nom_c, string $description_c) {
            $this->nom_c = $nom_c;
            $this->description_c = $description_c;
        }

        public function getNomC(): string {
            return $this->nom_c;
        }

        public function setNomC(string $nom_c): void {
            $this->nom_c = $nom_c;
        }

        public function getDescriptionC(): string {
            return $this->description_c;
        }

        public function setDescriptionC(string $description_c): void {
            $this->description_c = $description_c;
        }
    }
?>