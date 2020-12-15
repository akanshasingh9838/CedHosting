<?php
require_once '../Product.php';
require_once '../Dbcon.php';
$dbcon =new Dbcon();
$Product = new Product();


if (isset($_GET['fetchCategory'])) {
    $data = $Product->fetchCategory($dbcon-> conn);
    echo $data;
}
?>