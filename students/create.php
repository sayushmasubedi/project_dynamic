<?php
if (isset($_POST['submit'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $marks = $_POST['marks'];
    $grade = $_POST['grade'];

    $host = "localhost";
    $username = "sayusma";
    $password = "sayusma";
    $databaseName = "student_records";

    $connection = mysqli_connect($host, $username, $password, $databaseName);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "INSERT INTO students (first_name, last_name, marks, grade) VALUES ('$firstName', '$lastName', $marks, '$grade')";


    if ($connection->query($sql) === TRUE) {
        echo "<p style='color: green;font-size: 2em;'>Student record created successfully</p>";
        echo "<br>";
        echo "<a href='../read.html' style='color: blue; text-decoration: none;'>View Records</a>";
    } else {
        echo "<p style='color: red;'>Error: " . $sql . "<br>" . $connection->error . "</p>";
    }
    $connection->close();
}
?>