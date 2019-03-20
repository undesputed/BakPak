<?php
    require_once 'db/dbhelper.php';

    class Delivery extends DBHelper
    {
        private $table = 'delivery';
        private $fields = array(
            'delivery_code',
            'delivery_status',
            'user_id',
            'order_code',
        );

        public function __construct()
        {
            return DBHelper::__construct();
        }

        public function addDelivery($data)
        {
            return DBHelper::insertRecord($data, $this->fields, $this->table);
        }

        public function getNotif()
        {
            return DBHelper::getDeliveryNotif();
        }

        // public function updateNotif($data, $ref_id)
        // {
        //     return DBHelper::updateDeliveryNotif($data, 'delivery_id', $ref_id);
        // }
    }
