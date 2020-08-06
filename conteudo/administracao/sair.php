<?php
session_start();
unset($_SESSION['id'], $_SESSION['name'], $_SESSION['email'], $_SESSION['techid'], $_SESSION['customer_id'], $_SESSION['techid'], $_SESSION['dtdue'], $_SESSION['dtmeasurement'], $_SESSION['controle']);

$_SESSION['msg'] = "Successfully logged out";
header("Location: login.php");



