<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wm_portsite_db";
$test = " ";
$column = " ";
$id = " ";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {$test = $_POST["test"];}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {$column = $_POST["column"];}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {$id = $_POST["id"];}
	
?>

<!DOCTYPE html>
<html lang="en">
<form action="DBlookup.php" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <head>
        <meta charset="utf-8" />
        <title>Database User Lookup</title>
    </head>
    <body>
		<img src="icons/bar.png" style="float:left;width:4000px;height:83px;margin:-8px;position:fixed;">
		<a href="/"><img src="icons/Websiteicon.png" style="float:left;width:150px;height:72.5px;position:fixed;margin:-6px;"></a>
		<br><br><br><br><h1 style="display: inline;"> Database User Lookup</h1>
		<table>
			<tr>
				<td>Database Name</td><td><input name="test" type="text" value=""></td><br>
			</tr>
			<tr>
				<td>Column Name</td><td><input name="column" type="text" value=""></td><br>
			</tr>
			<tr>
				<td>User ID</td><td><input name="id" type="text" value=""><input type="submit"></td>
			</tr> 
		</table>
    </body>
<div> 
Information for Database: "
<?php
	echo $test; 
?>"

 Column: "
<?php
	echo $column; 
?>"

 ID: "
<?php
	echo $id; 
?>"
<div>

<br>

<div>
<?php

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}


	$result = mysqli_query($conn, "SELECT * FROM $test WHERE $column = $id;");

	if ($result){
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				echo "Result: " . $row["$column"]." " . $row['testuser_username']." " . $row['testuser_password']."<br>";
			}
		} 
	}else {
			echo "0 results";
		}

	mysqli_close($conn);
?>
<div>

<footer>
  <p>Copyright Wesley Miller&#169;</p>
</footer>

</html>