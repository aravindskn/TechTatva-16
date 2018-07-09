<?php 
$conn2 = mysqli_connect("localhost", "root", "techTatva!6", "constructure");
for ($i = 100; $i < 5000; $i++) {
	$query2 = mysqli_query($conn2, "insert into users values(".$i.", 0, 0, 0, 0, 0, 0, 0)");
}
?>