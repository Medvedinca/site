<?php
if (isset($_POST['name']) && isset($_POST['family']) && isset($_POST['age']) && isset($_POST['phone'])){

  $name = $_POST['name'];
  $family = $_POST['family'];
  $age = $_POST['age'];
  $phone = $_POST['phone'];
  $com = $_POST['com'];


  $servername = "eu-cdbr-west-01.cleardb.com"; 
  $username = "bd30da98e8f102"; // Логин БД
  $password = "ad0927c6"; // Пароль БД
  $database = 'heroku_83b71ec5bff1667'; // Имя БД
  $db_table = "users"; // Имя Таблицы БД

  $conn = mysqli_connect($servername, $username, $password, $database);

  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
	}
 
	echo "Connected successfully";

	$sql = "INSERT INTO users (name, family, age, phone, com) VALUES ('$name', '$family', '$age', '$phone', '$com')";

	if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
	} 
	else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);

	echo "<script>
             alert('Ваша заявка успешно зарегестрирована!'); 
             window.history.go(-1);
     </script>";
}
?>