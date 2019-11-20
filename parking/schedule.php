<?php
require_once 'parkingClass/autoload.php';
$scheduleRepository = new \parkingClass\ScheduleRepository();
if (isset($_POST['date'])) {
    $date = $_POST['date'];
    $schedule = $scheduleRepository->getByDate($date);
    echo '<html> <head><meta charset="utf-8"></head> <body> <table border="1"> <caption>График</caption>';
    echo '<tr>';
    echo '<th>Номер</th>';
    echo '<th>Номер лицензии водителя</th>';
    echo '<th>Номер автобуса</th>';
    echo '<th>Дата выезда</th>';
    echo '<th>Отменить выезд</th>';
    echo '</tr>';
    foreach ($schedule as $value) {
        echo '<tr> <td>' . $value['id'] . '</td>';
        echo '<td> ' . $value['driver_license'] . '</td>';
        echo '<td> ' . $value['car_number'] . '</td>';
        echo '<td> ' . $value['date'] . '</td>';
        echo '<td><a href="/parking/deleteSchedule.php?id=' . $value['id'] . '"> Delete</td> </tr>';
    }
} else {
    $schedule = $scheduleRepository->getList();
    echo '<html> <head><meta charset="utf-8"></head> <body> <table border="1"> <caption>График</caption>';
    echo '<tr>';
    echo '<th>Номер</th>';
    echo '<th>Номер лицензии водителя</th>';
    echo '<th>Номер автобуса</th>';
    echo '<th>Дата выезда</th>';
    echo '<th>Отменить выезд</th>';
    echo '</tr>';
    foreach ($schedule as $value) {
        echo '<tr> <td>' . $value['id'] . '</td>';
        echo '<td> ' . $value['driver_license'] . '</td>';
        echo '<td> ' . $value['car_number'] . '</td>';
        echo '<td> ' . $value['date'] . '</td>';
        echo '<td><a href="/parking/deleteSchedule.php?id=' . $value['id'] . '"> Delete</td> </tr>';
    }
}
echo '</table>';
echo '<p>Добавить в график:</p>';
echo '<a href="/parking/createSchedule.php"> Create</a>';
echo '<p>Фильтр по дате</p>';
echo '<form name="sort" method="post" action="schedule.php">
<input type="date" name="date"
        max="2021-01-01" min="2019-11-11">
        <input type="submit" value="Фильтр"></p>
</form>';
echo ' </body> </html>';