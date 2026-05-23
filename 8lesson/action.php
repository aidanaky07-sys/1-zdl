<?php
// Функция для безопасного получения данных
function getPostValue($key, $default = '') {
    return isset($_POST[$key]) ? htmlspecialchars(trim($_POST[$key])) : $default;
}

function getPostArray($key) {
    return isset($_POST[$key]) && is_array($_POST[$key]) ? $_POST[$key] : [];
}

// Обработка данных
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = getPostValue('name');
    $email = getPostValue('email');
    $ages = getPostArray('age');
    $agreed = isset($_POST['ageer']);
    
    echo "<h3>Результаты:</h3>";
    echo "Имя: " . ($name ?: "не указано") . "<br>";
    echo "Email: " . ($email ?: "не указано") . "<br>";
    echo "Возраста: " . (!empty($ages) ? implode(', ', $ages) : "не выбраны") . "<br>";
    echo "Согласие: " . ($agreed ? "Да" : "Нет") . "<br>";
    
    // var_dump для отладки
    echo "<hr><pre>";
    var_dump($_POST);
    echo "</pre>";
} else {
    echo "Форма не отправлена";
}
?>