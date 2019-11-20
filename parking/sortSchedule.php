<?php
require_once 'parkingClass/autoload.php';
$sortSchedule = new \parkingClass\ScheduleRepository();
if (isset($_POST['date'])) {
    $date = $_POST['date'];
    $schedule = $sortSchedule->getByDate($date);
}
var_dump($schedule);
echo '<html> <head><meta charset="utf-8"></head> <body> <table border="1"> <caption>График</caption>';
echo '<tr>';
echo '<th>Номер</th>';
echo '<th>Номер лицензии водителя</th>';
echo '<th>Номер автобуса</th>';
echo '<th>Дата выезда</th>';
echo '<th>Изменить данные</th>';
echo '<th>Отменить выезд</th>';
echo '</tr>';
foreach ($schedule as $value) {
    echo '<tr> <td>' . $value['id'] . '</td>';
    echo '<td> ' . $value['Name'] . '</td>';
    echo '<td> ' . $value['Driver_Exp'] . '</td>';
    echo '<td> ' . $value['Driver_License'] . '</td>';
    echo '<td> ' . $value['Hour_Salary'] . '</td>';
    echo '<td><a href="/parking/updateDrivers.php?id=' . $value['id'] . '"> Update </td>';
    echo '<td><a href="/parking/deleteDriver.php?id=' . $value['id'] . '"> Delete</td> </tr>';
}
echo '</table> </body> </html>';