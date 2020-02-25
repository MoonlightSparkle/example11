<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Lab 3B</title>
</head>

<body>

<?php

$servername = "localhost";
$username = "webtester2";
$password = "webtester234";
$dbname = "webtesting2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>


<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $sql = "SELECT student_grade WHERE nric = '".$_GET["nric"]."'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {

	  while($row = $result->fetch_assoc()) {
		  echo "ID: <input type='text' name='id' value='".$row["id"]."'><br><br>";
		  echo "Name: <input type='text' name='name' value='".$row["name"]."'><br><br>";
		  
		  ?>
          
          CCA:
            <input type="checkbox" name="cca[]" value="Jogging">Jogging<br>
            <input type="checkbox" name="cca[]" value="Swimming">Swimming<br>
            <input type="checkbox" name="cca[]" value="Hiking">Hiking<br>
            <input type="checkbox" name="cca[]" value="Singing">Singing<br>
		  
		  <?php

	  }
  } else {
	  echo "ID: <input type='text' name='id'>";

  }
  $conn->close();

} else {
    echo 'ID: <input type="text" name="id"><br><br>';
}

?>

<input type="submit" value="Send">
</form>

</body>
</html>