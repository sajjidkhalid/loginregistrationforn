<?php

$server = "localhost";
$username = "root";
$pass = "";
$db = "facebook";

$connection = mysqli_connect($server,$username,$pass,$db);
if(!$connection){
    die ("connection is failed" . mysqli_connect_error());

}else{
    echo "success <br>";

}
$sqldb = "create database if not exists facebook";
$res = mysqli_query($connection,$sqldb);
if($res){
    echo "db is created <br>";
}
$sqltb = "create table if not exists sajjid(
Id int primary key not null auto_increment,
Name varchar(255),
Email varchar(255),
Password varchar(255),
Contact varchar(255)
)";
$res = mysqli_query($connection,$sqltb);
if($res){
    echo "table is created successfully";
}
