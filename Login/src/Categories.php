<?php

    namespace App;

    class Categories {

        private $name;
        private $id;

        public function __construct() {
            // utilizar quando é necessário executar antes
            // de qualquer outra coisa.
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

    }

?>