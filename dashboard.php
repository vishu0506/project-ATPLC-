<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>GCE Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: url("gce pic.jpg") no-repeat center center fixed;
      background-size: cover;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    header {
      background-color: rgba(97, 25, 78, 0.85);
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 20px;
      font-size: 22px;
      font-weight: bold;
      letter-spacing: 1px;
    }

    header .title {
      flex: 1;
      text-align: center;
    }

    .header-logo {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      object-fit: cover;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
    }

    main {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .container {
      background: rgba(48, 45, 45, 0.5);
      border: 1px solid rgba(255, 255, 255, 0.3);
      border-radius: 16px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
      padding: 40px;
      text-align: center;
      max-width: 500px;
      width: 90%;
      color: #f4f4f4;
    }

    h2 {
      font-size: 32px;
      margin-bottom: 12px;
      color: #ffffff;
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6);
    }

    p {
      font-size: 18px;
      margin-bottom: 30px;
      color: #e0e0e0;
    }

    a {
      display: inline-block;
      margin: 10px;
      padding: 12px 24px;
      font-size: 16px;
      background-color: rgba(128, 62, 122, 0.85);
      color: white;
      border: none;
      border-radius: 8px;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    a:hover {
      background-color: rgba(128, 62, 122, 1);
    }

    @media (max-width: 600px) {
      .container {
        padding: 20px;
      }

      a {
        display: block;
        width: 100%;
        margin: 10px 0;
      }

      .header-logo {
        width: 50px;
        height: 50px;
      }

      header {
        font-size: 18px;
        flex-direction: row;
        padding: 10px 15px;
      }

      header .title {
        font-size: 16px;
      }
    }
  </style>
</head>
<body>
  <header>
    <div class="title">GAYA COLLEGE OF ENGINEERING, GAYA</div>
    <img src="gce logo.jpg" alt="GCE Logo" class="header-logo">
  </header>

  <main>
    <div class="container">
      <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?> 👋</h2>
      <p>This is the GCE Notice Portal Dashboard</p>
      <a href="upload_notice.php">📤 Upload Notice</a>
      <a href="viewnotice.php">📄 View Notices</a>
      <a href="logout.php">🚪 Logout</a>
    </div>
  </main>
</body>
</html>
