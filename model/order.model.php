<?php
    require_once 'db/dbhelper.php';

    class Orders extends DBHelper
    {
        private $table = 'orders';
        private $fields = array(
            'order_code',
            'item_id',
            'user_id',
            'quantity',
            'order_totalPrice',
            'payment_type',
        );

        public function __construct()
        {
            return DBHelper::__construct();
        }

        public function addOrder($data)
        {
            return DBHelper::insertRecord($data, $this->fields, $this->table);
        }

        public function getOrderByCode($ref_id)
        {
            return DBHelper::getRecordById($this->table, 'order_code', $ref_id);
        }

        public function getAllOrders()
        {
            return DBHelper::getAllRecord($this->table);
        }

        public function sumAllOrder($ref_id)
        {
            return DBHelper::getSumOrders($this->table, 'order_code', $ref_id);
        }
    }
