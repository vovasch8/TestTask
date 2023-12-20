<?php

class AjaxHandler
{
    public function handleAjaxGetProducts($categoryId, $sort) {
        $productModel = new Product();

        $products = $productModel->getProducts($categoryId, $sort);

        echo json_encode($products);
    }
}