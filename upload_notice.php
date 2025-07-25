<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$notices = $conn->query("SELECT * FROM notices ORDER BY upload_date DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Notices</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: url("bk img.jpg") no-repeat center center fixed;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
      color: #3e2f2f;
    }

    .container {
      background: rgba(255, 255, 255, 0.6);
      backdrop-filter: blur(8px);
      -webkit-backdrop-filter: blur(8px);
      border: 1px solid rgba(0, 0, 0, 0.1);
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 1000px;
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      font-size: 28px;
      color: #3e2f2f;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: rgba(255, 255, 255, 0.9);
      color: #3e2f2f;
    }

    th, td {
      padding: 12px 15px;
      border: 1px solid #ccc;
      text-align: left;
    }

    th {
      background-color: #7a5c4b;
      color: white;
    }

    tr:nth-child(even) {
      background-color: rgba(240, 240, 240, 0.6);
    }

    a {
      color: #5a3d2b;
      text-decoration: none;
      font-weight: bold;
    }

    a:hover {
      text-decoration: underline;
    }

    .back-link {
      display: inline-block;
      margin-top: 20px;
      font-size: 16px;
      color: #3e2f2f;
    }

    .back-link:hover {
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      table, th, td {
        font-size: 14px;
      }

      .container {
        padding: 20px;
      }

      h2 {
        font-size: 22px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>📄 All Uploaded Notices</h2>
    <table>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Uploaded By</th>
        <th>Download</th>
        <th>Date</th>
      </tr>
      <?php while ($row = $notices->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($row['title']) ?></td>
          <td><?= htmlspecialchars($row['description']) ?></td>
          <td><?= htmlspecialchars($row['uploaded_by']) ?></td>
          <td>
            <a href="uploads/<?= urlencode($row['file_path']) ?>" target="_blank">📥 Download</a>
          </td>
          <td><?= $row['upload_date'] ?></td>
        </tr>
      <?php endwhile; ?>
    </table>

    <a href="dashboard.php" class="back-link">← Back to Dashboard</a>
  </div>
</body>
</html>
