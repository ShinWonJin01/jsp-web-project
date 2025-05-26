<?php
	session_start();
	if(isset($_SESSION['id'])) $id=$_SESSION['id'];
	else $id="";
	if(isset($_SESSION['name'])) $name=$_SESSION['name'];
	else $name="";
?>