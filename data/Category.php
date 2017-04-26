<?php
/**
 * Created by PhpStorm.
 * User: loser
 * Date: 19-Apr-17
 * Time: 12:48 PM
 */

include_once(dirname(__DIR__) .'./config.php');

class Category {
    public $ID;
    public $category_name;
    public $order;
    public $parent_id;

    public static function get_categories(){
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = 'select * from as_categories';
        $result = $mysqli->query($sql);
        $categories = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_array()){
                $category = new Category;
                $category->ID = (int)$row['ID'];
                $category->category_name = $row['category_name'];
                $category->order = (int)$row['position'];
                $category->parent_id = (int)$row['parent_id'];
                array_push($categories, $category);
            }
        }

        $mysqli->close();
        return $categories;
    }
}