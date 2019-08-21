<html>
<head>
</head>
<body>
<form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
    <p>1 - сортировка `age` - по возрастанию, `gender` - по убыванию ,
        2 `age` - по убыванию, `gender` - по возрастанию</p>
    <input type="text" name="a">
    <input type="submit">
</form>
</body>
</html>
<?php
$row = array(
    'a1' => array('id'=>'1', 'age'=>'16', 'gender'=>'m', 'login'=>'Вася'),
    'a2' => array('id'=>'2', 'age'=>'18', 'gender'=>'m', 'login'=>'Петя'),
    'a3' => array('id'=>'3', 'age'=>'20', 'gender'=>'g', 'login'=>'Катя'),
    'a4' => array('id'=>'4', 'age'=>'20', 'gender'=>'m', 'login'=>'Стас'),
    'a5' => array('id'=>'5', 'age'=>'12', 'gender'=>'g', 'login'=>'Маша'),
    'a6' => array('id'=>'6', 'age'=>'44', 'gender'=>'g', 'login'=>'Галя'),
    'a7' => array('id'=>'7', 'age'=>'45', 'gender'=>'m', 'login'=>'Макс'),
    'a8' => array('id'=>'8', 'age'=>'20', 'gender'=>'m', 'login'=>'Илья'),
    'a9' => array('id'=>'9', 'age'=>'20', 'gender'=>'g', 'login'=>'Даша'),
);
$sort =$_POST["a"];

if (!empty($sort)) {
    If ($sort == 1) {
        usort($row, function ($a, $b) {
            return ($a['age'] - $b['age']);
        });
        foreach ($row as $array) {
            echo $array['age'];
        }
        echo '<br>';
        usort($row, function ($a, $b) {
            return ($a['gender'] > $b['gender']) ? -1 : 1;
        });
        foreach ($row as $array) {
            echo $array['gender'];
        }
    } elseif ($sort == 2) {
        usort($row, function ($a, $b) {
            return ($b['age'] - $a['age']);
        });
        foreach ($row as $array) {
            echo $array['age'];
        }
        echo '<br>';
        usort($row, function ($a, $b) {
            return ($a['gender'] < $b['gender']) ? -1 : 1;
        });
        foreach ($row as $array) {
            echo $array['gender'];
        }
    } else {
        echo "Введены некорректные данные";

    }
}