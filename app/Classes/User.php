<?php
    namespace App\Classes;

    class User{
        private $id;
        private $name;
        private $email;
        private $icon;
        private $info;
        public function __construct($id,$name,$email,$icon,$info)
        {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->icon = $icon;
            $this->info = $info;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }
        public function getName(){
            return $this->name;
        }

        /**
         * @param string $name
         */
        public function setName($name)
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email)
        {
            $this->email = $email;
        }

        /**
         * @return mixed
         */
        public function getIcon()
        {
            return $this->icon;
        }

        /**
         * @param mixed $icon
         */
        public function setIcon($icon)
        {
            $this->icon = $icon;
        }

        /**
         * @return mixed
         */
        public function getInfo()
        {
            return $this->info;
        }

        /**
         * @param mixed $info
         */
        public function setInfo($info)
        {
            $this->info = $info;
        }
    }
