<?php
include_once 'db/connect.php';
include_once 'db/function.php';





if(isset($_POST['loginBtn'])){


$email = $_POST['email'];
$email = filter_var($email, FILTER_SANITIZE_STRING);

$password = $_POST['password'];
$password= filter_var($password, FILTER_SANITIZE_STRING);

$verify_email =  $conn->prepare("SELECT * FROM `users` WHERE email = ?
LIMIT 1");
$verify_email->execute([$email]);


if($verify_email->rowCount() > 0){
  $fetch = $verify_email->fetch(PDO::FETCH_ASSOC);
  $verify_password = password_verify($password, $fetch['password']);
  if($verify_password == 1){
setcookie('user_id', $fetch['id'], time() + 60*60*24*20, '/');
 $success_msg[] = 'logged in';
 header('location: profile.php');
}else {
    $warning_msg[] = 'Incorrect password!';
  }
}else {
  $warning_msg[] = 'Incorrect email!';
}
} 
?>





<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" ></script>
    
    <link rel="stylesheet" href="css/login.css">
<head>
    <meta charset="utf-8">
  <title>login</title>
</head>

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');



</style>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<body>
    <main class="container">
        <h2>Login</h2>
        <form action="" method="POST">
            <div class="input-field">
                <input type="email" name="email" value=""
                    placeholder="Enter Your Email" required>
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="password" name="password"  value=""
                    placeholder="Enter Your Password" required>
                <div class="underline"></div>
            </div>

            
            <input type="submit"  name="loginBtn" value="Signin">

        </form>

        <div class="footer">
            <span>Or Connect With Social Media</span>
            <div class="social-fields">
                <div class="social-field twitter">
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                        Sign in with Twitter
                    </a>
                </div>
                <div class="social-field facebook">
                    <a href="index.php">
                        <i class="fab fa-facebook-f"></i>
                        Sign up
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
<?php include 'db/alert.php'; ?>
</html>

