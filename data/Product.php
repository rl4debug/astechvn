<?php
/**
 * Created by PhpStorm.
 * User: loser
 * Date: 19-Apr-17
 * Time: 11:55 AM
 */

define('ROOT_PATH', dirname(__DIR__) . '/');
include_once(ROOT_PATH.'./config.php');

class Product{
    public $ID;
    public $name;
    public $price;
    public $description;
    public $content;
    public $category_id;
    public $status;

    function set_id($id){
    }

    static function get_product($id){
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = 'select * from as_product where ID =' . (string)$id;
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            $product = new Product();
            $row = $result->fetch_assoc();

            $product->ID = $row['ID'];
            $product->name = $row['name'];
            $product->description = $row['description'];
            $product->content = $row['content'];
            $product->category_id = $row['category_id'];
            $product->price = $row['price'];
            $product->status = $row['status'];

            $mysqli->close();
            return $product;
        }

        $mysqli->close();
        return null;
    }

    public function render_product_info(){
        echo '<p> id=' . (string) $this->ID . '</p>';
        echo '<p> name=' . $this->name . '</p>';
        echo '<p> description=' . $this->description . '</p>';
    }
}

?>