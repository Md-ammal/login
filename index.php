<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
    }

    .login-container {
      max-width: 400px;
      margin: 100px auto;
      background-color: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      position: relative;
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    .login-container input[type="text"],
    .login-container input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .login-container button {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .login-container button:hover {
      background-color: #45a049;
    }

    .login-container .signup-link {
      text-align: center;
    }

    .login-container .signup-link a {
      color: #007bff;
    }

    .login-container .signup-link a:hover {
      text-decoration: underline;
    }

    /* Dark Mode */
    body.dark-mode {
      background-color: #222;
      color: #fff;
    }

    body.dark-mode .login-container {
      background-color: #333;
      color: #fff;
      box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.1);
    }

    body.dark-mode input[type="text"],
    body.dark-mode input[type="password"] {
      background-color: #444;
      color: #fff;
      border-color: #666;
    }

    body.dark-mode .signup-link a {
      color: #55a7ff;
    }

    /* Light Mode */
    body.light-mode .signup-link a {
      color: #007bff;
    }

    /* Toggle Button */
    .toggle-btn {
      position: absolute;
      top: 20px;
      right: 20px;
      cursor: pointer;
    }

    .toggle-btn input[type="checkbox"] {
      display: none;
    }

    .toggle-btn label {
      position: relative;
      display: inline-block;
      width: 40px;
      height: 20px;
      background-color: #ccc;
      border-radius: 25px;
    }

    .toggle-btn label:after {
      content: '';
      position: absolute;
      width: 18px;
      height: 18px;
      border-radius: 50%;
      background-color: #fff;
      top: 1px;
      left: 1px;
      transition: 0.3s;
    }

    .toggle-btn input[type="checkbox"]:checked + label {
      background-color: #4CAF50;
    }

    .toggle-btn input[type="checkbox"]:checked + label:after {
      left: calc(100% - 1px);
      transform: translateX(-100%);
    }
    .error{
      color: red;
    }
  </style>
</head>
<?php
require_once('connection.php');
if(isset($_POST['id']) && !empty($_POST['id'])) {
    // $query = "select * from register where id = " .$_GET['id'];
    // $response = mysqli_query($connection, $query);
    // if(mysqli_num_rows($response) > 0) {
    //     $result = mysqli_fetch_assoc($response);
    }      
?>
<body class="dark-mode">
<div class="container">
  <div class="login-container">
    <h2>Admin Login</h2>
    <form method="post" action="checklogin.php">
      <div class="form-group">
        <input type="text" class="form-control" name = "username" placeholder="Username" value="" required>
      </div>
      <div class="form-group">
        <input type="password" name = "password" class="form-control" placeholder="Password" value="" required>
      <span class="error" > <?php
                    if(isset($_GET['error']) && $_GET['error'] == true) {
                        echo "Username or Password is wrong";
                    }
                ?>
      </span>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
      <div class="signup-link">
        Don't have an account? <a href="..\mine\webForm.php">Sign up</a>
      </div>
    </form>
    <div class="toggle-btn">
      <input type="checkbox" id="modeToggle">
      <label for="modeToggle"></label>
    </div>
  </div>
</div>

<!-- JavaScript -->
<script>
  document.getElementById('modeToggle').addEventListener('change', function() {
    document.body.classList.toggle('dark-mode');
    document.body.classList.toggle('light-mode');
  });
</script>

</body>
</html>