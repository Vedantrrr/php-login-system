<?php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $sql = "SELECT * FROM users WHERE email = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if ($user = mysqli_fetch_assoc($result)) {
    if (password_verify($password, $user["password"])) {
      $_SESSION["user"] = $user["name"];
      header("Location: dashboard.php");
      exit;
    } else {
      echo "Invalid password.";
    }
  } else {
    echo "User not found.";
  }
}
?>

<form method="POST">
  <h2>Login</h2>
  Email: <input type="email" name="email" required><br><br>
  Password: <input type="password" name="password" required><br><br>
  <button type="submit">Login</button>
</form>
