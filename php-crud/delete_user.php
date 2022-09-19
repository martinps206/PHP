<?php
require_once __DIR__ . '/lib/DataSource.php';
$database = new DataSource();
$sql = "DELETE FROM users WHERE userId =? ";
$paramType = "i";
$paramValue = array(
    $_GET["userId"]
);
$database->delete($sql, $paramType, $paramValue);
header("Location:index.php");
exit();
?>