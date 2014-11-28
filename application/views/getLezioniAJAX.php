<?php
	$conn=mysqli_connect("localhost", "root", "root", "corsimoto") or die("error");
	$sql="SELECT * FROM Lezioni";
	$ris=mysqli_query($conn, $sql) or die("error query");
	$arrayLezioni=array();
	$n=0;
	while($r=mysqli_fetch_array($ris)){
		$arrayLezioni[$n]=$r['Data'];
		$n++;
	}
	echo($arrayLezioni);
?>