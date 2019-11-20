<?php
require_once 'parkingClass/autoload.php';
$bus = new parkingClass\BusRepository();
$driversRepository = new parkingClass\DriversRepository();
$drivers = $driversRepository->getList();
$busesRepository = new \parkingClass\BusRepository();
$buses = $busesRepository->getList();
$scheduleRepository = new \parkingClass\ScheduleRepository();
if (isset($_POST['driver_license']) && isset($_POST['car_number']) && isset($_POST['date']) ){
    $schedule = [];
    $schedule['driver_license'] = $_POST['driver_license'];
    $schedule['car_number'] = $_POST['car_number'];
    $schedule['date'] = $_POST['date'];
    $scheduleRepository->insert($schedule);
    header("Location: /parking/schedule.php");
}
?>
<form name="create" method="post" action="createSchedule.php">
    <p>Выберите лицензию:
    <select size="3" name="driver_license">
        <?php
        foreach ($drivers as $value) {
            echo '<option value="' . $value['Driver_License'] . '">' . $value['Driver_License'] . '</option>';
        }
        ?>
    </select></p>
    <p>Выберите атобус:
    <select size="3" name="car_number">
    <?php
    foreach ($buses as $value) {
        echo '<option value="' . $value['Car_Number'] . '">' . $value['Car_Number'] . '</option>';
    }
    ?>
    </select></p>
    <p>Выберите дату:
    <input type="date" name="date"
           max="2021-01-01" min="2019-11-11">
        <input type="submit" value="Отправить"></p>
</form>