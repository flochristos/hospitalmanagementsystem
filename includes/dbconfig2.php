<?php
//Enter your host configuration here in my case it is root

$conn = mysqli_connect('localhost', 'root', '');

if (!$conn){

    die("Database conn Failed" . mysqli_error($conn));

}

//Enter yoour database name here in my case i am using pagination.

$select_db = mysqli_select_db($conn, 'hms');

if (!$select_db){
    die("Database Selection Failed" . mysqli_error($conn));

}
?>