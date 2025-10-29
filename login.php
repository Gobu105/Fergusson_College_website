<?php
// Connect to MySQL
$host = "localhost";
$user = "root"; // Update this to your MySQL username
$password = "root"; // Update this to your MySQL password
$dbname = "admission_chatbot";
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $r_no = $_POST['r_no'];
    $password = $_POST['password'];

    // Check if registration number exists and password matches
    $stmt = $conn->prepare("SELECT password FROM login WHERE r_no = ?");
    $stmt->bind_param("s", $r_no);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            echo "Login successful! You can now chat.";
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "Registration number not found.";
    }

    $stmt->close();
}

$conn->close();
?>
