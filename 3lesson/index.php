<?php 
// Существующие функции
function sum($a = null, $b = 6){
    $c = $b + $a;
    return $c;
}

function my_array_keys($ar){
    $data = [];
    foreach($ar as $key => $name){
       $data[] = $key;
    }
    return $data;
}

// ДОБАВЬТЕ ЭТИ ФУНКЦИИ ДЛЯ РАСШИРЕНИЯ ВОЗМОЖНОСТЕЙ:

// Подсчет элементов массива
function my_count($ar){
    $count = 0;
    foreach($ar as $item){
        $count++;
    }
    return $count;
}

// Получение значений массива
function my_array_values($ar){
    $result = [];
    foreach($ar as $value){
        $result[] = $value;
    }
    return $result;
}

// Проверка существования ключа
function my_array_key_exists($key, $ar){
    foreach($ar as $k => $v){
        if($k == $key){
            return true;
        }
    }
    return false;
}

// Сортировка массива по возрастанию
function my_sort(&$ar){
    $n = my_count($ar);
    for($i = 0; $i < $n - 1; $i++){
        for($j = 0; $j < $n - $i - 1; $j++){
            if($ar[$j] > $ar[$j + 1]){
                $temp = $ar[$j];
                $ar[$j] = $ar[$j + 1];
                $ar[$j + 1] = $temp;
            }
        }
    }
    return true;
}

// Переворот массива
function my_array_reverse($ar){
    $result = [];
    for($i = my_count($ar) - 1; $i >= 0; $i--){
        $result[] = $ar[$i];
    }
    return $result;
}

// Поиск значения в массиве
function my_in_array($needle, $haystack){
    foreach($haystack as $value){
        if($value == $needle){
            return true;
        }
    }
    return false;
}

// Объединение массива в строку
function my_implode($glue, $pieces){
    $result = '';
    $n = my_count($pieces);
    for($i = 0; $i < $n; $i++){
        if($i > 0){
            $result .= $glue;
        }
        $result .= $pieces[$i];
    }
    return $result;
}

// Удаление повторяющихся значений
function my_array_unique($ar){
    $result = [];
    foreach($ar as $value){
        if(!my_in_array($value, $result)){
            $result[] = $value;
        }
    }
    return $result;
}
?>