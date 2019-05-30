<?php

    namespace App;

    class Product {

        private $price;
        private $description;
        private $name;
        private $id;

        public function __construct() {
            // utilizar quando é necessário executar antes
            // de qualquer outra coisa.
        }

        public function getPrice(){
            return $this->price;
        }

        public function setPrice($price){
            $this->price = $price;
        }

        public function getDescription(){
            return $this->description;
        }

        public function setDescription($description){
            $this->description = $description;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

    }

?>