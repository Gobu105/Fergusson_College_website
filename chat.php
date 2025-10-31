<?php
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userMessage = trim($_POST["message"] ?? "");

    // --- TEACH MODE ---
    if (stripos($userMessage, "teach:") === 0) {
        $content = trim(substr($userMessage, 6));
        if (strpos($content, "=") !== false) {
            list($q, $a) = explode("=", $content, 2);
            $q = trim($q);
            $a = trim($a);

            // Call Python teach API
            $apiUrl = "https://fergusson-college-website-tjpm.onrender.com/teach";
            $data = json_encode(["question" => $q, "answer" => $a]);

            $ch = curl_init($apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $response = curl_exec($ch);
            curl_close($ch);

            $decoded = json_decode($response, true);
            echo json_encode(["reply" => $decoded["response"] ?? "✅ Learned successfully!"]);
            exit;
        } else {
            echo json_encode(["reply" => "⚠️ Format error. Use: teach: [question] = [answer]"]);
            exit;
        }
    }

    // --- NORMAL CHAT ---
    $apiUrl = "https://fergusson-college-website-tjpm.onrender.com/chat";
    $data = json_encode(["message" => $userMessage]);

    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $response = curl_exec($ch);
    curl_close($ch);

    // ✅ Extract only the “response” text
    $decoded = json_decode($response, true);
    $reply = $decoded["response"] ?? $decoded["reply"] ?? "⚠️ Couldn't process that.";

    echo json_encode(["reply" => $reply]);
}
?>

