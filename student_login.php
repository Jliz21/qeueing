<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];

    // Check if student exists in the database
    $result = $conn->query("SELECT * FROM students WHERE student_id='$student_id'");
    if ($result->num_rows > 0) {
        $_SESSION['student_id'] = $student_id;
        header("Location: scan.php");
        exit();
    } else {
        echo "<script>alert('Student ID not found!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Login</title>
<style>
body {
  background: linear-gradient(135deg, #0d0d0d, #004d00);
  color: white;
  font-family: Arial, sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
}
form {
  background: rgba(255, 255, 255, 0.08);
  padding: 25px;
  border-radius: 15px;
  width: 90%;
  max-width: 350px;
  text-align: center;
  box-shadow: 0 0 15px rgba(0, 255, 0, 0.2);
}
h2 {
  color: #00ff66;
  margin-bottom: 20px;
}
input {
  width: 90%;
  padding: 10px;
  margin: 10px 0;
  border: 1px solid #00ff66;
  border-radius: 10px;
  background: #000;
  color: white;
  outline: none;
}
button {
  width: 90%;
  padding: 10px;
  border: none;
  border-radius: 10px;
  background: #00ff66;
  color: black;
  font-weight: bold;
  cursor: pointer;
}
button:hover {
  background: #00cc52;
}
</style>
</head>
<body>
<form method="POST">
  <h2>Student Login</h2>
  <input type="text" name="student_id" placeholder="Enter Student ID" required><br>
  <button type="submit">Login</button>
</form>
</body>
</html>
