<?php

    require_once 'db/dbhelper.php';

    class Sales extends DBHelper
    {
        private $table = 'sales';
        private $fields = array(
            'order_code',
            'item_id',
            'total_sales',
            'quantity',
        );

        public function __construct()
        {
            return DBHelper::__construct();
        }

        public function addSales($data)
        {
            return DBHelper::insertRecord($data, $this->fields, $this->table);
        }
    }
