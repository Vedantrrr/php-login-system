<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

  $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);
  
  if (mysqli_stmt_execute($stmt)) {
    echo "Registration successful! <a href='login.php'>Login</a>";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>

<form method="POST">
  <h2>Register</h2>
  Name: <input type="text" name="name" required><br><br>
  Email: <input type="email" name="email" required><br><br>
  Password: <input type="password" name="password" required><br><br>
  <button type="submit">Register</button>
</form>
