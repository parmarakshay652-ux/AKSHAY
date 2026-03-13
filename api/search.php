<?php
header('Content-Type: application/json');
include '../config/database.php';
include '../classes/Vendor.php';

$vendor = new Vendor();
$query = isset($_GET['q']) ? sanitize($_GET['q']) : '';

if ($query) {
    $results = $vendor->searchVendors($query);
    echo json_encode($results);
} else {
    echo json_encode([]);
}
?>