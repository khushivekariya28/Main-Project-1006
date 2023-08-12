<?php
include 'db_connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $image_url = ""; 

    $sql = "INSERT INTO admin (username, email, hashed_password, image_url) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $email, $hashed_password, $image_url);

    if ($stmt->execute()) {
        header("Location: login.html");
        exit();
    } else {
        echo "Registration failed.";
    }

    $stmt->close();
}

$conn->close();
?>
