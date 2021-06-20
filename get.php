<!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="utf-8">
</head>
<body>
<h2>Список пользователей</h2>
<?php
 $servername = "eu-cdbr-west-01.cleardb.com"; 
  $username = "bd30da98e8f102"; // Логин БД
  $password = "ad0927c6"; // Пароль БД
  $database = 'heroku_83b71ec5bff1667'; // Имя БД
  $db_table = "users"; // Имя Таблицы БД

  $conn = mysqli_connect($servername, $username, $password, $database);
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}

 $conn->set_charset("utf8");

$sql = "SELECT * FROM Users";
if($result = $conn->query($sql)){
    $rowsCount = $result->num_rows; // количество полученных строк
    echo "<p>Получено объектов: $rowsCount</p>";
    echo "<table><tr><th>Id</th><th>Имя</th><th>Фамилия</th><th>Возраст</th><th>Направление</th><th>Телефон</th><th>Комментарий</th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["family"] . "</td>";
            echo "<td>" . $row["age"] . "</td>";
            echo "<td>" . $row["direction"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["com"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    $result->free();
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>
</body>
</html>