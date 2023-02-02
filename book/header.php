<?php 
include_once 'db/function.php';
include_once 'db/connect.php';
?>

<link rel="stylesheet" href="css/header.css">



<?php 
if($user_id != ''){

?>
<idv id="user-btn" class="far fa-user"></idv>
<?php }; ?>

</nav>

<?php


   
    ?>
    
<?php 
if($user_id != ''){
    $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?
    LIMIT 1");
    $select_profile->execute([$user_id]);
    if($select_profile-> rowCount() > 0){
        $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

  
?>
<header class="header">
<section class="flex">
<a href="#" class="logo">Reko.</a>

<nav class="navbar">
 
    <a href="total_books.php">Top books</a>
    <a href="upbook.php">Upload book</a>
    <a href="profile.php">Profile</a>
    <a href="Logout.php">Logout</a>
<?php 
  }else { ?>

    <a href="signup.php">signup</a>
    <a href="login.php">login</a>
    <a href="logout.php">Logout</a>

<?php }; ?>
    </div>
<?php }; ?>

</section>

</header>









