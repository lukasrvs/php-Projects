<?php

    namespace App;

    class User {

        private $id;
        private $email;
        private $password;
        private $role_name;

        public function __construct() {
            // utilizar quando é necessário executar antes
            // de qualquer outra coisa.
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getPassword() {
            return $this->password;
        }

        public function setPassword($password) {
            $this->password = hash("sha256", $password);
        }

        public function getRole_name() {
            return $this->role_name;
        }

        public function setRole_name($role_name) {
            $this->role_name = $role_name;
        }

    }

?>