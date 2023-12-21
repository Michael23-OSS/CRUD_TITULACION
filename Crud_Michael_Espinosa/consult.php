<?php
include 'db_conn.php'; 
$sql = "SELECT * FROM crud"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - first_name: " . $row["first_name"]. " - last_name: " . $row["last_name"]. " - email: " . $row["email"]. " - gender: " . $row["gender"] . "\n";
    }
} else {
    echo "0 results";
}
$conn->close();
?>