<?php

 require_once('connection.php');

if(isset($_POST['btn-save']))
{
    $UserName = mysqli_real_escape_string($con,$_POST['UserName']);
    $Email = mysqli_real_escape_string($con,$_POST['Email']);
    $Password= mysqli_real_escape_string($con,$_POST['Password']);
    $CPassword = mysqli_real_escape_string($con,$_POST['Cpass']);

    if(empty($UserName) || empty($Email) || empty($Password) || empty($CPassword))
    {
        echo 'please fill in the blank';
    }
     if($Password!=$CPassword)
     {
        echo 'Password Not Matched';
     }
     else $Pass = md5($Password);
     $sql = "insert into users(Uname,Email,password) values('$UserName','$Email','$Pass')";
     $result = mysqli_query($con,$sql,);

     if($result)
     {
        echo ' Your Record Have Been Saved In The Database';
     }
     else echo 'Check Your Query';
}

?>