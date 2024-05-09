<?php

$dbhost="localhost";
$dbuser="root";
$dbpassword="";
$dbdatabasename="Grad";
$conn= mysqli_connect($dbhost,$dbuser,$dbpassword,$dbdatabasename);
if(!$conn){
    die('Error'.mysqli_connect_error());
} 
