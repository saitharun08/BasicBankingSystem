<?php
$servername="sql213.epizy.com";
$username="epiz_26997034";
$password="QG26OMnvtCf";
$dbname="epiz_26997034_tharunsaia";


$conn= mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
{
	die("connection failed: ".mysqli_connect_error().'<hr>');
}

?>