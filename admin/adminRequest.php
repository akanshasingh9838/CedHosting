<?php
require_once '../Product.php';
require_once '../Dbcon.php';
$dbcon =new Dbcon();
$product = new Product();


if (isset($_GET['fetchCategory'])) {
    $data = $Product->fetchCategory($dbcon-> conn);
    echo $data;
}

if (isset($_POST['action']) && $_POST['action'] == 'addProductDetails') {
    $productCategory = $_POST['productCategory'];
    $productName = $_POST['productName'];
    $pageUrl = $_POST['pageUrl'];
    $monthlyPrice = $_POST['monthlyPrice'];
    $annualPrice = $_POST['annualPrice'];
    $sku = $_POST['sku'];
    $webSpace = $_POST['webSpace'];
    $freeDomain = $_POST['freeDomain'];
    $bandwidth = $_POST['bandwidth'];
    $LTSupport = $_POST['LTSupport'];
    $mailbox = $_POST['mailbox'];

    $msg = $product->addProduct($productCategory, $productName, $pageUrl, $monthlyPrice, $annualPrice, $sku, $webSpace, $freeDomain, $bandwidth, $LTSupport, $mailbox, $dbcon->conn);
    echo $msg;
}
?>