<?php

class Cart {
    public $db = null;

    public function __construct(DBController $db)
    {
        if(!isset($db->conn)) return null;
        $this->db = $db;
    }

    public function insertInfoCart($params = null, $table = 'cart') {
        if($this->db->conn != null) {
            if($params != null) {
                $columns = implode(',', array_keys(($params)));
                $values = implode(',', array_values(($params)));

                $query = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);
                
                $result = $this->db->conn->query($query);
                return $result;
            }
        }
    }

    public function addToCart($user_id, $item_id) {
        if(isset($user_id) && isset($item_id)){
            $params = array (
                'user_id' => $user_id,
                'item_id' => $item_id
            );
            $result = $this->insertInfoCart($params);
            if($result) {
                header("Location:".$_SERVER['PHP_SELF'].'?item_id='.$item_id);
            }
        }
    }

    public function getSubTotal($arr) {
        if(isset($arr)){
            $subTotal = 0;
            foreach ($arr as $item){
                $subTotal += floatval($item[0]);
            }
            return sprintf('%.2f' , $subTotal);
        }
    }

    public function deleteCart($item_id = null, $table = 'cart') {
        if($item_id != null) {
            $result = $this->db->conn->query("DELETE FROM {$table} WHERE item_id={$item_id}");
            if($result) {
                header("Location:". $_SERVER["PHP_SELF"]);
            }
            return $result;
        }
    }

    public function getCartId($cartArray = null, $key = 'item_id') {
        if($cartArray != null) {
            $cart_id = array_map(function($value) use ($key){
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }

    public function saveForLater($item_id = null, $saveTable = 'wishlist', $fromTable = 'cart') {
        if($item_id != null) {
            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id={$item_id};";
            $query .= "DELETE FROM {$fromTable} WHERE item_id={$item_id};";
            echo $query;

            $result = $this->db->conn->multi_query($query);
            if($result) {
                header("Location:".$_SERVER['PHP_SELF']);
            }
            return $result;
        }

    }
}