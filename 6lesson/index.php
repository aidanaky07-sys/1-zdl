<?php 
function debug($data)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

// ============ ПРИМЕРЫ ИСПОЛЬЗОВАНИЯ ФУНКЦИЙ ============

echo "<h3>1. count() - Подсчет количества элементов</h3>";
$food = array(
    'fruits' => array('orange', 'banana', 'apple'),
    'veggie' => array('carrot', 'collard', 'pea')
);

echo "Обычный подсчет (0 уровень): " . count($food, 0) . "<br>";
echo "Рекурсивный подсчет: " . count($food, COUNT_RECURSIVE) . "<br>";

echo "<h3>2. array_count_values() - Подсчет количества значений</h3>";
$nums = [1, 2, 3, 1, 4, 5, 3, 2, 6, 7, 7, 8, 8, 9, 2, 5];
debug(array_count_values($nums));

echo "<h3>3. array_key_exists() - Проверка существования ключа</h3>";
$searchArray = ['first' => 56, 'second' => 4];
var_dump(array_key_exists('first', $searchArray));
echo "<br>";
var_dump(array_key_exists('third', $searchArray));

echo "<h3>4. in_array() - Проверка существования значения</h3>";
$os = array(10 => "mac", "NT", "Irix", "Linux");
debug($os);

if (in_array("Irix", $os)) {
    echo "Функция нашла значение 'Irix'<br>";
}

if (in_array("mac", $os)) {
    echo "Функция нашла значение 'mac'<br>";
}

echo "<h3>5. array_search() - Поиск значения и возврат ключа</h3>";
$array = array(0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red');

$key = array_search('green', $array);
echo "Ключ для 'green': " . $key . "<br>";

$key = array_search('red', $array);
echo "Первый ключ для 'red': " . $key . "<br>";

echo "<h3>6. array_keys() - Получение всех ключей массива</h3>";
$array = array(0 => 100, "color" => "red");
debug(array_keys($array));

$array = array("blue", "red", "green", "blue", "blue");
debug(array_keys($array, "blue"));

$array = array(
    "color" => array("blue", "red", "green"),
    "size"  => array("small", "medium", "large")
);
debug(array_keys($array));

echo "<h3>7. array_values() - Получение всех значений массива</h3>";
$array = array("color" => "red", "size" => "large", "price" => 100);
debug(array_values($array));

echo "<h3>8. array_unique() - Удаление повторяющихся значений</h3>";
$array = [1, 2, 2, 3, 3, 3, 4, 5, 5];
debug(array_unique($array));

echo "<h3>9. Пример с массивом товаров</h3>";
$goods = [
    [
        'title' => 'Nokia',
        'price' => '100',
        'qty' => '10',
    ],
    [
        'title' => 'Sony',
        'price' => '120',
        'qty' => '7',
    ],
    [
        'title' => 'LG',
        'price' => '105',
        'qty' => '15',
    ],
];

debug($goods);

// Дополнительные примеры:
echo "<h3>10. Дополнительные полезные функции</h3>";

// array_merge - объединение массивов
$arr1 = [1, 2, 3];
$arr2 = [4, 5, 6];
$merged = array_merge($arr1, $arr2);
debug($merged);

// array_sum - сумма элементов
$numbers = [10, 20, 30, 40];
echo "Сумма элементов: " . array_sum($numbers) . "<br>";

// sort - сортировка массива
$unsorted = [5, 2, 8, 1, 9];
sort($unsorted);
debug($unsorted);
?>