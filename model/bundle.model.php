<?php
    require_once 'db/dbhelper.php';

    class Bundle extends DBHelper
    {
        private $table = 'bundle';
        private $fields = array(
            'bundle_code',
            'item_id',
            'bundle_name',
            'unit_price',
            'unit_measure',
            'item_description',
            'date_added',
            'quantity',
            'category_id',
            'bundle_image',
        );

        public function __construct()
        {
            return DBHelper::__construct();
        }

        public function getAllBundle()
        {
            return DBHelper::getAllRecord($this->table);
        }
    }
