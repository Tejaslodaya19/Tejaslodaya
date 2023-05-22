<?php
session_start();
$captcha = "" ;
include "database.php"; 
if(isset($_POST['submit'])) {
    /*if (isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          $error = "Please check captcha too";
          include ('register.php');
          exit();
        }
        $secretKey = "6LeD3hEUAAAAADNeeaGRfKmABjn1gnsXxrpdTa2J";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
          $error = "You are spammer !";
        }*/
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$subject = mysqli_real_escape_string($conn,$_POST['subject']);
$message = mysqli_real_escape_string($conn,$_POST['message']);

$sq = mysqli_query($conn, 'SELECT name FROM visitors WHERE name="'.$_POST['name'].'"');
$exist = mysqli_num_rows($sq);
    
        if($exist==1){
        $nam="<center><h4><font color='#FF0000'>The username already exist, peak another.</h4></center></font>";
        unset($username);
        include('index.php');
        exit();
        }
$sql = mysqli_query($conn, 'INSERT INTO visitors(name,email,subject,message)
         VALUES("'.$_POST['name'].'","'.$_POST['email'].'","'.$_POST['subject'].'","'.$_POST['message'].'")');
         if (!$sql) { 
         die (mysqli_error($conn));
         }
else {
echo "Successfully Registered!";
}
}
?>