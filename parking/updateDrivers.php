<?php
require_once 'parkingClass/autoload.php';
$driverUpdate = new \parkingClass\DriversRepository();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $driver = $driverUpdate->get($id);
    echo '<form name="update" method="post" action="updateDrivers.php">
    <input type="hidden" name="id" value="' . $driver['id'] . '">
    <input type="text" name="name" value="' . $driver['name'] . '" placeholder="name">
    <br>
    <input type="text" name="driver_exp" value="' . $driver['driver_exp'] . '" placeholder="driver_exp">
    <br>
    <input type="text" name="driver_license" value="' . $driver['driver_license'] . '" placeholder="driver_license">
    <br>
    <input type="text" name="hour_salary" value="' . $driver['hour_salary'] . '" placeholder="hour_salary">
    <br>
    <input type="submit" value="Save">
    </form>';
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $driver = $driverUpdate->get($id);
    $driver['name'] = $_POST['name'];
    $driver['driver_exp'] = $_POST['driver_exp'];
    $driver['driver_license'] = $_POST['driver_license'];
    $driver['hour_salary'] = $_POST['hour_salary'];
    $driverUpdate->update($id, $driver);
    header("Location: /parking/drivers.php");
}