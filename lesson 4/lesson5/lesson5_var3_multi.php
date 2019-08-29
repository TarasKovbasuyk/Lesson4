<html>
<head>
</head>
<body>
<form method="POST">
    <p>1 - сортировка `age` - по возрастанию, `gender` - по убыванию ,
        2 `age` - по убыванию, `gender` - по возрастанию</p>
    <input type="text" name="sort">
    <input type="submit">
</form>
</body>
</html>
<?php
$method = $_POST['sort'];
$array = array(
    'a1' => array('id'=>'1', 'age'=>'16', 'gender'=>'m', 'login'=>'Вася'),
    'a2' => array('id'=>'2', 'age'=>'18', 'gender'=>'m', 'login'=>'Петя'),
    'a3' => array('id'=>'3', 'age'=>'20', 'gender'=>'g', 'login'=>'Катя'),
    'a4' => array('id'=>'4', 'age'=>'20', 'gender'=>'m', 'login'=>'Стас'),
    'a5' => array('id'=>'5', 'age'=>'12', 'gender'=>'g', 'login'=>'Маша'),
    'a6' => array('id'=>'6', 'age'=>'44', 'gender'=>'g', 'login'=>'Галя'),
    'a7' => array('id'=>'7', 'age'=>'45', 'gender'=>'m', 'login'=>'Макс'),
    'a8' => array('id'=>'8', 'age'=>'20', 'gender'=>'m', 'login'=>'Илья'),
    'a9' => array('id'=>'9', 'age'=>'20', 'gender'=>'g', 'login'=>'Даша'), );
$age  = array_column($array, 'age');
$gender = array_column($array, 'gender');
if ($method == 1)
{
    array_multisort($age, SORT_DESC, $gender, SORT_ASC, $array);
    print_r($array);
} elseif ($method == 2)
{
    array_multisort($gender, SORT_DESC, $age, SORT_ASC, $array);
    print_r($array);
}

