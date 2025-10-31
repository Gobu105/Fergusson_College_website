<?php
header("Content-Type: application/json");

// Only handle POST requests
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userMessage = trim($_POST["message"] ?? "");

    // --- "Teach" mode (store new Q&A) ---
    if (stripos($userMessage, "teach:") === 0) {
        $content = trim(substr($userMessage, 6));
        if (strpos($content, "=") !== false) {
            list($q, $a) = explode("=", $content, 2);
            $q = trim($q);
            $a = trim($a);

            // Save to faq_data.csv
            $file = fopen("faq_data.csv", "a");
            fputcsv($file, [$q, $a]);
            fclose($file);

            echo json_encode([
                "reply" => "✅ Got it! I learned something new: '$q' → '$a'."
            ]);
        } else {
            echo json_encode([
                "reply" => "⚠️ Format error. Use: teach: [question] = [answer]"
            ]);
        }
        exit;
    }

    // --- Simple FAQ matching mode ---
    $reply = "🤖 Thanks for your message! We'll get back to you soon.";

    if (file_exists("faq_data.csv")) {
        $lines = array_map('str_getcsv', file("faq_data.csv"));
        foreach ($lines as $row) {
            if (stripos($userMessage, $row[0]) !== false) {
                $reply = $row[1];
                break;
            }
        }
    }

    echo $reply;
}
?>
