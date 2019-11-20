<?php
require_once 'parkingClass/autoload.php';
$busUpdate = new \parkingClass\BusRepository();
if (isset($_GET['id'])) {
    $_GET['id'] =+$_GET['id'];
    $id = $_GET['id'];
    $buses= $busUpdate->get($id);
    echo '<form name="update" method="post" action="updateBus.php">
    <input type="hidden" name="id" value="' . $buses['id'] . '">
    <input type="text" name="model" value="' . $buses['model'] . '" placeholder="model">
    <br>
    <input type="text" name="car_number" value="' . $buses['car_number'] . '" placeholder="car_number">
    <br>
    <input type="text" name="fuel_consumption" value="' . $buses['fuel_consumption'] . '" placeholder="fuel_consumption">
    <br>
    <input type="text" name="hour_price" value="' . $buses['hour_price'] . '" placeholder="hour_price">
    <br>
    <input type="submit" value="Save">
    </form>';
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $buses = $busUpdate->get($id);
    $buses['model'] = $_POST['model'];
    $buses['car_number'] = $_POST['car_number'];
    $buses['fuel_consumption'] = $_POST['fuel_consumption'];
    $buses['hour_price'] = $_POST['hour_price'];
    $busUpdate->update($id, $buses);
    header("Location: /parking/bus.php");
}