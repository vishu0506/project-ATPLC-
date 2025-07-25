<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($row = $result->fetch_assoc()) {
    if (password_verify($password, $row['password'])) {
      $_SESSION['user'] = $row['name'];
      $_SESSION['email'] = $row['email'];
      header("Location: dashboard.php");
      exit();
    } else {
      echo "<script>alert('Wrong password!');</script>";
    }
  } else {
    echo "<script>alert('User not found!');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - GCE Portal</title>
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
      background-color: rgba(255, 255, 255, 0.5); /* semi-transparent */
      backdrop-filter: blur(10px);
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
      width: 350px;
      animation: slideFadeIn 0.8s ease-in-out;
      color: #4b2e2e; /* dark brown */
      text-align: center;
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
      background-color: #fefaf6;
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

    @keyframes slideFadeIn {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
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
    <h2>Login to GCE Portal</h2>
    <form method="POST">
      <input type="email" name="email" placeholder="Enter your email" required>
      <input type="password" name="password" placeholder="Enter your password" required>
      <button type="submit">Login</button>
      <p>Don't have an account? <a href="register.php">Register here</a></p>
    </form>
  </div>
</body>
</html>
