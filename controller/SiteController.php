<?php

class SiteController
{
    public function run() {
        $categoryModel = new Category();
        $productModel = new Product();

        $categories = $categoryModel->getCategories();
        if (isset($_GET) && isset($_GET['idCategory']) && isset($_GET['sort'])) {
            $products = $productModel->getProducts($_GET['idCategory'], $_GET['sort']);
        } else if(isset($_GET) && isset($_GET['sort'])) {
            $products = $productModel->getProducts(0, $_GET['sort']);
        } else if (isset($_GET) && isset($_GET['idCategory'])) {
            $products = $productModel->getProducts($_GET['idCategory']);
        } else {
            $products = $productModel->getProducts();
        }

        require_once "view/site.php";
    }
}