<?php

session_start();
require_once('../helpers/db_connect.php');

if (isset($_POST['loginbtn'])) {

    unset($_POST['loginbtn']);
    $data = $_POST;

    $useremail = $data['useremail'];
    $password = $data['password'];
    $query = $conn->query("SELECT * FROM users where useremail = '$useremail' and password = '$password'");
    if($query->num_rows > 0){
        $res = $query->fetch_array();
        $_SESSION['id'] = $res['id'];
        $_SESSION['username'] = $res['username'];
        $_SESSION['useremail'] = $res['useremail'];
        $_SESSION['last_login'] = $res['last_login'];
        
        header('Location:../dashboard.php');
    }else{
        echo "<script type='text/javascript'>alert('User Not Found');window.location.href='../index.php';</script>";
    }
}