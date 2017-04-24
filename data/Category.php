<?php
/**
 * Created by PhpStorm.
 * User: loser
 * Date: 19-Apr-17
 * Time: 12:48 PM
 */
define('ROOT_PATH', dirname(__DIR__) . '/');
include_once(ROOT_PATH.'./config.php');

class Category {
    public $ID;
    public $name;
    public $order;
    public $parent_id;

    public static function get_categories(){
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $sql = 'select * from as_categories';
            $result = $mysqli->query($sql);
            if ($result->num_rows > 0) {
                $product = new Product();
                $row = $result->fetch_assoc();
                $product->ID = $row['ID'];
                $product->name = $row['name'];
                $product->order = $row['order'];
                $product->parent_id = $row['parent_id'];

                $mysqli->close();
                return $product;
            }

        $mysqli->close();
        return null;
    }
} 