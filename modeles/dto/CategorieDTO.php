<?php 

class CategorieDTO {
    private int $idCategorie;
    private string $nomCategorie;

    public function getId() {
        return $this->idCategorie;
    }

    public function setId($id) {
        $this->idCategorie = $id;
    }

    public function setNomCat(string $cat) {
        $this->nomCategorie = $cat;
    }

    public function getNomCat() {
        return $this->nomCategorie;
    }
}