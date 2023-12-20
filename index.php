<?php

require_once "config/config.php";
require_once "components/Autoloader.php";
require_once "components/AjaxHandler.php";

$autoloader = new Autoloader();

$autoloader::autoloadClasses();

$dbPDO = new DB("{$config['sqlServer']}:host={$config['host']};dbname={$config['dbName']}", $config['user'], $config['password']);

if (isset($_GET['ajax'])) {
    $ajaxHandler = new AjaxHandler();

    $ajaxHandler->handleAjaxGetProducts($_GET['categoryId'], $_GET['sort']);
    exit();
}

$siteController = new SiteController();

$siteController->run();

