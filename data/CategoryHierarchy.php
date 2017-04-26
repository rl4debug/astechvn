<?php

/**
 * Created by PhpStorm.
 * User: loser
 * Date: 26-Apr-17
 * Time: 5:29 PM
 */
include_once('data/Product.php');

class CategoryHierarchy
{
    public $category;
    public $category_hierarchies = array();

    public static function get_category_hierarchies(){
        $categories = Category::get_categories();
        $hierarchies = self::get_category_hierarchies_from_categories($categories, 0);
        return $hierarchies;
    }

    private static function get_category_hierarchies_from_categories($categories, $parent_id){
        if($categories == null)
            return array();
        $hierarchies = array();
        $temp = self::get_sub_categories($categories, $parent_id);
        $categories = self::reduce_parent_categories($categories, $parent_id);
        if($temp){
            foreach ($temp as $category){
                $hierarchy = new CategoryHierarchy();
                $hierarchy->category = $category;
                $hierarchy->category_hierarchies = self::get_category_hierarchies_from_categories($categories, $category->ID);
                array_push($hierarchies, $hierarchy);
            }
        }
        return $hierarchies;
    }

    private static function get_sub_categories($categories, $parent_id){
        return array_filter($categories, function($cat) use ($parent_id) {
            return $cat->parent_id == $parent_id;
        });
    }

    private static function reduce_parent_categories($categories, $parent_id){
    return array_filter($categories, function($cat) use ($parent_id){
        return $cat->parent_id != $parent_id;
    });
}
}