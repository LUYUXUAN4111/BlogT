<?php
    namespace App\Classes;

    class User{
        private $name;

        public function __construct()
        {
            $this->name = 'test';
        }

        public function getName(){
            return $this->name;
        }
    }