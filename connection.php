<?php
$server="localhost";
$username="root";
$password="";
$dbname="myprojectbca";

//Create a connection
$con=mysqli_connect($server,$username,$password,$dbname); 

//check connection
if(!$con)
{
    echo "Connection Unsucessfull";
}
?>