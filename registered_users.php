<?php
include 'db_connection.php'; 

// Check if the user is logged in
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: login.html");
    exit();
}

$sql = "SELECT id, username, email FROM admin";
$result = $conn->query($sql);

echo "<table>";
echo "<tr><th>ID</th><th>Username</th><th>Email</th></tr>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "No registered users.";
}
echo "</table>";

$conn->close();
?>


