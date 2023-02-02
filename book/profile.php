<?php 
include_once 'session.php';
include_once 'header.php';
include_once 'db/connect.php';
include_once 'db/function.php';


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" ></script>
    <link rel="stylesheet" href="css/profile.css">
    
<head>
    <meta charset="utf-8">
  <title>Profile</title>
</head>

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');
</style>

<body>

    <div class="header_wrapper">
        <header></header>
        <div class="cols_container">
            <div class="left_col">
                <div class="img_container">
                    <?php 
                    if($fetch_profile['image'] !=''){?>
                    <img src="image/<?= $fetch_profile['image']; ?>" alt="dp" />
                    <?php };?>
   
                 

                    <span> </span>
                </div>
                <h2><?= $fetch_profile['username']; ?></h2>
                <p>backend dev</p>
                <p><?= $fetch_profile ['email'];?></p>

                <ul class="about">
                    <li><span>4,073</span>followers</li>
                    <li><span>4,073</span>followers</li>
                    <li><span>4,073</span>followers</li>
                </ul>
                <div class="content">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur
                         adipisicing elit. Vitae minus labore officia? Minima 
                         tempore debitis soluta praesentium libero?
                          Dolores eveniet odio dicta reiciendis ea alias 
                          ipsam rem ducimus minima! Nobis?
                    </p>

                    <ul>
                        <li><img src="img/facebook.png" alt="facebook"></li>
                        <li><img src="img/facebook.png" alt="facebook"></li>
                        <li><img src="img/facebook.png" alt="facebook"></li>
                    </ul>
                </div>
            </div>
            <div class="right_col">
            <nav>
                <ul>
                    <li><a href="#">books</a></li>
                    <li><a href="#">comment</a></li>
                    <li><a href="#">about</a></li>
                    <li><a href="#">follow</a></li>
                </ul>
                <button><a href="update.php">Update profile</a></button>
                <button>follow</button>
             
            </nav>

       <div class="photos">

        <img src="img/ready.jpg" alt="photo">
        <img src="img/login2.jpg" alt="photo">
        <img src="img/ready.jpg" alt="photo">
       </div>     
        </div>
    </div>
    </div>
</body>
<?php include_once 'db/alert.php'; ?>
</html>