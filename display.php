<?php
include 'db_connection.php'; 

$sql = "SELECT id, title, description, image_url FROM content";
$result = $conn->query($sql);

// Display the content
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<p>" . $row["description"] . "</p>";
        echo "<img src='" . $row["image_url"] . "' alt='Content Image'>";
    }
} else {
    echo "No content available.";
}

$conn->close();
?>
