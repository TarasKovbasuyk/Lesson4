<?php
require_once 'parkingClass/autoload.php';
$scheduleDelete = new \parkingClass\ScheduleRepository();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $schedule = $scheduleDelete->get($id);
    if (!empty($schedule)) {
        echo '<form name="delete" method="post" action="deleteSchedule.php">
        <input type="hidden" name="id" value="' . $schedule['id'] . '">
         Вы действитьельно хотете отменить выезд: ' .
            $schedule['date'] . ' ?
         <input type="submit" value="delete">
         <a href="schedule.php">Назад</a>
        </form>';
    } else {
        echo 'Вы пытаетесь удалить не существующего водителя! 
            <a href="schedule.php">Вернутся назад.</a>';
    }
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $scheduleDelete->delete($id);
    header("Location: /parking/schedule.php");
}