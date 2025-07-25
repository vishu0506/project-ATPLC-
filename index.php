<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Check if the session variable is set
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GCE Portal - Home</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f0f4f8;
      color: #333;
    }

    header {
      background-color: #004080;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    nav {
      display: flex;
      justify-content: center;
      background-color: #0066cc;
      padding: 10px;
    }

    nav a {
      color: white;
      text-decoration: none;
      margin: 0 15px;
      font-weight: bold;
    }

    nav a:hover {
      text-decoration: underline;
    }

    .container {
      max-width: 900px;
      margin: 40px auto;
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    footer {
      text-align: center;
      padding: 15px;
      background-color: #004080;
      color: white;
      position: fixed;
      bottom: 0;
      width: 100%;
    }

    @media screen and (max-width: 600px) {
      nav {
        flex-direction: column;
      }

      nav a {
        margin: 10px 0;
      }

      .container {
        margin: 20px;
        padding: 20px;
      }
    }
  </style>
</head>
<body>

  <header>
    <h1>Gaya College of Engineering</h1>
    <p>Welcome to the Official College Update Portal</p>
  </header>

  <nav>
    <a href="upload.php">Upload Forms</a>
    <a href="notifications.php">Notifications</a>
    <a href="logout.php">Logout</a>
  </nav>

  <div class="container">
    <h2>Hello, <?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : 'User'; ?> 👋</h2>
    <p>Use the links above to upload notices, fill forms, and get the latest updates from faculty and administration.</p>
  </div>

  <footer>
    &copy; <?php echo date("Y"); ?> Gaya College of Engineering | All Rights Reserved
  </footer>

</body>
</html>
