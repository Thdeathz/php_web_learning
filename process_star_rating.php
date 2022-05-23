<?php
session_start();
$rating = $_POST['rating'];
$comment = $_POST['comment'];
$product_id = $_POST['product_id'];
$customer_id = $_SESSION['id'];

require 'admin/connect.php';

$sql = "insert into product_rate(product_id,customer_id,rating,comment)
values('$product_id','$customer_id','$rating','$comment');";

mysqli_query($connect,$sql);
