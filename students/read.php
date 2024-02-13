<?php
$host = "localhost";
$username = "sayusma";
$password = "sayusma";
$databaseName = "student_records";

$connection = mysqli_connect($host, $username, $password, $databaseName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$studentsData = array();

$sql = "SELECT id, first_name, last_name, marks, grade FROM students";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $studentsData[] = $row;
    }
}

$connection->close();
header('Content-Type: application/json');
echo json_encode($studentsData);
?>