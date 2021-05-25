<?php

$conn=mysqli_connect('localhost','root','','lms');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select * from issue_books where student_enrollment =120";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "student_enrollment: " . $row["student_enrollment"]. " - student_name: " . $row["student_name"]. " " . $row["student_email"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
									
									
									

	
?>