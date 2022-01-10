<?php
include_once "klasy/Baza.php";

$db = new Baza("localhost", "root", "", "cinema");

$SelectQuery = "SELECT userId FROM logged_in_users";
$userId = ['userId'];
$userIdFromDB = $db->select($SelectQuery, $userId);
        
$SelectQuery = "SELECT * FROM users WHERE id='$userIdFromDB'";
$userDataColumns = ['name', 'surname', 'age', 'email', 'phone', 'passwd'];
$userData = $db->select($SelectQuery, $userDataColumns);
echo $userData;