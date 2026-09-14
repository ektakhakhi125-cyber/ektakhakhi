<?php

include "db.php";

$name = trim($_POST['name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? '');
$vehicle = trim($_POST['vehicle'] ?? '');
$complaint = trim($_POST['complaint'] ?? '');

$errors = [];

// Name validation
if (empty($name)) {
    $errors[] = "Name is required.";
}

// Phone validation
if (!preg_match("/^[0-9]{10}$/", $phone)) {
    $errors[] = "Phone number must contain exactly 10 digits.";
}

// Email validation
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Please enter a valid email address.";
}

// Vehicle validation
if (empty($vehicle)) {
    $errors[] = "Vehicle details are required.";
}

// Complaint validation
if (empty($complaint)) {
    $errors[] = "Complaint is required.";
}


// Display errors
if (!empty($errors)) {

    echo "<h2>Form Errors</h2>";

    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }

    echo "<a href='index.php'>Go Back</a>";

    exit;
}


// Insert using prepared statement
$sql = "INSERT INTO customer_interactions 
        (name, phone, email, vehicle, complaint)
        VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "sssss",
    $name,
    $phone,
    $email,
    $vehicle,
    $complaint
);

if (mysqli_stmt_execute($stmt)) {

    echo "<h2>Customer interaction submitted successfully!</h2>";

    echo "<a href='index.php'>Submit Another Response</a><br>";
    echo "<a href='view.php'>View Customer Records</a>";

} else {

    echo "Error: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>