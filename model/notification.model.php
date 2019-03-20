<?php
    require_once 'db/dbhelper.php';

    class Notification extends DBHelper
    {
        private $table = 'notification';
        private $fields = array(
            'user_id',
            'name',
            'message',
        );

        public function __construct()
        {
            return DBHelper::__construct();
        }

        public function addNotification($data)
        {
            return DBHelper::insertRecord($data, $this->fields, $this->table);
        }
    }
