<?php 
error_reporting(-1);

function debug($data)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

/*
 * Напишите функцию str_count($str, $substr), которая принимает 2 аргумента: 
 * строку и подстроку. Функция должна возвращать кол-во вхождений подстроки в строку.
 *  Пример: 'hello', 'l' => 2
 * */

function my_strlen($str)
{
    $count = 0;
    while (isset($str[$count])) {
        $count++;
    }
    return $count;
}

function my_substr2($str, $start, $length)
{
    $result = "";
    $str_len = 0;

    while (isset($str[$str_len])) {
        $str_len++;
    }

    if ($length < 0) {
        $length = $str_len - $start + $length;
    }

    for ($i = $start; $i < $start + $length; $i++) {
        if (!isset($str[$i])) break;
        $result .= $str[$i];
    }

    return $result;
}

function my_substr_count($str, $substr)
{
    $count = 0;
    $substr_len = my_strlen($substr);
    
    for ($i = 0; isset($str[$i]); $i++) {
        if (my_substr2($str, $i, $substr_len) === $substr) {
            $count++; 
        }
    }
    return $count;
}

function str_count($str, $substr)
{
    return my_substr_count($str, $substr);
}

// Примеры использования:
echo str_count('hello', 'l'); // 2
echo '<br>';
echo str_count('Sanjar', 'a'); // 2
echo '<br>';
echo str_count('ababab', 'ab'); // 3

/*
 * Напишите функцию no_space(string $str): string, которая принимает 
 * аргументом строку и возвращает строку с удаленными пробелами
 * */

function no_space(string $str): string
{
    return str_replace(' ', '', $str);
}

/*
 * Напишите функцию max_number(int $num): int, которая принимает аргументом число и 
 * возвращает максимальное число из цифр, полученного аргумента. Пример: 123 => 321
 * */

function max_number(int $num): int
{
    $digits = str_split($num);
    rsort($digits);
    return (int)implode('', $digits);
}

?>