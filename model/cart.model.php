<?php
    require_once 'db/dbhelper.php';

    class Cart extends DBHelper
    {
        private $table = 'cart';
        private $fields = array(
            'user_id',
            'item_id',
            'quantity',
        );

        public function __construct()
        {
            return DBHelper::__construct();
        }

        public function addCart($data)
        {
            return DBHelper::insertRecord($data, $this->fields, $this->table);
        }

        public function getAllCart()
        {
            return DBHelper::getAllRecord($this->table);
        }

        public function getCartByUser($ref_id)
        {
            return DBHelper::getRecordById($this->table, 'user_id', $ref_id);
        }

        public function getCartByItem($ref_id)
        {
            return DBHelper::getRecordById($this->table, 'item_id', $ref_id);
        }

        public function getCartById($ref_id)
        {
            return DBHelper::getRecordById($this->table, 'cart_id', $ref_id);
        }

        public function deleteCart($ref_id)
        {
            return DBHelper::deleteRecord($this->table, 'cart_id', $ref_id);
        }

        public function deleteAllCart($ref_id)
        {
            return DBHelper::deleteRecord($this->table, 'user_id', $ref_id);
        }

        public function updateCart($data, $ref_id)
        {
            return DBHelper::updateRecord($this->table, $this->fields, $data, 'item_id', $ref_id);
        }

        public function getCartByItemId($ref_id)
        {
            return DBHelper::getRecord($this->table, 'user_id', $ref_id);
        }

        public function getTotal($ref_id)
        {
            return DBHelper::getTotalPrice($this->table, 'user_id', $ref_id);
        }

        public function getTotalByItem($ref_id)
        {
            return DBHelper::getTotalPriceByItem($this->table, 'user_id', $ref_id);
        }
    }
