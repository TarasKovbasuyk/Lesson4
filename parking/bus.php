<?php
require_once 'parkingClass/autoload.php';
$bus = new parkingClass\BusRepository();
$data = $bus->getList();
echo '<html> <head><meta charset="utf-8"></head> <body> <table border="1"> <caption>Автопарк</caption>';
echo '<tr>';
echo '<th>Порядковый Номер</th>';
echo '<th>Модель</th>';
echo '<th>Номер</th>';
echo '<th>Расход топлива</th>';
echo '<th>Стоимость часа</th>';
echo '<th>Изменить данные</th>';
echo '<th>Удалить Автобус</th>';
echo '</tr>';
foreach ($data as  $value) {
    echo '<tr> <td>' . $value['id'] . '</td>';
    echo '<td> ' . $value['Model'] . '</td>';
    echo '<td> ' . $value['Car_Number'] . '</td>';
    echo '<td> ' . $value['Fuel_Consumption'] . '</td>';
    echo '<td> ' . $value['Hour_Price'] . '</td>';
    echo '<td><a href="/parking/updateBus.php?id=' . $value['id'] . '"> Update </td>';
    echo '<td><a href="/parking/deleteBus.php?id=' . $value['id'] . '"> Delete</td></tr> ';
}
echo '</table> </body> </html>';
echo '<p>Добавить автобус:</p>';
echo '<a href="/parking/createBus.php"> Create </a>';