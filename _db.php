<?php

$hostname="localhost";
$dbUser="root";
$dbPassword="";
$dbName="swiftblock";
$conn = mysqli_connect($hostname, $dbUser, $dbPassword, $dbName);

if(!$conn){
    die("something went wrong, check your network");
}