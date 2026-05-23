<?php
error_reporting(-1);

/*
Арифметически операторы
"+" сложение $a + $b
"-" вычитание $a - $b
"*" умножение $a * $b
"/" деление $a / $b
"-$a" отрицание (смена знака $a)
"$a % $b" деление по модулю (остаток от деления)
"$a ** $b" возведение в степень
"=" присваивание (установка значения)
"&" присваивание по ссылке
============================
"++$a" префиксный инкремент
"$a++" постфиксный инкремент
"--$a" префиксный декремент
"$a++" постфиксный декремент
"." конкатенация (склеивание строк)
комбинированные операторы
*/

$arr2 = [
	1,
	2,
	[
		'banana',
		'orange',
		'apple'
	],
	4,
	'cat',
	6,
	7,
	8,
	9,
	10,
];

echo "<pre>";
print_r($arr2);
echo "</pre>";

echo $arr2[2][0] . "<br><br>";

// ========== ДОБАВЛЕННАЯ ФУНКЦИЯ ==========

/**
 * Функция для поиска элемента в многомерном массиве
 * @param array $array Массив для поиска
 * @param mixed $search Искомое значение
 * @return string Результат поиска
 */
function search_in_array($array, $search) {
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            // Рекурсивно ищем во вложенном массиве
            $result = search_in_array($value, $search);
            if ($result !== false) {
                return "Найдено '$search' в подмассиве";
            }
        } elseif ($value == $search) {
            return "Найдено '$search' на позиции $key";
        }
    }
    return "Элемент '$search' не найден";
}

// Вызов функции
echo "<h3>Результат поиска:</h3>";
echo search_in_array($arr2, 'orange') . "<br>";
echo search_in_array($arr2, 'cat') . "<br>";
echo search_in_array($arr2, 'dog') . "<br>";

?>