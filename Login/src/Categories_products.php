<?php

    namespace App;

    class Categories_products {

        private $idCategories;
        private $idProduct;

        public function __construct() {
            // utilizar quando é necessário executar antes
            // de qualquer outra coisa.
        }

        public function getIdCategories() {
            return $this->idCategories;
        }

        public function setIdCategories($idCategories) {
            $this->idCategories = $idCategories;
        }

        public function getIdProduct() {
            return $this->idProduct;
        }

        public function setIdProduct($idProduct) {
            $this->idProduct = $idProduct;
        }

    }

?>