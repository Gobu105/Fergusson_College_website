<?php
// Database connection (adjust as per your DB credentials)
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "admission_chatbot";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the user's message from the POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userMessage = trim($_POST['message']); // The message sent by the user

    // Basic sanitization to prevent SQL injection
    $userMessage = $conn->real_escape_string($userMessage);

    // Convert the user message to lowercase and split it into keywords
    $keywordsArray = preg_split('/[\s,]+/', strtolower($userMessage));

    // Prepare SQL to search for keywords
    $keywordConditions = [];
    foreach ($keywordsArray as $keyword) {
        $keywordConditions[] = "keyword LIKE '%$keyword%'";
    }

    // Join keyword conditions with OR to search the faq table
    $sql = "SELECT answer FROM faq WHERE " . implode(" OR ", $keywordConditions) . " LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Get the first matching result
        $row = $result->fetch_assoc();
        $matchedQuestion = strtolower($row["answer"]);

        // Logic to differentiate between requests for details and general queries
        if (strpos($userMessage, 'details') !== false || strpos($userMessage, 'show') !== false) {
            if (strpos($matchedQuestion, 'fee') !== false) {
                // Show detailed fee structure
                include 'fees.php';
            } elseif (strpos($matchedQuestion, 'subject') !== false) {
                if (strpos($matchedQuestion, 'semester 1') !== false) {
                    // Show subjects for semester 1
                    include 'sem1.php';
                } elseif (strpos($matchedQuestion, 'semester 2') !== false) {
                    // Show subjects for semester 2
                    include 'sem2.php';
                }
            } elseif (strpos($matchedQuestion, 'seat') !== false || strpos($matchedQuestion, 'roaster') !== false) {
                // Show details of the roaster
                include 'roaster.php';
            } else {
                // Return the answer from the FAQ
                echo $row["answer"];
            }
        } else {
            // Return the answer from the FAQ for general queries
            echo $row["answer"];
        }
    } else {
        // If no answer is found in the database, provide a default response
        echo "Sorry, I don't understand the question. Please try asking differently or contact support.";
    }
}

// Close the connection
$conn->close();
?>
