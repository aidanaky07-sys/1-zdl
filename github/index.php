<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Functions Demo</title>
</head>
<body>
   <?php
   // однострочный комментарий
		# это также однострочный комментарий
		/* это
		многострочный
		комментарий
		здесь не будут выполняться команды
		echo '<p>Привет мир!</p>'; */
   /*echo "<h1>hello world 1</h1>";
   print "<h1>hello world 2</h1>";*/
/*
   $name = "John";
   $name = "Jane";   
   echo '<h1> Привет,'.$name.'</h1>';*/

 /*  $title = 'hello world!';
$title = 'page title';*/
$fruit = 'apple';
$winnie_pooh = "Hello, I'm Winnie. I have 2 {$fruit}s";
// $winnieThePooh = "Hello, I'm Winnie";

$var = '123';
$Var = '456';

define("PAGE", "new pagebdfbdbcxcvdfbc xcb");
echo PAGE;
echo "<br>";

// define("PAGE", "new page2");

const PAGE2 = 'new const';
echo PAGE2;
echo "<br><hr>";

// ========== ДОБАВЛЕННЫЕ ФУНКЦИИ ==========

// 1. Простая функция без параметров
function showGreeting() {
    echo "<h2>Добро пожаловать на сайт!</h2>";
}

// 2. Функция с параметрами
function greetUser($name, $age = null) {
    if ($age) {
        echo "<p>Привет, $name! Тебе $age лет.</p>";
    } else {
        echo "<p>Привет, $name!</p>";
    }
}

// 3. Функция с возвратом значения
function addNumbers($a, $b) {
    return $a + $b;
}

// 4. Функция для форматирования цены
function formatPrice($price, $currency = '₽') {
    return number_format($price, 2, ',', ' ') . ' ' . $currency;
}

// 5. Функция для проверки четности числа
function isEven($number) {
    return $number % 2 == 0;
}

// 6. Функция с массивом
function getFruits() {
    return ['яблоко', 'банан', 'апельсин', 'виноград'];
}

// 7. Рекурсивная функция (факториал)
function factorial($n) {
    if ($n <= 1) return 1;
    return $n * factorial($n - 1);
}

// 8. Анонимная функция (замыкание)
$multiply = function($x, $y) {
    return $x * $y;
};

// 9. Стрелочная функция (PHP 7.4+)
$square = fn($x) => $x * $x;

// ========== ВЫЗОВ ФУНКЦИЙ ==========

echo "<h3>▶ Вызов функций:</h3>";

// Вызов простой функции
showGreeting();

// Вызов функции с параметрами
greetUser("Алексей");
greetUser("Мария", 25);

// Вызов функции с возвратом значения
$sum = addNumbers(15, 27);
echo "<p>Сумма 15 + 27 = <strong>$sum</strong></p>";

// Форматирование цены
echo "<p>Цена товара: " . formatPrice(1999.99) . "</p>";
echo "<p>Цена в долларах: " . formatPrice(49.95, '$') . "</p>";

// Проверка четности
$num = 42;
echo "<p>Число $num " . (isEven($num) ? "четное" : "нечетное") . "</p>";

// Вывод массива фруктов
$fruits = getFruits();
echo "<p>Фрукты: " . implode(", ", $fruits) . "</p>";

// Вычисление факториала
echo "<p>Факториал 5! = " . factorial(5) . "</p>";

// Вызов анонимной функции
echo "<p>10 × 20 = " . $multiply(10, 20) . "</p>";

// Вызов стрелочной функции
echo "<p>7² = " . $square(7) . "</p>";

// Дополнительный пример: функция с переменным количеством аргументов
function sumAll(...$numbers) {
    return array_sum($numbers);
}
echo "<p>Сумма чисел 1,2,3,4,5 = " . sumAll(1, 2, 3, 4, 5) . "</p>";

// Пример использования глобальной переменной
$globalCounter = 0;
function incrementCounter() {
    global $globalCounter;
    $globalCounter++;
}
incrementCounter();
incrementCounter();
echo "<p>Глобальный счетчик: $globalCounter</p>";

?>   
</body>
</html>