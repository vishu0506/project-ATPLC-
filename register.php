<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $pass);

  if ($stmt->execute()) {
    header("Location: login.php");
    exit();
  } else {
    echo "<script>alert('Email already registered!');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - GCE Portal</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background: url('gce college.jpg') no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .form-box {
      background-color: rgba(255, 255, 255, 0.8); /* semi-transparent white */
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.3);
      width: 350px;
      animation: fadeIn 0.7s ease-in-out;
      text-align: center;
      color: #4b2e2e; /* dark brown */
    }

    .form-box h2 {
      margin-bottom: 25px;
      font-size: 28px;
      color: #4b2e2e;
    }

    .form-box input {
      width: 90%;
      padding: 12px;
      margin: 12px 0;
      border: 1px solid #c4a484;
      border-radius: 10px;
      background-color: #f9f6f1;
      color: #4b2e2e;
      font-size: 15px;
    }

    .form-box input:focus {
      outline: none;
      border-color: #4b2e2e;
      background-color: #fff;
      box-shadow: 0 0 6px #4b2e2e;
    }

    .form-box button {
      width: 100%;
      padding: 12px;
      background-color: #4b2e2e;
      color: #fff;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .form-box button:hover {
      background-color: #3b1f1f;
    }

    .form-box p {
      margin-top: 15px;
      font-size: 14px;
    }

    .form-box a {
      color: #4b2e2e;
      text-decoration: underline;
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
        transform: scale(0.95);
      }
      100% {
        opacity: 1;
        transform: scale(1);
      }
    }

    @media screen and (max-width: 500px) {
      .form-box {
        width: 90%;
        padding: 25px;
      }
    }
  </style>
</head>
<body>
  <div class="form-box">
    <h2>Register for GCE Portal</h2>
    <form method="POST">
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Register</button>
      <p>Already registered? <a href="login.php">Login here</a></p>
    </form>
  </div>
</body>
</html>
