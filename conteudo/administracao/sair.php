<?php
session_start();
unset($_SESSION['id'], $_SESSION['name'], $_SESSION['email'], $_SESSION['techid'], $_SESSION['customer_id'], $_SESSION['techid'], $_SESSION['dtdue'], $_SESSION['dtmeasurement'], $_SESSION['controle'], $_SESSION['manufacturer'], $_SESSION['model'], $_SESSION['capacity'], $_SESSION['nmincapacity'], $_SESSION['sn'], $_SESSION['type'], $_SESSION['location'], $_SESSION['nmeasure'], $_SESSION['control']);

$_SESSION['msg'] = "Successfully logged out";
header("Location: login.php");



