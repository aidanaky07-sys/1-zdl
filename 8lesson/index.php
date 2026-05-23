<?php
// Обработка отправленной формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['ageer'])) {
        echo '<pre>';
        echo "Данные из формы:\n";
        echo "Имя: " . htmlspecialchars($_POST['name']) . "\n";
        echo "Email: " . htmlspecialchars($_POST['email']) . "\n";
        
        if (!empty($_POST['age'])) {
            echo "Выбранные возраста: " . implode(', ', $_POST['age']) . "\n";
        } else {
            echo "Возраст не выбран\n";
        }
        
        echo "Чекбокс отмечен\n";
        echo '</pre>';
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        input, select { margin: 5px; padding: 5px; }
    </style>
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="e-mail">
        <select name="age[]" multiple>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <label>
            <input type="checkbox" name="ageer"> Согласен
        </label>
        <input type="submit" value="Submit">
    </form>
</body>
</html>