<?php
require_once 'parkingClass/autoload.php';
$driverDelete = new \parkingClass\DriversRepository();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $driver = $driverDelete->get($id);
    if (!empty($driver)) {
        echo '<form name="delete" method="post" action="deleteDriver.php">
        <input type="hidden" name="id" value="' . $driver['id'] . '">
         Вы действитьельно хотете удалить водителя: ' .
            $driver['Name'] . ' ?
         <input type="submit" value="delete">
         <a href="drivers.php">Назад</a>
        </form>';
    } else {
        echo 'Вы пытаетесь удалить не существующего водителя! 
            <a href="drivers.php">Вернутся назад.</a>';
    }
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $driverDelete->delete($id);
    header("Location: /parking/drivers.php");
}