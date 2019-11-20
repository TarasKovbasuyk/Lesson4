<?php
require_once 'parkingClass/autoload.php';
$busDelete = new \parkingClass\BusRepository();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $bus = $busDelete->get($id);
    if (!empty($bus)) {
        echo '<form name="delete" method="post" action="deleteBus.php">
        <input type="hidden" name="id" value="' . $bus['id'] . '">
         Вы действитьельно хотете удалить автобус: ' .
            $bus['Model'] .'номерной знак:'.$bus['Car_Number'] . ' ?
         <input type="submit" value="delete">
         <a href="bus.php">Назад</a>
        </form>';
    } else {
        echo 'Вы пытаетесь удалить не существующий автобус! 
            <a href="bus.php">Вернутся назад.</a>';
    }
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $busDelete->delete($id);
    header("Location: /parking/bus.php");
}