<?php

// Отримуємо категорії із бази даних
$db = new PDO("mysql:host=localhost;dbname=task2", "root", "");

$categories = $db->query("SELECT * FROM categories", PDO::FETCH_ASSOC);
$categories = $categories->fetchAll();

// Сортуємо масив в порядку зростання по parent_id
uasort($categories, function ($a, $b) {
    return $a['parent_id'] <=> $b['parent_id'];
});

$result = createTree($categories);

// Створюємо дерево вкладень
function createTree($arr) {
    $parents_arr = array();
    foreach($arr as $key => $item) {
        $parents_arr[$item['parent_id']][$item['categories_id']] = $item['categories_id'];
    }
    $treeElem = $parents_arr[0];

    generateElemTree($treeElem, $parents_arr);

    return $treeElem;
}

// Формуємо вложеність масивів
function generateElemTree(&$treeElem, $parents_arr) {
    foreach($treeElem as $key => $item) {

        if (!is_array($item)) {
            $treeElem[$key] = $item;
        }
        if (array_key_exists($key, $parents_arr)) {
            $treeElem[$key] = $parents_arr[$key];
            generateElemTree($treeElem[$key], $parents_arr);
        }
    }
}

// Виводимо результуючий масив
echo "<pre>";
print_r($result);
echo "</pre";