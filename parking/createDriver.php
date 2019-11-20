<?php
require_once 'parkingClass/autoload.php';
if (isset($_POST['name']) && isset($_POST['driver_exp']) && isset($_POST['driver_license']) && isset($_POST['hour_salary'])) {
    $driverCreate = new \parkingClass\DriversRepository();
    $driver = [];
    $driver['name'] = $_POST['name'];
    $driver['driver_exp'] = $_POST['driver_exp'];
    $driver['driver_license'] = $_POST['driver_license'];
    $driver['hour_salary'] = $_POST['hour_salary'];
    $driverCreate->insert($driver);
    header("Location: /parking/drivers.php");
}
echo '<form name="create" method="post" action="createDriver.php">
    <input type="text" name="name"  placeholder="name">
    <br>
    <input type="text" name="driver_exp"  placeholder="driver_exp">
    <br>
    <input type="text" name="driver_license"  placeholder="driver_license">
    <br>
    <input type="text" name="hour_salary"  placeholder="hour_salary">
    <br>
    <input type="submit" value="Save">
    </form>';