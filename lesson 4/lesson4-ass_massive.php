<html>
<head>
</head>
<body>
<form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
    <p>Введите ru/eng</p>
    <input type="text" name="lang">
    <input type="submit">
    <p>Введите день недели (1-7)</p>
    <input type="text" name="day">
</form>
</body>
</html>
<?php
$mas = array(
    'ru' => array(
        "1"=>"Понедельник",
        "2"=>"Вторник",
        "3"=>"Среда",
        "4"=>"Четверг",
        "5"=>"Пятница",
        "6"=>"Суббота",
        "7"=>"Воскресенье"
    ),
    'eng' => array(
        "1"=>"Monday",
        "2"=>"Tuesday",
        "3"=>"Wednesday",
        "4"=>"Thursday",
        "5"=>"Friday",
        "6"=>"Saturday",
        "7"=>"Sunday"
    ),
);
if (!empty($_POST)) {
    if (!empty($_POST['lang']) && !empty($_POST['day'])) {
        $lang = $_POST["lang"];
        $day =  $_POST["day"];

        echo $mas[$lang][$day];
    } else {
        echo "Введены некорректные данные";
    }
}