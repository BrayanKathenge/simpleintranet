<?php
$conn=new mysqli("localhost","root","","intranet");
if($conn->connect_error){
    die("connection failed" .$conn->connect_error);
}