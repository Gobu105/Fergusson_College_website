<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userMessage = trim($_POST["message"]);

    // "Teach" mode — add Q&A pair dynamically
    if (stripos($userMessage, "teach:") === 0) {
        $content = trim(substr($userMessage, 6));
        if (strpos($content, "=") !== false) {
            list($q, $a) = explode("=", $content, 2);
            $q = trim($q);
            $a = trim($a);

            $file = fopen("faq_data.csv", "a");
            fputcsv($file, [$q, $a]);
            fclose($file);

            echo "✅ Got it! I learned something new: '$q' → '$a'.";
            shell_exec("python3 ml_model.py retrain");
        } else {
            echo "⚠️ Format error. Use: teach: [question] = [answer]";
        }
        exit;
    }

    // Normal chat mode
    $escapedMessage = escapeshellarg($userMessage);
    $output = shell_exec("/home/gobu105/Projects/Fergusson_College_website/venv/bin/python3 ml_model.py $escapedMessage 2>&1");

    if ($output) {
        $response = json_decode($output, true);
        echo $response['response'] ?? "Sorry, I can’t process that right now.";
    } else {
        echo "Sorry, I can’t process that right now.";
    }
}
?>
