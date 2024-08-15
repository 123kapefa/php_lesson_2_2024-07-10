<?php

//$variable = 1;
//var_dump($variable);
//
//$string = "Hello";
//var_dump($string);
//
//$boolean = true;
//var_dump($boolean);
//
//$float = 1.7;
//var_dump($float);
//
//$null = null;
//var_dump($null);

// task1
//
//$num1 = 10;
//$num2 = 20;
//
//echo "first number = ", $num1;
//echo PHP_EOL;
//echo "second number = ", $num2;
//echo PHP_EOL;
//
//$ptrNum = $num1;
//$num1 = $num2;
//$num2 = $ptrNum;
//
//echo PHP_EOL;
//echo PHP_EOL;
//echo "first number = ", $num1;
//echo PHP_EOL;
//echo "second number = ", $num2;
//
//// task2
//
//$num1 = $num1 + $num2;
//$num2 = $num1 - $num2;
//$num1 = $num1 - $num2;
//
//echo PHP_EOL;
//echo PHP_EOL;
//echo "first number = ", $num1;
//echo PHP_EOL;
//echo "second number = ", $num2;


// --------------- Листы --------------
//$array = [
//    'Russia' => ['Capital' => 'Moscow', 'Citizen' => 14000000],
//    'China' => ['Capital' => 'Beigin', 'Citizen' => 2000000000],
//    'Belorussian' => ['Capital' => 'Minsk', 'Citizen' => 10000000],
//];
//
//foreach ($array as $key => list('Capital' => $capital, 'Citizen' => $city)) {
//    var_dump($key);
//    var_dump($capital);
//    var_dump($city);
//}

//$micro = microtime(true);
//echo $micro;
//
//for($i = 0; $i < 1000; $i++) {
//    $var = '20';
//    $return = '';
//    switch ($var) {
//        case 'var1':
//        {
//            $return = 'return_var1';
//            break;
//        }
//        case 'var2':
//        {
//            $return = 'return_var1';
//            break;
//        }
//        case 'var3':
//        {
//            $return = 'return_var1';
//            break;
//        }
//    }
//}
//
//echo PHP_EOL;
//echo microtime(true) - $micro;

//print_r($_GET);
//
//print_r($_POST);
//
//print_r($_FILES);
//
//if (isset($_FILES['file'])) {
//    move_uploaded_file($_FILES['file']['tmp_name'], '/app/public/' . $_FILES['file']['name']);
//}

include ('../src/Main.php');

$main = new Main();

$main->Main();