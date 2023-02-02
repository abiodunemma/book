<?php 
include_once 'db/connect.php';
include_once 'db/function.php';
include_once 'header.php';

if(isset($_POST['add_Book'])){

$id = create_unique_id();

    $user_id = $_POST['user_id'];
    $user_id = filter_var($user_id, FILTER_SANITIZE_STRING);

$name = $_POST['name'];
$name = filter_var($name, FILTER_SANITIZE_STRING);

$about = $_POST['about'];
$about = filter_var($about, FILTER_SANITIZE_STRING);

$category = $_POST['category'];
$category = filter_var($category, FILTER_SANITIZE_STRING);

$image = $_FILES['image']['name'];
$image = filter_var($image, FILTER_SANITIZE_STRING);
$ext = pathinfo($image, PATHINFO_EXTENSION);
$rename = create_unique_id().'.'.$ext;
$image_tmp_name = $_FILES['image']['tmp_name'];
$image_size = $_FILES['image']['size'];
$image_folder = 'img/' .$rename;


if($image_size > 2000000){

    $warning_msg[] = 'Image size is too large!';
}else{
 
$select_user = $conn->prepare("SELECT * FROM `users` WHERE ID = ? LIMIT 1");
$select_user->execute([$user_id]);
$fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);
    $insert_upload = $conn->prepare("INSERT INTO `upload` (id, user_id, name, about, image) 
    VALUES(?,?,?,?,?)");
    $insert_upload->execute([$id, $user_id, $name, $about, $rename]);
    $success_msg[] = 'book uploaded';
    move_uploaded_file($image_tmp_name, $image_folder);
}


}
?>



<!DOCTYPE HTML>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>

  <link rel="stylesheet" href="css/upbook.css">
</head>


<section class="add-product">
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" value="<?= $fetch_profile['id']; ?>" name="user_id">
    <h3>Upload your Book</h3>
    <p>Name Of Book <span>*</span></p>
    <input type="text" name="name" required maxlength="50"
    placeholder="enter book name" class="box">
    <p>About <span>*</span></p>
    <input type="text" name="about" required 
    placeholder="About" class="box">
    <p>Category <span>*</span></p>
   <select name="category" class="box" required>
<option value="Bussiness">Bussiness</option>
<option value="Travel">Travel</option>
    
</option>
   </select>
   
    <p>book image <span>*</span></p>
    <input type="file" name="image" required accept="image/*" class="box">
    <input type="submit" value="add Book" name="add_Book" class="btn">

</form>



</section>




<body>

<!-- custom js file link -->
<script src="js/script.js"></script>

<?php include 'db/alert.php'; ?>

</body>


</html>