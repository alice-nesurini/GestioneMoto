<?php
	$idAllievo=$_GET['IdAllievo'];
	$idLezione=$_GET['IdLezione'];
	$conn=mysqli_connect("localhost", "root", "root", "corsimoto") or die("error");
	$sql="DELETE FROM Partecipazione WHERE IdAllievo=$idAllievo AND IdLezione=$idLezione";
	$ris=mysqli_query($conn, $sql) or die("error query");
	echo("Id");
?>