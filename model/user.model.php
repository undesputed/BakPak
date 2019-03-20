<?php

    require_once 'db/dbhelper.php';

    class User extends DBHelper
    {
        private $table = 'user';
        private $fields = array(
            'user_fname',
            'user_lname',
            'user_phone',
            'user_email',
            'user_address',
            'user_address2',
            'user_username',
            'user_password',
        );

        public function __contruct()
        {
            return DBHelper::__contruct();
        }

        public function getAllUser()
        {
            return DBHelper::getAllRecord($this->table);
        }

        public function getUserById($ref_id)
        {
            return DBHelper::getRecordById($this->table, 'user_id', $ref_id);
        }

        public function updateUser($data, $ref_id)
        {
            return DBHelper::updateRecord($this->table, $this->fields, $data, 'user_id', $ref_id);
        }

        public function addUser($data)
        {
            return DBHelper::insertRecord($data, $this->fields, $this->table);
        }
    }
