<?php
$conn = mysqli_connect("localhost","root","","test");
if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
?>
<html>
<head>
	<title>SEARCH</title>
</head>
<body>
	<h3>SEARCH</h3>
	<a href="index.php">HOME</a>
	<form method="post">
		<input type="text" id='term' name='term'>
		<input type ='submit' id='submit' name='submit' value='Search Database'>

	</form>
	<table style="width: 100vw;">
	<tr>
		<td>ID</td>
		<td>Name</td>
		<td>Age</td>
	</tr>	




	
	<?php
	if(isset($_POST['submit'])){
		$term = $_POST['term'];
		$sql =mysqli_query($conn,"SELECT * FROM users
		WHERE id LIKE '%$term%' or
		name LIKE '%$term%' or
		age LIKE '%$term%' or
		email LIKE '%$term%'
		");
	if (mysqli_num_rows($sql) > 0)
	{
 //$i = 1;
	while ($row = mysqli_fetch_array($sql)) {
	// Print out the contents of the entry
	echo '<tr>';
	echo '<td>' . $row['id'] . '</td>';
	echo '<td>' . $row['name'] . '</td>';
	echo '<td>' . $row['age'] . '</td>';
	echo '<td>' . $row['email'] . '</td>';
//$i++;
}
}
else
{
echo "No found database";
}	
		
		
		
	}
	?>
	</table>	
		
		
<?php


?>
		
		
		
		
		
</body>
</html>