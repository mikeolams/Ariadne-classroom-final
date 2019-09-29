<?php
    session_start();

    $con=mysqli_connect('localhost','root','1111111111') or die("Cannot connect to localhost");
    mysqli_select_db($con,'Ariadneclass') or die("Cannot Select Database");

    //require 'includes/config.php';

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }

    $errors = 0;

  if(isset($_POST['register'])) {
    $errMsg = '';

    // Get data from FROM
    $_SESSION['fullname'] = $fullname = $_POST['fullname'];
    $_SESSION['username'] = $username = $_POST['username'];
    $_SESSION['email'] = $email = $_POST['email'];   
    $password = $_POST['password'];
    // $secretpin = $_POST['secretpin'];
      
    if(empty($fullname)){
        $_SESSION['empty_fullname'] = "Enter name";
        $errors += 1;
    } else {
        $fullname = test_input($fullname);
    }
      
    if(empty($username)){
        $_SESSION['empty_username'] = "Enter username";
        $errors += 1;
    } else {
        $username = test_input($username);
    }
      
    if(empty($email)){
        $_SESSION['empty_email'] = "Enter your email";
        $empty_email_flag = 1;
        $errors += 1;
    } else {
        $email = test_input($email);
        $empty_email_flag = 0;
    }  
    
    if((! filter_var($email,FILTER_VALIDATE_EMAIL)) && $empty_email_flag == 0){
        $_SESSION['incorrect_email'] = "Invalid email format";
        $errors += 1;
    }
      
    if(empty($password)){
        $_SESSION['blank_password'] = "Enter password";
        $errors += 1;
    }
      
    if($errors == 0){
        
        $check_email = mysqli_prepare($con,"SELECT * from Ariadneclass WHERE email = ?");
        mysqli_stmt_bind_param($check_email,'s',$email);
        mysqli_stmt_execute($check_email);
        mysqli_stmt_store_result($check_email);
        $email_row = mysqli_stmt_num_rows($check_email);
        mysqli_stmt_close($check_email);
    
        if($email_row > 0){
                $_SESSION['emailerr'] = "A user with this email already exists";
                if($con){mysqli_close($con);}
                header('location: sign-up.php');
                exit();
        }
      
        else {
            $pword = password_hash("$pword",PASSWORD_DEFAULT);
            $insert = mysqli_prepare($con,"INSERT INTO users (fullname, username, email, pword) VALUES (?,?,?,?)");
            mysqli_stmt_bind_param($insert,'ssss',$fullname,$username,$email,$pword);
            mysqli_stmt_execute($insert);
            mysqli_stmt_close($insert);
            
            $_SESSION['fullname'] = $fullname;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            
            if($con){mysqli_close($con);}
            header('Location: login.php');
            exit();
        }
    }
        
    else {
        if($con){mysqli_close($con);}
        header('Location: sign-up.php');
        exit();
    }
      
    }
if($con){
mysqli_close($con);
}

  /*  if($fullname == '')
      $errMsg = 'Enter your fullname';
    if($username == '')
      $errMsg = 'Enter username';
    if($password == '')
      $errMsg = 'Enter password'; 
    if($email == '')
      $errMsg = 'Enter email';
    // if($secretpin == '')
    //   $errMsg = 'Enter a sercret pin number';

    if($errMsg == ''){
      try {
        $stmt = $connect->prepare('INSERT INTO pdo (fullname, username, email, password) VALUES (:fullname, :username, :email, :password)');
        $stmt->execute(array(
          ':fullname' => $fullname,
          ':username' => $username,
          ':email' => $email,
          ':password' => $password
          // ':secretpin' => $secretpin
          ));
        header('location:login.php');
        exit;
      }
      catch(PDOException $e) {
        echo $e->getMessage();
      }
    }
  }*/

//  if(isset($_GET['action']) && $_GET['action'] == 'joined') {
    //$errMsg = 'Registration successfull. Now you can <a href="login.php">login</a>';
  //}
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
include "header.php" ;?>
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
<form action="" method="post">
  <div class="imgcontainer">
    <img src="https://res.cloudinary.com/enema/image/upload/v1569433441/Ariadne_Class_pnlixb.png" alt="Avatar" class="avatar" height="100" width="50">
  </div>
  <div class="signup_errors">
          <?php
             if(isset($_SESSION['empty_fullname'])){
                 echo $_SESSION['empty_fullname']."</br>";
                 unset($_SESSION['empty_fullname']);
             }
             if(isset($_SESSION['empty_username'])){
                 echo $_SESSION['empty_username']."</br>";
                 unset($_SESSION['empty_username']);
             }
             if(isset($_SESSION['empty_email'])){
                 echo $_SESSION['empty_email']."</br>";
                 unset($_SESSION['empty_email']);
             }
             if(isset($_SESSION['incorrect_email'])){
                 echo $_SESSION['incorrect_email']."</br>";
                 unset($_SESSION['incorrect_email']);
             }
             if(isset($_SESSION['blank_password'])){
                 echo $_SESSION['blank_password']."</br>";
                 unset($_SESSION['blank_password']);
             }
             if(isset($_SESSION['emailerr'])){
                 echo $_SESSION['emailerr']."</br>";
                 unset($_SESSION['emailerr']);
             }
          ?>
      </div>
  <div class="container">
    <label for="fullname"><b>Full name</b></label>
<input type="text" name="fullname" placeholder="Fullname" value="<?php if(isset($_POST['fullname'])) echo $_POST['fullname'] ?>" autocomplete="off" class="box"/><br /><br />
    <label for="username"><b>Username</b></label>
<input type="text" name="username" placeholder="Username" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" class="box"/><br /><br />
<label for="email"><b>Email</b></label>
<input type="text" name="email" placeholder="Email Adress" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>" autocomplete="off" class="box"/><br /><br />
    <label for="password"><b>Password</b></label>
<input type="password" name="password" placeholder="Password" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" class="box" /><br/><br />
<!--     <label for="psw"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat password"> -->
    <div class="coursegroup">
<!--     <select name="subjects" class="subjects" required>
            <option value="">--Please choose a class--</option>
            <option value="Web Development">Web Development</option>
            <option value="Data Science">Data Science</option>
            <option value="AI">Artificial Intelligence</option>
            <option value="Machine Learning">Machine Learning</option>
            <option value="Oracle DataBase">Oracle DataBase</option>
            <option value="Cisco Networking">Cisco Networking</option>
            <option value="RedHat Linux">RedHat Linux</option>
            <option value="Digital Marketing">Digital Marketing</option>
            <option value="Microsoft">Microsoft System Administration</option>
          </select> -->

    <button type="submit " name='register' value="Register" class='submit'>Sign Up</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div></div></form>
<section>
  <footer>
    <img src="https://res.cloudinary.com/enema/image/upload/v1569508194/screencapture-file-C-Users-pc-Desktop-TEAM-ARIADNE-HOMEPAGE-homepage-html-2019-09-25-21_51_33_vqmtxf.png" width="100%">
  </footer>
</section>
</body>
</html>

