<?php

class Category
{
    public function getCategories() {
        $db = DB::getConnection();

        $categories = $db->query("SELECT category.`id`, category.`name`, COUNT(product.`id`) as `count_products` FROM category INNER JOIN product ON category.`id` = product.`category_id` GROUP BY category.`id`", PDO::FETCH_ASSOC);
        $categories = $categories->fetchAll();

        return $categories;
    }
}