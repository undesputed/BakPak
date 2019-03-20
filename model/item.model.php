<?php

    require_once 'db/dbhelper.php';

    class Item extends DBHelper
    {
        private $table = 'item_setup';
        private $fields = array(
            'item_code',
            'supp_id',
            'category_id',
            'sub_category_id',
            'item_image',
            'date_added',
            'discount_price',
            'unit_price',
            'bundled_price',
            'item_name',
            'unit_measure',
            'ROP',
            'item_quantity',
            'item_description',
            'item_brand',
            'item_rating',
            'item_comment',
            'status',
        );

        public function __construct()
        {
            return DBHelper::__construct();
        }

        public function getAllItem()
        {
            return DBHelper::getAllRecord($this->table);
        }

        public function addItem($data)
        {
            return DBHelper::insertRecord($data, $this->fields, $this->table);
        }

        public function deleteItem($ref_id)
        {
            return DBHelper::deleteRecord($this->table, 'item_id', $ref_id);
        }

        public function updateItem($ref_id)
        {
            return DBHelper::updateStatus($this->table, 'item_id', $ref_id);
        }

        public function getItemById($ref_id)
        {
            return DBHelper::getRecordById($this->table, 'item_id', $ref_id);
        }

        public function updateItems($data, $ref_id)
        {
            return DBHelper::updateRecord($this->table, $this->fields, $data, 'item_id', $ref_id);
        }

        public function itemStatusUpdate($data, $ref_id)
        {
            return DBHelper::updateStatusItem($this->table, $data, 'item_id', $ref_id);
        }

        public function updatePrice($data, $ref_id)
        {
            return DBHelper::updatePrices($this->table, $data, 'item_id', $ref_id);
        }

        public function updateQuantity($data, $ref_id)
        {
            return DBHelper::updateQty($this->table, $data, 'item_id', $ref_id);
        }

        public function getNewArrive()
        {
            return DBHelper::getNewArrival($this->table);
        }

        public function getItemByCat($ref_id)
        {
            return DBHelper::getRecord($this->table, 'category_id', $ref_id);
        }

        public function getItemBySubCat($ref_id)
        {
            return DBHelper::getRecord($this->table, 'sub_category_id', $ref_id);
        }
    }
