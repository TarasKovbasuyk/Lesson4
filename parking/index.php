<?php
require_once 'vendor/autoload.php';
$data = new \parkingClass\BusRepository();
echo '<a href="/parking/drivers.php">Drivers</a>>';
echo '<br>';
echo '<a href="/parking/bus.php">Bus</a>>';
echo '<br>';
echo '<a href="/parking/schedule.php">Schedule</a>>';
