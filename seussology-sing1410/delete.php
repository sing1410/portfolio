<?php

require_once 'db.php';

// DELETE FROM QUOTES
$query = 'DELETE FROM `quotes` WHERE `book_id` = ' . $_GET['id'];
$para = array($_GET['id']);
$prepared_query = $db->prepare($query);
$prepared_query->execute($para);

// DELETE FROM BOOKS
$query = "DELETE FROM `books` WHERE `book_id` = ?";
$para = array($_GET['id']);
$prepared_query = $db->prepare($query);
$prepared_query->execute($para);

// HEADING TO HOMEPAGE
header('Location: ' . 'index.php');
