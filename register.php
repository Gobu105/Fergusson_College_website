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
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if registration number and name exist in registration table
    $stmt = $conn->prepare("SELECT * FROM registration WHERE r_no = ? AND firstname = ? AND lastname = ?");
    $stmt->bind_param("sss", $r_no, $firstname, $lastname);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If correct, insert the r_no and password into login table
        $stmt = $conn->prepare("INSERT INTO login (r_no, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $r_no, $password);

        if ($stmt->execute()) {
            echo "Registration successful. You can now <a href='login.php'>Login</a>";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Registration number or name is incorrect.";
    }

    $stmt->close();
}

$conn->close();
?>
