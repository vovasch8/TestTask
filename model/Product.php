<?php


class Product
{
    public function getProducts($category = 0, $sort = Sort::CHEAP, $count = 12) {
        $db = DB::getConnection();

        if (isset($_GET)) {
            if (isset($_GET['category'])) $category = $_GET['category'];
            if (isset($_GET['sort'])) $sort = $_GET['sort'];
        }

        $sql = "SELECT * FROM product ";
        if ($category != 0) $sql .= " WHERE category_id = " . $category;
        $sql .= match ($sort) {
            Sort::CHEAP => " ORDER BY price",
            Sort::NEW => " ORDER BY date DESC",
            Sort::ALPHABET => " ORDER BY name"
        };

        $sql .= " LIMIT " . $count;

        $products = $db->query($sql, PDO::FETCH_ASSOC);
        $products = $products->fetchAll();

        return $products;
    }
}