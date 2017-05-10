<?php
$username = $_POST["username"];
$cookiename = $_COOKIE["username"];
$cookie = $_COOKIE[$cookiename."uniqid"];
$pdo = new PDO('mysql:host=localhost;dbname=jiaoyu','root','');
$sql = "SELECT * FROM `user` WHERE `username`='{$username}'";
$stmt = $pdo->query($sql);
if ($stmt) {
    foreach ($stmt as $value) {
        if ($cookie != $value["useruniqid"]) {
            echo '{"success":"true"}';
        } else {
            echo '{"success":"error"}';
        }
    }
}