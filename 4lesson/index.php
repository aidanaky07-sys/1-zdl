```php
<?php 
header('Content-Type: text/html; charset=utf-8');

/*
http://php.net/manual/ru/ref.strings.php
http://php.net/manual/ru/ref.mbstring.php

array explode ( string $delimiter , string $string [, int $limit ] )
string implode ( string $glue , array $pieces ) || join()
string trim ( string $str [, string $character_mask = " \t\n\r\0\x0B" ] )
string rtrim ( string $str [, string $character_mask ] )
string ltrim ( string $str [, string $character_mask ] )
string md5 ( string $str [, bool $raw_output = false ] )
string sha1 ( string $str [, bool $raw_output = false ] )
string nl2br ( string $string [, bool $is_xhtml = true ] )

mixed str_replace ( mixed $search , mixed $replace , mixed $subject [, int &$count ] )
mixed str_ireplace ( mixed $search , mixed $replace , mixed $subject [, int &$count ] )
string strip_tags ( string $str [, string $allowable_tags ] )
int strlen ( string $string )

mixed mb_strlen ( string $str [, string $encoding = mb_internal_encoding() ] )
int mb_strpos ( string $haystack , string $needle [, int $offset = 0 [, string $encoding = mb_internal_encoding() ]] )
string mb_strtolower ( string $str [, string $encoding = mb_internal_encoding() ] )
string mb_strtoupper ( string $str [, string $encoding = mb_internal_encoding() ] )
string mb_substr ( string $str , int $start [, int $length = NULL [, string $encoding = mb_internal_encoding() ]] )
string htmlspecialchars ( string $string [, int $flags = ENT_COMPAT | ENT_HTML401 [, string $encoding = ini_get("default_charset") [, bool $double_encode = true ]]] )
string htmlspecialchars_decode ( string $string [, int $flags = ENT_COMPAT | ENT_HTML401 ] )
string htmlentities ( string $string [, int $flags = ENT_COMPAT | ENT_HTML401 [, string $encoding = ini_get("default_charset") [, bool $double_encode = true ]]] )
*/

$str = 'Иванов Иван Иванович';
$data = explode(' ', $str);
print_r($data);

echo '<br><br>';

$data = ['Иванов', 'Иван', 'Иванович'];
$str = implode(' ', $data);
echo $str;

echo '<br><br>';

$str = "\t<p>Hello</p>\n";
$str .= "\n<p>world!</p>\t";
echo trim($str, "\t");

echo '<br><br>';

$str = "<p>Hello</p>";
$str .= "<p>World!</p>";
echo $str;

echo '<br><br>';

$text   = "\t\tThese are a few words :) ...  ";
$binary = "\x09Example string\x0A";
$hello  = "Hello World";
$trimmed = ltrim($text);
echo $trimmed;

echo '<br><br>';

$pass = 'password123';
echo $pass . '<br>';
echo md5($pass) . '<br>';
echo sha1($pass) . '<br>';

echo '<br><hr><br>';

// ДОБАВЛЕННЫЕ ФУНКЦИИ:

// 1. Функция для безопасного вывода данных (экранирование HTML)
function safeOutput($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

// 2. Функция для обрезки текста до нужной длины
function cutText($text, $length = 100, $suffix = '...') {
    $text = strip_tags($text);
    if (mb_strlen($text) > $length) {
        $text = mb_substr($text, 0, $length) . $suffix;
    }
    return $text;
}

// 3. Функция для форматирования ФИО
function formatFio($fullName) {
    $parts = explode(' ', trim($fullName));
    if (count($parts) >= 3) {
        $lastName = $parts[0];
        $firstName = mb_substr($parts[1], 0, 1) . '.';
        $patronymic = mb_substr($parts[2], 0, 1) . '.';
        return "$lastName $firstName $patronymic";
    }
    return $fullName;
}

// 4. Функция для проверки длины строки
function checkStringLength($string, $min, $max) {
    $length = mb_strlen($string);
    return $length >= $min && $length <= $max;
}

// 5. Функция для преобразования первой буквы в заглавную
function mb_ucfirst($string, $encoding = 'UTF-8') {
    $firstChar = mb_substr($string, 0, 1, $encoding);
    $rest = mb_substr($string, 1, null, $encoding);
    return mb_strtoupper($firstChar, $encoding) . mb_strtolower($rest, $encoding);
}

// 6. Функция для очистки строки
function cleanString($string, $removeTags = true, $trim = true, $stripSlashes = true) {
    if ($removeTags) {
        $string = strip_tags($string);
    }
    if ($stripSlashes) {
        $string = stripslashes($string);
    }
    if ($trim) {
        $string = trim($string);
    }
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

// ПРИМЕРЫ ИСПОЛЬЗОВАНИЯ ДОБАВЛЕННЫХ ФУНКЦИЙ:

echo "<h3>Примеры работы добавленных функций:</h3>";

// Пример safeOutput
$userInput = '<script>alert("xss")</script>';
echo "safeOutput: " . safeOutput($userInput) . "<br>";

// Пример cutText
$longText = "Очень длинный текст, который нужно обрезать до определенной длины для вывода на странице";
echo "cutText: " . cutText($longText, 30) . "<br>";

// Пример formatFio
$fio = "Иванов Иван Иванович";
echo "formatFio: " . formatFio($fio) . "<br>";

// Пример checkStringLength
$password = "password123";
echo "checkStringLength: " . (checkStringLength($password, 6, 20) ? "Пароль валидный" : "Пароль невалидный") . "<br>";

// Пример mb_ucfirst
$text = "привет мир";
echo "mb_ucfirst: " . mb_ucfirst($text) . "<br>";

// Пример cleanString
$dirtyString = "  <b>Hello</b> 'world'!  ";
echo "cleanString: " . cleanString($dirtyString) . "<br>";

?>
```