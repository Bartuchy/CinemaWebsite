<?php
include_once "klasy/Baza.php";

$db = new Baza("localhost", "root", "", "cinema");

$SelectQuery = "SELECT userId FROM logged_in_users";
$userId = ['userId'];
$userIdFromDB = $db->select($SelectQuery, $userId);
        
$SelectQuery = "SELECT * FROM tickets WHERE userId='$userIdFromDB'";
$ticketDataColumns = ['id', 'title', 'date', 'language', 'details', 'payment'];
$ticketData = $db->selectTickets($SelectQuery, $ticketDataColumns);
echo $ticketData;