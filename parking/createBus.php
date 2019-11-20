<?php
require_once 'parkingClass/autoload.php';
if (isset($_POST['model']) && isset($_POST['car_number']) && isset($_POST['fuel_consumption']) && isset($_POST['hour_price'])) {
    $busCreate = new \parkingClass\BusRepository();
    $buses = [];
    $buses['model'] = $_POST['model'];
    $buses['car_number'] = $_POST['car_number'];
    $buses['fuel_consumption'] = $_POST['fuel_consumption'];
    $buses['hour_price'] = $_POST['hour_price'];
    $busCreate->insert($buses);
    header("Location: /parking/bus.php");
}
echo '<form name="create" method="post" action="createBus.php">
    <input type="text" name="model"  placeholder="model">
    <br>
    <input type="text" name="car_number"  placeholder="car_number">
    <br>
    <input type="text" name="fuel_consumption"  placeholder="fuel_consumption">
    <br>
    <input type="text" name="hour_price" placeholder="hour_price">
    <br>
    <input type="submit" value="Save">
    </form>';