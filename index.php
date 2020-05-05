<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Absensi Karyawan</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="login-page">
  <!-- Login Box -->
  <div class="login-box">
    <img src="img/login_people_icon.svg" alt="people" class="avatar">
    <div class="login-form">
      <h1 class="login-header">Log in</h1>
      <?php
      if (isset($_GET["msg"])) {
        if ($_GET["msg"] == "failed") {
          echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Incorrect username or password!
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                </div>";
        } else if ($_GET["msg"] == "notlogin") {
          echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    You are not logged in.
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                </div>";
        }
      }
      ?>
      <form action="login.php" method="POST">
        <div class="login-textbox">
          <i class="fas fa-user-alt"></i>
          <input class="login-input" type="text" name="username" id="username" placeholder="Enter your username..." required>
        </div>
        <div class="login-textbox">
          <i class="fas fa-key"></i>
          <input class="login-input" type="password" name="password" id="password" placeholder="Enter your password..." required>
        </div>
        <button class="login-btn" type="submit" name="login">Log in</button>
      </form>
    </div>
  </div>
  <!-- End of Login Box -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>