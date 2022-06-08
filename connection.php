<?php
session_start();
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="leafnow";
global $con;

if(!$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("failed to connect");
}
?>