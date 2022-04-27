<?php

session_start();

//if(!isset($_SESSION['level']) && $_SESSION['level'] == 1)
if(empty($_SESSION['level'])) { //kiểm tra cả việc level bằng 0 cũng ko hợp lệ
    header('location:../index.php');
}