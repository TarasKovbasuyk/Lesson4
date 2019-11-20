<?php
require_once 'parkingClass/autoload.php';
$drivers = new parkingClass\DriversRepository();
$data = $drivers->getList();
echo '<html> <head><meta charset="utf-8"></head> <body> <table border="1"> <caption>Список сотрудников</caption>';
echo '<tr>';
echo '<th>Номер</th>';
echo '<th>Имя</th>';
echo '<th>Опыт</th>';
echo '<th>Номер лицензии</th>';
echo '<th>Часовая оплата</th>';
echo '<th>Изменить данные</th>';
echo '<th>Удалить водителя</th>';
echo '</tr>';
foreach ($data as $value) {
    echo '<tr> <td>' . $value['id'] . '</td>';
    echo '<td> ' . $value['Name'] . '</td>';
    echo '<td> ' . $value['Driver_Exp'] . '</td>';
    echo '<td> ' . $value['Driver_License'] . '</td>';
    echo '<td> ' . $value['Hour_Salary'] . '</td>';
    echo '<td><a href="/parking/updateDrivers.php?id=' . $value['id'] . '"> Update </td>';
    echo '<td><a href="/parking/deleteDriver.php?id=' . $value['id'] . '"> Delete</td> </tr>';
}
echo '</table> </body> </html>';
echo '<p>Добавить водителя:</p>';
echo '<a href="/parking/createDriver.php"> Create </a>';
