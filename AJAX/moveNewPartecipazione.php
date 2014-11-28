<?php
	$idAllievo=$_GET['IdAllievo'];
	$idLezione=$_GET['IdLezione'];
	$conn=mysqli_connect("localhost", "root", "root", "corsimoto") or die("error");
	$sql="INSERT INTO Partecipazione SET IdAllievo=$idAllievo, IdLezione=$idLezione";
	$ris=mysqli_query($conn, $sql) or die($sql);
	echo("dragAndDrop.php");
?>