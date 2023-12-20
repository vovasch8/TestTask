<?php

class Autoloader
{
    public static function autoloadClasses() {
        spl_autoload_register(function () {
            $rootPath = $_SERVER["DOCUMENT_ROOT"];
            require_once "DB.php";
            $scanned_controllers = array_diff(scandir($rootPath . "/controller"), array('..', '.'));
            $scanned_models = array_diff(scandir($rootPath . "/model"), array('..', '.'));
//            $scanned_enums = array_diff(scandir($rootPath . "/enum"), array('..', '.'));
            foreach ($scanned_controllers as $sc) {
                require_once $rootPath . "/controller/" . $sc;
            }
            foreach ($scanned_models as $sm) {
                require_once $rootPath. "/model/" . $sm;
            }
//            foreach ($scanned_enums as $se) {
//                require_once $rootPath . "/enum/" . $se;
//            }
        });
    }
}