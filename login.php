<?php
  require 'includes/config.php';

  if(isset($_POST['login'])) {
    $errMsg = '';

    // Get data from FORM
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == '')
      $errMsg = 'Enter username';
    if($password == '')
      $errMsg = 'Enter password';

    if($errMsg == '') {
      try {
        $stmt = $connect->prepare('SELECT id, fullname, username, password FROM pdo WHERE username = :username');
        $stmt->execute(array(
          ':username' => $username
          ));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if($data == false){
          $errMsg = "User $username not found.";
        }
        else {
          if($password == $data['password']) {
            $_SESSION['name'] = $data['fullname'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['password'] = $data['password'];
            // $_SESSION['secretpin'] = $data['secretpin'];

            header('Location: accessclass.php');
            exit;
          }
          else
            $errMsg = 'Password not match.';
        }
      }
      catch(PDOException $e) {
        $errMsg = $e->getMessage();
      }
    }
  }
?>


<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <title>Sign Up form</title>
  <link rel="stylesheet" type="text/css" href="css/signup.css">
</head>
<header>
<div class="header">

      <?php
  include "header.php";?>
 
    </div>  
      <script>
          function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
              x.className += " responsive";
            } else {
              x.className = "topnav";
            }
          }
        </script>
</header>
<body>
  <div>
    <h2>Welcome to Ariadne Class, <br>enrol today and enjoy the definiation<br> of online education.</h2>
  </div>

<form action="" method="post">
  <div class="imgcontainer">
    <img src="https://res.cloudinary.com/enema/image/upload/v1569433441/Ariadne_Class_pnlixb.png" alt="Avatar" class="avatar" height="100" width="50">
  </div>

  <div class="container">
<form action="" method="post">
          <input type="text" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" class="box"/><br /><br />
          <input type="password" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" autocomplete="off" class="box" /><br/><br />
          <input type="submit" name='login' value="Login" class='submit'/><br />
        </form>
  </div>

  <div class="container" style="background-color:#f1f1f1">

  </div></div></form>
<section>
  <footer>
    <img src="https://res.cloudinary.com/enema/image/upload/v1569508194/screencapture-file-C-Users-pc-Desktop-TEAM-ARIADNE-HOMEPAGE-homepage-html-2019-09-25-21_51_33_vqmtxf.png" width="100%">
  </footer>
</section>
</body>
</html>
