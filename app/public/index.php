<?php


// 1. Манипуляция с $var.

$var = 100;
$var *= 0.5;
$var = sqrt($var);
$var = (int)$var;
var_dump($var);
echo PHP_EOL;

// 2. Вычисление длины вектора по координатам $x, $y, $z

$x = 5;
$y = 7;
$z = 9;

$vector = sqrt($x**2 + $y**2 + $z**2);
echo "Длина вектора". $vector;
echo PHP_EOL;
echo PHP_EOL;

// 3. Проверка на полиндром

$strPoly = "qwertyytrewq";

$isPalindrome = true;
$length = strlen($strPoly);

for ($i = 0; $i < $length / 2; $i++) {
    if ($strPoly[$i] !== $strPoly[$length - $i - 1]) {
        $isPalindrome = false;
        break;
    }
}

if ($isPalindrome) {
    echo "$strPoly - полиндром";
} else {
    echo "$strPoly - не полиндром";
}
echo PHP_EOL;
echo PHP_EOL;

// 4. Таблица умножения
function multiFunc($num) {
    $table = array();
    for ($i = 1; $i <= 10; $i++) {
        $table["$num * $i"] = $num * $i;
    }
    return $table;
}

$table = multiFunc(3);
print_r($table);
echo PHP_EOL;
echo PHP_EOL;

$table = multiFunc(6);
print_r($table);
echo PHP_EOL;
echo PHP_EOL;