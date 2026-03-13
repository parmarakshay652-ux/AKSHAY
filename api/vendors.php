<?php
header('Content-Type: application/json');
include '../config/database.php';
include '../classes/Vendor.php';

$vendor = new Vendor();
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : null;

$results = $vendor->getAllVendors($limit);
echo json_encode($results);
?>