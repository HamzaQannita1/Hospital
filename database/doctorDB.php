<?php
require_once 'DB.php';
function insertDoctor($name, $email, $password, $specialty, $phone, $address)
{
    $conn = connectDatabase();

    // إعداد الاستعلام
    $query = "INSERT INTO doctors (name, email, password, specialty, phone, address, created_at, updated_at) 
              VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())";

    // تحضير الاستعلام
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        error_log("Prepare failed: " . $conn->error);
        return false;
    }

    // تشفير كلمة المرور
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // ربط المتغيرات
    $stmt->bind_param("ssssss", $name, $email, $hashedPassword, $specialty, $phone, $address);

    // تنفيذ الاستعلام
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        return true;
    } else {
        error_log("Execute failed: " . $stmt->error);
        $stmt->close();
        $conn->close();
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $specialty = $_POST['specialty'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    header("Location: ../doctors.php");
    exit();
}
