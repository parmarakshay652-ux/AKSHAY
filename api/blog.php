<?php
header('Content-Type: application/json');
include '../config/database.php';
include '../classes/Blog.php';

$blog = new Blog();
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : null;

$results = $blog->getAllBlogs($limit);
echo json_encode($results);
?>