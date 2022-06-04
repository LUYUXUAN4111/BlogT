<?php
    namespace App\Functions;

    use App\Models\User;

    class UserC{
        private $name;

        public function __construct()
        {
            $this->name = 'test';
        }

        public function getName(){
            return $this->name;
        }
    }