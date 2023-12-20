<?php

// Отримуємо категорії із бази даних
$db = new PDO("mysql:host=localhost;dbname=task2", "root", "");

$categories = $db->query("SELECT * FROM categories", PDO::FETCH_ASSOC);
$categories = $categories->fetchAll();

// Сортуємо масив в порядку зростання по parent_id
uasort($categories, function ($a, $b) {
    return $a['parent_id'] <=> $b['parent_id'];
});

$result = [];

// Задаємо формат відображення як ключ значення з ключем parent_id в масив $result і першим рівнем вложенності
foreach ($categories as $category) {
    $result[$category['parent_id']][$category['categories_id']] = $category['categories_id'];
}
// Видаляємо категорії які входять в масив з ключем 0
unset($result[0]);
// Формуємо вложеність масивів з видаленням значень з попереднього масиву якщо він входить як вложення
foreach ($result as $rk => $rc) {
    foreach ($rc as $key => $rvalue) {
        if (isset($result[$key])) {
            $result[$rk][$key] = $result[$key];
            unset($result[$key]);
        }
    }
}
// Виводимо результуючий масив
echo "<pre>";
print_r($result);
echo "</pre";