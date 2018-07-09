<?php 
$conn1 = mysqli_connect("localhost", "root", "techTatva!6", "registration");
$query1 = mysqli_query($conn1, "select id from users where 1");
$conn2 = mysqli_connect("localhost", "root", "techTatva!6", "constructure");
while ($row = mysqli_fetch_array($query1)) {
	$query2 = mysqli_query($conn2, "insert into users values(".$row['id'].", 0, 0, 0, 0, 0, 0, 0);
}
?>