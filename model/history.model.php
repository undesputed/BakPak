<?php
    require_once 'db/dbhelper.php';

    class History extends DBHelper
    {
        private $table = 'history';
        private $fields = array(
            'order_code',
            'delivery_code',
            'user_id',
            'status',
        );

        public function __construct()
        {
            return DBHelper::__construct();
        }

        public function addHistory($data)
        {
            return DBHelper::insertRecord($data, $this->fields, $this->table);
        }

        public function getAllHistory()
        {
            return DBHelper::getAllRecord($this->table);
        }

        public function getHistoryByUser($ref_id)
        {
            return DBHelper::getRecordById($this->table, 'user_id', $ref_id);
        }

        public function deleteHistory($ref_id)
        {
            return DBHelper::deleteRecord($this->table, 'history_id', $ref_id);
        }
    }
