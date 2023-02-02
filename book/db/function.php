<?php


function create_unique_id(){
    $charecters =
    'jhehf24235645yfbhjggutgytgyugugyugcnvmhkgmcncjfkgdhrfjtgm';
    $charecters_length = strlen($charecters);
    $random_string = '';
    for($i = 0; $i < 20; $i++){
        $random_string .=$charecters[mt_rand(0, $charecters_length - 1)];
    }
    return $random_string;
}



if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
  }else{
    $user_id = '';
  }

?>
